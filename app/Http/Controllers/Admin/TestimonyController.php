<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\TestimonyDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateTestimonyRequest;
use App\Http\Requests\Admin\UpdateTestimonyRequest;
use App\Repositories\Admin\TestimonyRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TestimonyController extends AppBaseController
{
    /** @var  TestimonyRepository */
    private $testimonyRepository;

    public function __construct(TestimonyRepository $testimonyRepo)
    {
        $this->testimonyRepository = $testimonyRepo;
    }

    /**
     * Display a listing of the Testimony.
     *
     * @param TestimonyDataTable $testimonyDataTable
     * @return Response
     */
    public function index(TestimonyDataTable $testimonyDataTable)
    {
        return $testimonyDataTable->render('admin.testimonies.index');
    }

    /**
     * Show the form for creating a new Testimony.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.testimonies.create');
    }

    /**
     * Store a newly created Testimony in storage.
     *
     * @param CreateTestimonyRequest $request
     *
     * @return Response
     */
    public function store(CreateTestimonyRequest $request)
    {
        $input = $request->all();

        $testimony = $this->testimonyRepository->create($input);

        Flash::success('Testimony saved successfully.');

        return redirect(route('admin.testimonies.index'));
    }

    /**
     * Display the specified Testimony.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $testimony = $this->testimonyRepository->find($id);

        if (empty($testimony)) {
            Flash::error('Testimony not found');

            return redirect(route('admin.testimonies.index'));
        }

        return view('admin.testimonies.show')->with('testimony', $testimony);
    }

    /**
     * Show the form for editing the specified Testimony.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $testimony = $this->testimonyRepository->find($id);

        if (empty($testimony)) {
            Flash::error('Testimony not found');

            return redirect(route('admin.testimonies.index'));
        }

        return view('admin.testimonies.edit')->with('testimony', $testimony);
    }

    /**
     * Update the specified Testimony in storage.
     *
     * @param  int              $id
     * @param UpdateTestimonyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestimonyRequest $request)
    {
        $testimony = $this->testimonyRepository->find($id);

        if (empty($testimony)) {
            Flash::error('Testimony not found');

            return redirect(route('admin.testimonies.index'));
        }

        $testimony = $this->testimonyRepository->update($request->all(), $id);

        Flash::success('Testimony updated successfully.');

        return redirect(route('admin.testimonies.index'));
    }

    /**
     * Remove the specified Testimony from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $testimony = $this->testimonyRepository->find($id);

        if (empty($testimony)) {
            Flash::error('Testimony not found');

            return redirect(route('admin.testimonies.index'));
        }

        $this->testimonyRepository->delete($id);

        Flash::success('Testimony deleted successfully.');

        return redirect(route('admin.testimonies.index'));
    }
}
