<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\FeatureDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateFeatureRequest;
use App\Http\Requests\Admin\UpdateFeatureRequest;
use App\Repositories\Admin\FeatureRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FeatureController extends AppBaseController
{
    /** @var  FeatureRepository */
    private $featureRepository;

    public function __construct(FeatureRepository $featureRepo)
    {
        $this->featureRepository = $featureRepo;
    }

    /**
     * Display a listing of the Feature.
     *
     * @param FeatureDataTable $featureDataTable
     * @return Response
     */
    public function index(FeatureDataTable $featureDataTable)
    {
        return $featureDataTable->render('admin.features.index');
    }

    /**
     * Show the form for creating a new Feature.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.features.create');
    }

    /**
     * Store a newly created Feature in storage.
     *
     * @param CreateFeatureRequest $request
     *
     * @return Response
     */
    public function store(CreateFeatureRequest $request)
    {
        $input = $request->all();

        $feature = $this->featureRepository->create($input);

        Flash::success('Feature saved successfully.');

        return redirect(route('admin.features.index'));
    }

    /**
     * Display the specified Feature.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $feature = $this->featureRepository->find($id);

        if (empty($feature)) {
            Flash::error('Feature not found');

            return redirect(route('admin.features.index'));
        }

        return view('admin.features.show')->with('feature', $feature);
    }

    /**
     * Show the form for editing the specified Feature.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $feature = $this->featureRepository->find($id);

        if (empty($feature)) {
            Flash::error('Feature not found');

            return redirect(route('admin.features.index'));
        }

        return view('admin.features.edit')->with('feature', $feature);
    }

    /**
     * Update the specified Feature in storage.
     *
     * @param  int              $id
     * @param UpdateFeatureRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFeatureRequest $request)
    {
        $feature = $this->featureRepository->find($id);

        if (empty($feature)) {
            Flash::error('Feature not found');

            return redirect(route('admin.features.index'));
        }

        $feature = $this->featureRepository->update($request->all(), $id);

        Flash::success('Feature updated successfully.');

        return redirect(route('admin.features.index'));
    }

    /**
     * Remove the specified Feature from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $feature = $this->featureRepository->find($id);

        if (empty($feature)) {
            Flash::error('Feature not found');

            return redirect(route('admin.features.index'));
        }

        $this->featureRepository->delete($id);

        Flash::success('Feature deleted successfully.');

        return redirect(route('admin.features.index'));
    }
}
