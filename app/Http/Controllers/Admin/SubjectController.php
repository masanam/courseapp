<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SubjectDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateSubjectRequest;
use App\Http\Requests\Admin\UpdateSubjectRequest;
use App\Repositories\Admin\SubjectRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SubjectController extends AppBaseController
{
    /** @var  SubjectRepository */
    private $subjectRepository;

    public function __construct(SubjectRepository $subjectRepo)
    {
        $this->subjectRepository = $subjectRepo;
    }

    /**
     * Display a listing of the Subject.
     *
     * @param SubjectDataTable $subjectDataTable
     * @return Response
     */
    public function index(SubjectDataTable $subjectDataTable)
    {
        return $subjectDataTable->render('admin.subjects.index');
    }

    /**
     * Show the form for creating a new Subject.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.subjects.create');
    }

    /**
     * Store a newly created Subject in storage.
     *
     * @param CreateSubjectRequest $request
     *
     * @return Response
     */
    public function store(CreateSubjectRequest $request)
    {
        $input = $request->all();

        $subject = $this->subjectRepository->create($input);

        Flash::success('Subject saved successfully.');

        return redirect(route('admin.subjects.index'));
    }

    /**
     * Display the specified Subject.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subject = $this->subjectRepository->find($id);

        if (empty($subject)) {
            Flash::error('Subject not found');

            return redirect(route('admin.subjects.index'));
        }

        return view('admin.subjects.show')->with('subject', $subject);
    }

    /**
     * Show the form for editing the specified Subject.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subject = $this->subjectRepository->find($id);

        if (empty($subject)) {
            Flash::error('Subject not found');

            return redirect(route('admin.subjects.index'));
        }

        return view('admin.subjects.edit')->with('subject', $subject);
    }

    /**
     * Update the specified Subject in storage.
     *
     * @param  int              $id
     * @param UpdateSubjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubjectRequest $request)
    {
        $subject = $this->subjectRepository->find($id);

        if (empty($subject)) {
            Flash::error('Subject not found');

            return redirect(route('admin.subjects.index'));
        }

        $subject = $this->subjectRepository->update($request->all(), $id);

        Flash::success('Subject updated successfully.');

        return redirect(route('admin.subjects.index'));
    }

    /**
     * Remove the specified Subject from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subject = $this->subjectRepository->find($id);

        if (empty($subject)) {
            Flash::error('Subject not found');

            return redirect(route('admin.subjects.index'));
        }

        $this->subjectRepository->delete($id);

        Flash::success('Subject deleted successfully.');

        return redirect(route('admin.subjects.index'));
    }
}
