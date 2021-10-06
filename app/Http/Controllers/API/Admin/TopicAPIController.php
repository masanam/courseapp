<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateTopicAPIRequest;
use App\Http\Requests\API\Admin\UpdateTopicAPIRequest;
use App\Models\Admin\Topic;
use App\Repositories\Admin\TopicRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TopicController
 * @package App\Http\Controllers\API\Admin
 */

class TopicAPIController extends AppBaseController
{
    /** @var  TopicRepository */
    private $topicRepository;

    public function __construct(TopicRepository $topicRepo)
    {
        $this->topicRepository = $topicRepo;
    }

    /**
     * Display a listing of the Topic.
     * GET|HEAD /topics
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $topics = $this->topicRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($topics->toArray(), 'Topics retrieved successfully');
    }

    /**
     * Store a newly created Topic in storage.
     * POST /topics
     *
     * @param CreateTopicAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTopicAPIRequest $request)
    {
        $input = $request->all();

        $topic = $this->topicRepository->create($input);

        return $this->sendResponse($topic->toArray(), 'Topic saved successfully');
    }

    /**
     * Display the specified Topic.
     * GET|HEAD /topics/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Topic $topic */
        $topic = $this->topicRepository->find($id);

        if (empty($topic)) {
            return $this->sendError('Topic not found');
        }

        return $this->sendResponse($topic->toArray(), 'Topic retrieved successfully');
    }

    /**
     * Update the specified Topic in storage.
     * PUT/PATCH /topics/{id}
     *
     * @param int $id
     * @param UpdateTopicAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTopicAPIRequest $request)
    {
        $input = $request->all();

        /** @var Topic $topic */
        $topic = $this->topicRepository->find($id);

        if (empty($topic)) {
            return $this->sendError('Topic not found');
        }

        $topic = $this->topicRepository->update($input, $id);

        return $this->sendResponse($topic->toArray(), 'Topic updated successfully');
    }

    /**
     * Remove the specified Topic from storage.
     * DELETE /topics/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Topic $topic */
        $topic = $this->topicRepository->find($id);

        if (empty($topic)) {
            return $this->sendError('Topic not found');
        }

        $topic->delete();

        return $this->sendSuccess('Topic deleted successfully');
    }
}
