<?php

namespace App\Http\Controllers\API;
use App\Http\Requests\CreateTeamAPIRequest;
use App\Http\Requests\UpdateTeamAPIRequest;
use App\Team;
use App\Repositories\TeamRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

/**
 * Class TeamController
 * @package App\Http\Controllers\API
 */

class TeamAPIController extends AppBaseController
{
    /** @var  TeamRepository */
    private $teamRepository;

    public function __construct(TeamRepository $teamRepo)
    {
        $this->teamRepository = $teamRepo;
    }

    /**
     * Display a listing of the Team.
     * GET|HEAD /Teams
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $Teams = $this->teamRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($Teams->toArray(), 'Teams retrieved successfully');
    }

    /**
     * Store a newly created Team in storage.
     * POST /Teams
     *
     * @param CreateTeamAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamAPIRequest $request)
    {
        $input = $request->all();

        $Team = $this->teamRepository->create($input);

        return $this->sendResponse($Team->toArray(), 'Team saved successfully');
    }

    /**
     * Display the specified Team.
     * GET|HEAD /Teams/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Team $Team */
        $Team = $this->teamRepository->find($id);

        if (empty($Team)) {
            return $this->sendError('Team not found');
        }

        return $this->sendResponse($Team->toArray(), 'Team retrieved successfully');
    }

    /**
     * Update the specified Team in storage.
     * PUT/PATCH /Teams/{id}
     *
     * @param int $id
     * @param UpdateTeamAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeamAPIRequest $request)
    {
        $input = $request->all();

        /** @var Team $Team */
        $Team = $this->teamRepository->find($id);

        if (empty($Team)) {
            return $this->sendError('Team not found');
        }

        $Team = $this->teamRepository->update($input, $id);

        return $this->sendResponse($Team->toArray(), 'Team updated successfully');
    }

    /**
     * Remove the specified Team from storage.
     * DELETE /Teams/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Team $Team */
        $Team = $this->teamRepository->find($id);

        if (empty($Team)) {
            return $this->sendError('Team not found');
        }

        $Team->delete();

        return $this->sendResponse($id, 'Team deleted successfully');
    }
}
