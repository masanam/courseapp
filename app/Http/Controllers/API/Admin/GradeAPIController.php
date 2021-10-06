<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateGradeAPIRequest;
use App\Http\Requests\API\Admin\UpdateGradeAPIRequest;
use App\Models\Admin\Grade;
use App\Repositories\Admin\GradeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class GradeController
 * @package App\Http\Controllers\API\Admin
 */

class GradeAPIController extends AppBaseController
{
    /** @var  GradeRepository */
    private $gradeRepository;

    public function __construct(GradeRepository $gradeRepo)
    {
        $this->gradeRepository = $gradeRepo;
    }

    /**
     * Display a listing of the Grade.
     * GET|HEAD /grades
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $grades = $this->gradeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($grades->toArray(), 'Grades retrieved successfully');
    }

    /**
     * Store a newly created Grade in storage.
     * POST /grades
     *
     * @param CreateGradeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGradeAPIRequest $request)
    {
        $input = $request->all();

        $grade = $this->gradeRepository->create($input);

        return $this->sendResponse($grade->toArray(), 'Grade saved successfully');
    }

    /**
     * Display the specified Grade.
     * GET|HEAD /grades/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Grade $grade */
        $grade = $this->gradeRepository->find($id);

        if (empty($grade)) {
            return $this->sendError('Grade not found');
        }

        return $this->sendResponse($grade->toArray(), 'Grade retrieved successfully');
    }

    /**
     * Update the specified Grade in storage.
     * PUT/PATCH /grades/{id}
     *
     * @param int $id
     * @param UpdateGradeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGradeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Grade $grade */
        $grade = $this->gradeRepository->find($id);

        if (empty($grade)) {
            return $this->sendError('Grade not found');
        }

        $grade = $this->gradeRepository->update($input, $id);

        return $this->sendResponse($grade->toArray(), 'Grade updated successfully');
    }

    /**
     * Remove the specified Grade from storage.
     * DELETE /grades/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Grade $grade */
        $grade = $this->gradeRepository->find($id);

        if (empty($grade)) {
            return $this->sendError('Grade not found');
        }

        $grade->delete();

        return $this->sendSuccess('Grade deleted successfully');
    }
}
