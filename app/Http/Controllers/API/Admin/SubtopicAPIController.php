<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateSubtopicAPIRequest;
use App\Http\Requests\API\Admin\UpdateSubtopicAPIRequest;
use App\Models\Admin\Subtopic;
use App\Repositories\Admin\SubtopicRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubtopicController
 * @package App\Http\Controllers\API\Admin
 */

class SubtopicAPIController extends AppBaseController
{
    /** @var  SubtopicRepository */
    private $subtopicRepository;

    public function __construct(SubtopicRepository $subtopicRepo)
    {
        $this->subtopicRepository = $subtopicRepo;
    }

    /**
     * Display a listing of the Subtopic.
     * GET|HEAD /subtopics
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $subtopics = $this->subtopicRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subtopics->toArray(), 'Subtopics retrieved successfully');
    }

    /**
     * Store a newly created Subtopic in storage.
     * POST /subtopics
     *
     * @param CreateSubtopicAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSubtopicAPIRequest $request)
    {
        $input = $request->all();

        $subtopic = $this->subtopicRepository->create($input);

        return $this->sendResponse($subtopic->toArray(), 'Subtopic saved successfully');
    }

    /**
     * Display the specified Subtopic.
     * GET|HEAD /subtopics/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Subtopic $subtopic */
        $subtopic = $this->subtopicRepository->find($id);

        if (empty($subtopic)) {
            return $this->sendError('Subtopic not found');
        }

        return $this->sendResponse($subtopic->toArray(), 'Subtopic retrieved successfully');
    }

    /**
     * Update the specified Subtopic in storage.
     * PUT/PATCH /subtopics/{id}
     *
     * @param int $id
     * @param UpdateSubtopicAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubtopicAPIRequest $request)
    {
        $input = $request->all();

        /** @var Subtopic $subtopic */
        $subtopic = $this->subtopicRepository->find($id);

        if (empty($subtopic)) {
            return $this->sendError('Subtopic not found');
        }

        $subtopic = $this->subtopicRepository->update($input, $id);

        return $this->sendResponse($subtopic->toArray(), 'Subtopic updated successfully');
    }

    /**
     * Remove the specified Subtopic from storage.
     * DELETE /subtopics/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Subtopic $subtopic */
        $subtopic = $this->subtopicRepository->find($id);

        if (empty($subtopic)) {
            return $this->sendError('Subtopic not found');
        }

        $subtopic->delete();

        return $this->sendSuccess('Subtopic deleted successfully');
    }
}
