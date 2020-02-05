<?php

namespace App\Http\Controllers;

use App\Repositories\TeamRepository;
use Illuminate\Http\Request;
use App\Team;
use Auth;
use Response;
use Flash;
use View;

class TeamController extends  AppBaseController
{

    /** @var  TeamRepository */
    private $teamRepository;

    public function __construct(TeamRepository $teamRepo)
    {
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
        $teams = $this->teamRepository->all();

        return view('teams.index')
            ->with('teams', $teams);
    }

    public function show($id){
        return view('teams.view');
    }
}
