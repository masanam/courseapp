<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateFeatureAPIRequest;
use App\Http\Requests\API\Admin\UpdateFeatureAPIRequest;
use App\Models\Admin\Feature;
use App\Repositories\Admin\FeatureRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FeatureController
 * @package App\Http\Controllers\API\Admin
 */

class FeatureAPIController extends AppBaseController
{
    /** @var  FeatureRepository */
    private $featureRepository;

    public function __construct(FeatureRepository $featureRepo)
    {
        $this->featureRepository = $featureRepo;
    }

    /**
     * Display a listing of the Feature.
     * GET|HEAD /features
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $features = $this->featureRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($features->toArray(), 'Features retrieved successfully');
    }

    /**
     * Store a newly created Feature in storage.
     * POST /features
     *
     * @param CreateFeatureAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFeatureAPIRequest $request)
    {
        $input = $request->all();

        $feature = $this->featureRepository->create($input);

        return $this->sendResponse($feature->toArray(), 'Feature saved successfully');
    }

    /**
     * Display the specified Feature.
     * GET|HEAD /features/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Feature $feature */
        $feature = $this->featureRepository->find($id);

        if (empty($feature)) {
            return $this->sendError('Feature not found');
        }

        return $this->sendResponse($feature->toArray(), 'Feature retrieved successfully');
    }

    /**
     * Update the specified Feature in storage.
     * PUT/PATCH /features/{id}
     *
     * @param int $id
     * @param UpdateFeatureAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFeatureAPIRequest $request)
    {
        $input = $request->all();

        /** @var Feature $feature */
        $feature = $this->featureRepository->find($id);

        if (empty($feature)) {
            return $this->sendError('Feature not found');
        }

        $feature = $this->featureRepository->update($input, $id);

        return $this->sendResponse($feature->toArray(), 'Feature updated successfully');
    }

    /**
     * Remove the specified Feature from storage.
     * DELETE /features/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Feature $feature */
        $feature = $this->featureRepository->find($id);

        if (empty($feature)) {
            return $this->sendError('Feature not found');
        }

        $feature->delete();

        return $this->sendSuccess('Feature deleted successfully');
    }
}
