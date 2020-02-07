<?php

namespace App\Http\Controllers;
use App\Helpers\Utility;
use App\Http\Requests\CreatePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Repositories\PlayerRepository;
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

    public function __construct(PlayerRepository $playerRepo)
    {
        $this->playerRepository = $playerRepo;
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
        return view('players.view');
    }

    public function edit($id){
        $player = $this->playerRepository->findWithoutFail($id);

        if (empty($player)) {
            Session::flash('message', 'Player not found.');
            return redirect(route('players.index'));
        }

        return view('players.edit')->with('player', $player);
    }

    public function create()
    {
        return view('players.create');
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
        $this->playerRepository->update($input,$id);

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

        $this->playerRepository->create($input);

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

        $this->playerRepository->delete($id);
        Session::flash('message', 'Player removed successfully.');
        return redirect(route('players.index'));
    }

}
