<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ProblemDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateProblemRequest;
use App\Http\Requests\Admin\UpdateProblemRequest;
use App\Repositories\Admin\ProblemRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProblemController extends AppBaseController
{
    /** @var  ProblemRepository */
    private $problemRepository;

    public function __construct(ProblemRepository $problemRepo)
    {
        $this->problemRepository = $problemRepo;
    }

    /**
     * Display a listing of the Problem.
     *
     * @param ProblemDataTable $problemDataTable
     * @return Response
     */
    public function index(ProblemDataTable $problemDataTable)
    {
        return $problemDataTable->render('admin.problems.index');
    }

    /**
     * Show the form for creating a new Problem.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.problems.create');
    }

    /**
     * Store a newly created Problem in storage.
     *
     * @param CreateProblemRequest $request
     *
     * @return Response
     */
    public function store(CreateProblemRequest $request)
    {
        $input = $request->all();

        $problem = $this->problemRepository->create($input);

        Flash::success('Problem saved successfully.');

        return redirect(route('admin.problems.index'));
    }

    /**
     * Display the specified Problem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $problem = $this->problemRepository->find($id);

        if (empty($problem)) {
            Flash::error('Problem not found');

            return redirect(route('admin.problems.index'));
        }

        return view('admin.problems.show')->with('problem', $problem);
    }

    /**
     * Show the form for editing the specified Problem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $problem = $this->problemRepository->find($id);

        if (empty($problem)) {
            Flash::error('Problem not found');

            return redirect(route('admin.problems.index'));
        }

        return view('admin.problems.edit')->with('problem', $problem);
    }

    /**
     * Update the specified Problem in storage.
     *
     * @param  int              $id
     * @param UpdateProblemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProblemRequest $request)
    {
        $problem = $this->problemRepository->find($id);

        if (empty($problem)) {
            Flash::error('Problem not found');

            return redirect(route('admin.problems.index'));
        }

        $problem = $this->problemRepository->update($request->all(), $id);

        Flash::success('Problem updated successfully.');

        return redirect(route('admin.problems.index'));
    }

    /**
     * Remove the specified Problem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $problem = $this->problemRepository->find($id);

        if (empty($problem)) {
            Flash::error('Problem not found');

            return redirect(route('admin.problems.index'));
        }

        $this->problemRepository->delete($id);

        Flash::success('Problem deleted successfully.');

        return redirect(route('admin.problems.index'));
    }
}
