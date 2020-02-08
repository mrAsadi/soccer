<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreatePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Player;
use App\Repositories\PlayerRepository;
use App\Repositories\TeamRepository;
use App\Team;
use App\Utility\Util;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PlayerController extends AppBaseController
{
    /** @var  PlayerRepository */
    private $playerRepository;
    private $teamRepository;

    public function __construct(PlayerRepository $playerRepo,TeamRepository $teamRepo)
    {
        $this->playerRepository = $playerRepo;
        $this->teamRepository = $teamRepo;
    }


    /**
     * Display a list of players.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $players = $this->playerRepository->orderBy('created_at','desc')->all();
        $players = json_encode($players);


        return view('players.index')
            ->with('players', $players);
    }

    public function show($id){
        $player = $this->playerRepository->findWithoutFail($id);
        if (empty($player)) {
            return redirect('/');
        }

        return view('players.view')->with('player',$player);
    }

    public function edit($id){
        $player = $this->playerRepository->findWithoutFail($id);

        if (empty($player)) {
            Session::flash('message', 'Player not found.');
            return redirect(route('players.index'));
        }

        $teams = $this->teamRepository->orderBy('created_at','desc')->all();

        foreach ($teams as $team){
            if ($player->teams()->where('team_id',$team->id)->first()){
                $team['selected']=true;
            }else{
                $team['selected']=false;
            }
        }

        return view('players.edit',compact('player','teams'));
    }

    public function create()
    {
        $teams = $this->teamRepository->orderBy('created_at','desc')->all();
        return view('players.create')->with('teams',$teams);
    }

    public function update($id,UpdatePlayerRequest $request){

        $player = $this->playerRepository->findWithoutFail($id);

        if (empty($player)) {
            Session::flash('message', 'Player not found.');
            return redirect(route('players.index'));
        }

        $input = $request->all();
        if($request->hasFile('thumbnail'))
        {
            if (File::exists(Util::FileFromURL($player->thumbnail))) {
                File::delete(Util::FileFromURL($player->thumbnail));
            }
            $input['thumbnail']=Util::uploadImage($request->file('thumbnail'));
        }
        $input['user_id'] = Auth::user()->id;
        $player = $this->playerRepository->update($input,$id);

        $player->teams()->detach();

        foreach (json_decode($input['teams']) as $item){
            $player->teams()->save($this->teamRepository->find($item),['user_id'=>auth()->user()->id]);
        }

        Session::flash('message', 'Player Updated Successfully');

        return redirect(route('players.index'));

    }

    public function store(CreatePlayerRequest $request){


        $input = $request->all();
        if($request->hasFile('thumbnail'))
        {

            $input['thumbnail']=Util::uploadImage($request->file('thumbnail'));
        }
        $input['user_id'] = Auth::user()->id;

        $player =  $this->playerRepository->create($input);

        foreach (json_decode($input['teams']) as $item){
            $player->teams()->save($this->teamRepository->find($item),['user_id'=>auth()->user()->id]);
        }


        Session::flash('message', 'Player Created Successfully');

        return redirect(route('players.index'));

    }


    public function destroy($id)
    {
        $player = $this->playerRepository->findWithoutFail($id);


        if (empty($player)) {
            Session::flash('message', 'Player not found.');
            return redirect(route('players.index'));
        }

        if (File::exists(Util::FileFromURL($player->thumbnail))) {
            File::delete(Util::FileFromURL($player->thumbnail));
        }

        $player->teams()->detach();

        $this->playerRepository->delete($id);
        Session::flash('message', 'Player removed successfully.');
        return redirect(route('players.index'));
    }

}
