<?php

namespace App\Http\Controllers\API;
use App\Http\Requests\CreatePlayerAPIRequest;
use App\Http\Requests\UpdatePlayerAPIRequest;
use App\Player;
use App\Repositories\PlayerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

/**
 * Class PlayerController
 * @package App\Http\Controllers\API
 */

class PlayerAPIController extends AppBaseController
{
    /** @var  PlayerRepository */
    private $playerRepository;

    public function __construct(PlayerRepository $playerRepo)
    {
        $this->playerRepository = $playerRepo;
    }

    /**
     * Display a listing of the Player.
     * GET|HEAD /Players
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $Players = $this->playerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($Players->toArray(), 'Players retrieved successfully');
    }

    /**
     * Store a newly created Player in storage.
     * POST /Players
     *
     * @param CreatePlayerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePlayerAPIRequest $request)
    {
        $input = $request->all();

        $Player = $this->playerRepository->create($input);

        return $this->sendResponse($Player->toArray(), 'Player saved successfully');
    }

    /**
     * Display the specified Player.
     * GET|HEAD /Players/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Player $Player */
        $Player = $this->playerRepository->find($id);

        if (empty($Player)) {
            return $this->sendError('Player not found');
        }

        return $this->sendResponse($Player->toArray(), 'Player retrieved successfully');
    }

    /**
     * Update the specified Player in storage.
     * PUT/PATCH /Players/{id}
     *
     * @param int $id
     * @param UpdatePlayerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlayerAPIRequest $request)
    {
        $input = $request->all();

        /** @var Player $Player */
        $Player = $this->playerRepository->find($id);

        if (empty($Player)) {
            return $this->sendError('Player not found');
        }

        $Player = $this->playerRepository->update($input, $id);

        return $this->sendResponse($Player->toArray(), 'Player updated successfully');
    }

    /**
     * Remove the specified Player from storage.
     * DELETE /Players/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Player $Player */
        $Player = $this->playerRepository->find($id);

        if (empty($Player)) {
            return $this->sendError('Player not found');
        }

        $Player->delete();

        return $this->sendResponse($id, 'Player deleted successfully');
    }
}
