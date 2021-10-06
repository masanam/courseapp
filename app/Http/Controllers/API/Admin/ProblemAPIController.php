<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateProblemAPIRequest;
use App\Http\Requests\API\Admin\UpdateProblemAPIRequest;
use App\Models\Admin\Problem;
use App\Repositories\Admin\ProblemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProblemController
 * @package App\Http\Controllers\API\Admin
 */

class ProblemAPIController extends AppBaseController
{
    /** @var  ProblemRepository */
    private $problemRepository;

    public function __construct(ProblemRepository $problemRepo)
    {
        $this->problemRepository = $problemRepo;
    }

    /**
     * Display a listing of the Problem.
     * GET|HEAD /problems
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $problems = $this->problemRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($problems->toArray(), 'Problems retrieved successfully');
    }

    /**
     * Store a newly created Problem in storage.
     * POST /problems
     *
     * @param CreateProblemAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProblemAPIRequest $request)
    {
        $input = $request->all();

        $problem = $this->problemRepository->create($input);

        return $this->sendResponse($problem->toArray(), 'Problem saved successfully');
    }

    /**
     * Display the specified Problem.
     * GET|HEAD /problems/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Problem $problem */
        $problem = $this->problemRepository->find($id);

        if (empty($problem)) {
            return $this->sendError('Problem not found');
        }

        return $this->sendResponse($problem->toArray(), 'Problem retrieved successfully');
    }

    /**
     * Update the specified Problem in storage.
     * PUT/PATCH /problems/{id}
     *
     * @param int $id
     * @param UpdateProblemAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProblemAPIRequest $request)
    {
        $input = $request->all();

        /** @var Problem $problem */
        $problem = $this->problemRepository->find($id);

        if (empty($problem)) {
            return $this->sendError('Problem not found');
        }

        $problem = $this->problemRepository->update($input, $id);

        return $this->sendResponse($problem->toArray(), 'Problem updated successfully');
    }

    /**
     * Remove the specified Problem from storage.
     * DELETE /problems/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Problem $problem */
        $problem = $this->problemRepository->find($id);

        if (empty($problem)) {
            return $this->sendError('Problem not found');
        }

        $problem->delete();

        return $this->sendSuccess('Problem deleted successfully');
    }
}
