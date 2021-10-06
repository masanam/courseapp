<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateSubjectAPIRequest;
use App\Http\Requests\API\Admin\UpdateSubjectAPIRequest;
use App\Models\Admin\Subject;
use App\Repositories\Admin\SubjectRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubjectController
 * @package App\Http\Controllers\API\Admin
 */

class SubjectAPIController extends AppBaseController
{
    /** @var  SubjectRepository */
    private $subjectRepository;

    public function __construct(SubjectRepository $subjectRepo)
    {
        $this->subjectRepository = $subjectRepo;
    }

    /**
     * Display a listing of the Subject.
     * GET|HEAD /subjects
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $subjects = $this->subjectRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subjects->toArray(), 'Subjects retrieved successfully');
    }

    /**
     * Store a newly created Subject in storage.
     * POST /subjects
     *
     * @param CreateSubjectAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSubjectAPIRequest $request)
    {
        $input = $request->all();

        $subject = $this->subjectRepository->create($input);

        return $this->sendResponse($subject->toArray(), 'Subject saved successfully');
    }

    /**
     * Display the specified Subject.
     * GET|HEAD /subjects/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Subject $subject */
        $subject = $this->subjectRepository->find($id);

        if (empty($subject)) {
            return $this->sendError('Subject not found');
        }

        return $this->sendResponse($subject->toArray(), 'Subject retrieved successfully');
    }

    /**
     * Update the specified Subject in storage.
     * PUT/PATCH /subjects/{id}
     *
     * @param int $id
     * @param UpdateSubjectAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubjectAPIRequest $request)
    {
        $input = $request->all();

        /** @var Subject $subject */
        $subject = $this->subjectRepository->find($id);

        if (empty($subject)) {
            return $this->sendError('Subject not found');
        }

        $subject = $this->subjectRepository->update($input, $id);

        return $this->sendResponse($subject->toArray(), 'Subject updated successfully');
    }

    /**
     * Remove the specified Subject from storage.
     * DELETE /subjects/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Subject $subject */
        $subject = $this->subjectRepository->find($id);

        if (empty($subject)) {
            return $this->sendError('Subject not found');
        }

        $subject->delete();

        return $this->sendSuccess('Subject deleted successfully');
    }
}
