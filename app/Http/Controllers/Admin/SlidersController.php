<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SlidersDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateSlidersRequest;
use App\Http\Requests\Admin\UpdateSlidersRequest;
use App\Repositories\Admin\SlidersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SlidersController extends AppBaseController
{
    /** @var  SlidersRepository */
    private $slidersRepository;

    public function __construct(SlidersRepository $slidersRepo)
    {
        $this->slidersRepository = $slidersRepo;
    }

    /**
     * Display a listing of the Sliders.
     *
     * @param SlidersDataTable $slidersDataTable
     * @return Response
     */
    public function index(SlidersDataTable $slidersDataTable)
    {
        return $slidersDataTable->render('admin.sliders.index');
    }

    /**
     * Show the form for creating a new Sliders.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created Sliders in storage.
     *
     * @param CreateSlidersRequest $request
     *
     * @return Response
     */
    public function store(CreateSlidersRequest $request)
    {
        $input = $request->all();

        $sliders = $this->slidersRepository->create($input);

        Flash::success('Sliders saved successfully.');

        return redirect(route('admin.sliders.index'));
    }

    /**
     * Display the specified Sliders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sliders = $this->slidersRepository->find($id);

        if (empty($sliders)) {
            Flash::error('Sliders not found');

            return redirect(route('admin.sliders.index'));
        }

        return view('admin.sliders.show')->with('sliders', $sliders);
    }

    /**
     * Show the form for editing the specified Sliders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sliders = $this->slidersRepository->find($id);

        if (empty($sliders)) {
            Flash::error('Sliders not found');

            return redirect(route('admin.sliders.index'));
        }

        return view('admin.sliders.edit')->with('sliders', $sliders);
    }

    /**
     * Update the specified Sliders in storage.
     *
     * @param  int              $id
     * @param UpdateSlidersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSlidersRequest $request)
    {
        $sliders = $this->slidersRepository->find($id);

        if (empty($sliders)) {
            Flash::error('Sliders not found');

            return redirect(route('admin.sliders.index'));
        }

        $sliders = $this->slidersRepository->update($request->all(), $id);

        Flash::success('Sliders updated successfully.');

        return redirect(route('admin.sliders.index'));
    }

    /**
     * Remove the specified Sliders from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sliders = $this->slidersRepository->find($id);

        if (empty($sliders)) {
            Flash::error('Sliders not found');

            return redirect(route('admin.sliders.index'));
        }

        $this->slidersRepository->delete($id);

        Flash::success('Sliders deleted successfully.');

        return redirect(route('admin.sliders.index'));
    }
}
