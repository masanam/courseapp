<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\GradeDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateGradeRequest;
use App\Http\Requests\Admin\UpdateGradeRequest;
use App\Repositories\Admin\GradeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GradeController extends AppBaseController
{
    /** @var  GradeRepository */
    private $gradeRepository;

    public function __construct(GradeRepository $gradeRepo)
    {
        $this->gradeRepository = $gradeRepo;
    }

    /**
     * Display a listing of the Grade.
     *
     * @param GradeDataTable $gradeDataTable
     * @return Response
     */
    public function index(GradeDataTable $gradeDataTable)
    {
        return $gradeDataTable->render('admin.grades.index');
    }

    /**
     * Show the form for creating a new Grade.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.grades.create');
    }

    /**
     * Store a newly created Grade in storage.
     *
     * @param CreateGradeRequest $request
     *
     * @return Response
     */
    public function store(CreateGradeRequest $request)
    {
        $input = $request->all();

        $grade = $this->gradeRepository->create($input);

        Flash::success('Grade saved successfully.');

        return redirect(route('admin.grades.index'));
    }

    /**
     * Display the specified Grade.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $grade = $this->gradeRepository->find($id);

        if (empty($grade)) {
            Flash::error('Grade not found');

            return redirect(route('admin.grades.index'));
        }

        return view('admin.grades.show')->with('grade', $grade);
    }

    /**
     * Show the form for editing the specified Grade.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $grade = $this->gradeRepository->find($id);

        if (empty($grade)) {
            Flash::error('Grade not found');

            return redirect(route('admin.grades.index'));
        }

        return view('admin.grades.edit')->with('grade', $grade);
    }

    /**
     * Update the specified Grade in storage.
     *
     * @param  int              $id
     * @param UpdateGradeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGradeRequest $request)
    {
        $grade = $this->gradeRepository->find($id);

        if (empty($grade)) {
            Flash::error('Grade not found');

            return redirect(route('admin.grades.index'));
        }

        $grade = $this->gradeRepository->update($request->all(), $id);

        Flash::success('Grade updated successfully.');

        return redirect(route('admin.grades.index'));
    }

    /**
     * Remove the specified Grade from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $grade = $this->gradeRepository->find($id);

        if (empty($grade)) {
            Flash::error('Grade not found');

            return redirect(route('admin.grades.index'));
        }

        $this->gradeRepository->delete($id);

        Flash::success('Grade deleted successfully.');

        return redirect(route('admin.grades.index'));
    }
}
