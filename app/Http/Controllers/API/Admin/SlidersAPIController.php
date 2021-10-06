<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateSlidersAPIRequest;
use App\Http\Requests\API\Admin\UpdateSlidersAPIRequest;
use App\Models\Admin\Sliders;
use App\Repositories\Admin\SlidersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SlidersController
 * @package App\Http\Controllers\API\Admin
 */

class SlidersAPIController extends AppBaseController
{
    /** @var  SlidersRepository */
    private $slidersRepository;

    public function __construct(SlidersRepository $slidersRepo)
    {
        $this->slidersRepository = $slidersRepo;
    }

    /**
     * Display a listing of the Sliders.
     * GET|HEAD /sliders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sliders = $this->slidersRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sliders->toArray(), 'Sliders retrieved successfully');
    }

    /**
     * Store a newly created Sliders in storage.
     * POST /sliders
     *
     * @param CreateSlidersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSlidersAPIRequest $request)
    {
        $input = $request->all();

        $sliders = $this->slidersRepository->create($input);

        return $this->sendResponse($sliders->toArray(), 'Sliders saved successfully');
    }

    /**
     * Display the specified Sliders.
     * GET|HEAD /sliders/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Sliders $sliders */
        $sliders = $this->slidersRepository->find($id);

        if (empty($sliders)) {
            return $this->sendError('Sliders not found');
        }

        return $this->sendResponse($sliders->toArray(), 'Sliders retrieved successfully');
    }

    /**
     * Update the specified Sliders in storage.
     * PUT/PATCH /sliders/{id}
     *
     * @param int $id
     * @param UpdateSlidersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSlidersAPIRequest $request)
    {
        $input = $request->all();

        /** @var Sliders $sliders */
        $sliders = $this->slidersRepository->find($id);

        if (empty($sliders)) {
            return $this->sendError('Sliders not found');
        }

        $sliders = $this->slidersRepository->update($input, $id);

        return $this->sendResponse($sliders->toArray(), 'Sliders updated successfully');
    }

    /**
     * Remove the specified Sliders from storage.
     * DELETE /sliders/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Sliders $sliders */
        $sliders = $this->slidersRepository->find($id);

        if (empty($sliders)) {
            return $this->sendError('Sliders not found');
        }

        $sliders->delete();

        return $this->sendSuccess('Sliders deleted successfully');
    }
}
