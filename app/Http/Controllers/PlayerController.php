<?php

namespace App\Http\Controllers;


use App\Repositories\PlayerRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $players = $this->playerRepository->all();

        return view('players.index')
            ->with('players', $players);
    }

    public function show($id){
        return view('players.view');
    }

    public function create()
    {
        return view('players.create');
    }

}
