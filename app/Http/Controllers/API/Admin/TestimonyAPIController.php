<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateTestimonyAPIRequest;
use App\Http\Requests\API\Admin\UpdateTestimonyAPIRequest;
use App\Models\Admin\Testimony;
use App\Repositories\Admin\TestimonyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TestimonyController
 * @package App\Http\Controllers\API\Admin
 */

class TestimonyAPIController extends AppBaseController
{
    /** @var  TestimonyRepository */
    private $testimonyRepository;

    public function __construct(TestimonyRepository $testimonyRepo)
    {
        $this->testimonyRepository = $testimonyRepo;
    }

    /**
     * Display a listing of the Testimony.
     * GET|HEAD /testimonies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $testimonies = $this->testimonyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($testimonies->toArray(), 'Testimonies retrieved successfully');
    }

    /**
     * Store a newly created Testimony in storage.
     * POST /testimonies
     *
     * @param CreateTestimonyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTestimonyAPIRequest $request)
    {
        $input = $request->all();

        $testimony = $this->testimonyRepository->create($input);

        return $this->sendResponse($testimony->toArray(), 'Testimony saved successfully');
    }

    /**
     * Display the specified Testimony.
     * GET|HEAD /testimonies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Testimony $testimony */
        $testimony = $this->testimonyRepository->find($id);

        if (empty($testimony)) {
            return $this->sendError('Testimony not found');
        }

        return $this->sendResponse($testimony->toArray(), 'Testimony retrieved successfully');
    }

    /**
     * Update the specified Testimony in storage.
     * PUT/PATCH /testimonies/{id}
     *
     * @param int $id
     * @param UpdateTestimonyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestimonyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Testimony $testimony */
        $testimony = $this->testimonyRepository->find($id);

        if (empty($testimony)) {
            return $this->sendError('Testimony not found');
        }

        $testimony = $this->testimonyRepository->update($input, $id);

        return $this->sendResponse($testimony->toArray(), 'Testimony updated successfully');
    }

    /**
     * Remove the specified Testimony from storage.
     * DELETE /testimonies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Testimony $testimony */
        $testimony = $this->testimonyRepository->find($id);

        if (empty($testimony)) {
            return $this->sendError('Testimony not found');
        }

        $testimony->delete();

        return $this->sendSuccess('Testimony deleted successfully');
    }
}
