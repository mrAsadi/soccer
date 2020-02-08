<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Repositories\PlayerRepository;
use App\Repositories\TeamRepository;
use App\Utility\Util;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class TeamController extends  AppBaseController
{

    /** @var  TeamRepository */
    private $playerRepository;
    private $teamRepository;


    public function __construct(PlayerRepository $playerRepo,TeamRepository $teamRepo)
    {
        $this->playerRepository = $playerRepo;
        $this->teamRepository = $teamRepo;
    }


    /**
     * Display a list of teams.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $teams = $this->teamRepository->orderBy('created_at','desc')->all();
        $teams = json_encode($teams);

        return view('teams.index')
            ->with('teams', $teams);
    }

    public function store(CreateTeamRequest $request){

        $input = $request->all();
        if($request->hasFile('thumbnail'))
        {
            $input['thumbnail']=Util::uploadImage($request->file('thumbnail'));
        }
        $input['user_id'] = Auth::user()->id;

        $team = $this->teamRepository->create($input);

        foreach (json_decode($input['players']) as $item){
            $team->members()->save($this->playerRepository->find($item),['user_id'=>auth()->user()->id]);
        }

        Session::flash('message', 'Team Created Successfully');

        return redirect(route('teams.index'));

    }

    public function show($id){
        $team = $this->teamRepository->findWithoutFail($id);
        if (empty($team)) {
            return redirect('/');
        }

        return view('teams.view')->with('team', $team);
    }

    public function create(){

        $players = $this->playerRepository->orderBy('created_at','desc')->all();
        foreach ($players as $player){
            $player['selected']=false;
        }
        return view('teams.create')->with('players',$players);
    }

    public function edit($id){
        $team = $this->teamRepository->findWithoutFail($id);

        if (empty($team)) {
            Session::flash('message', 'Team not found.');
            return redirect(route('teams.index'));
        }

        $players = $this->playerRepository->orderBy('created_at','desc')->all();

        foreach ($players as $player){
            if ($team->members()->where('player_id',$player->id)->first()){
                $player['selected']=true;
            }else{
                $player['selected']=false;
            }
        }

        return view('teams.edit',compact('team','players'));

    }

    public function update($id,UpdateTeamRequest $request){

        $team = $this->teamRepository->findWithoutFail($id);

        if (empty($team)) {
            Session::flash('message', 'Team not found.');
            return redirect(route('teams.index'));
        }

        $input = $request->all();
        if($request->hasFile('thumbnail'))
        {
            if (File::exists(Util::FileFromURL($team->thumbnail))) {
                File::delete(Util::FileFromURL($team->thumbnail));
            }
            $input['thumbnail']=Util::uploadImage($request->file('thumbnail'));
        }
        $team->members()->detach();

        foreach (json_decode($input['players']) as $item){
            $team->members()->save($this->playerRepository->find($item),['user_id'=>auth()->user()->id]);
        }


        $input['user_id'] = Auth::user()->id;
        $this->teamRepository->update($input,$id);



        Session::flash('message', 'Team Updated Successfully');

        return redirect(route('teams.index'));

    }

    public function destroy($id)
    {
        $team = $this->teamRepository->findWithoutFail($id);


        if (empty($team)) {
            Session::flash('message', 'Team not found.');
            return redirect(route('teams.index'));
        }

        if (File::exists(Util::FileFromURL($team->thumbnail))) {
            File::delete(Util::FileFromURL($team->thumbnail));
        }

        $team->members()->detach();

        $this->teamRepository->delete($id);
        Session::flash('message', 'Team removed successfully.');
        return redirect(route('teams.index'));
    }

    public function all(){
        $teams = $this->teamRepository->orderBy('created_at','desc')->all();

        foreach ($teams as $team){
            $team['members'] = $team->members;
        }

        $teams = json_encode($teams);

        return view('welcome')
            ->with('teams', $teams);
    }
}
