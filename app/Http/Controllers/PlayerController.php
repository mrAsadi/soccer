<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreatePlayerRequest;
use App\Repositories\PlayerRepository;
use App\Utility\Util;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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

    public function create()
    {
        return view('players.create');
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

}
