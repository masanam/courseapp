<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreatePermissionsAPIRequest;
use App\Http\Requests\API\Admin\UpdatePermissionsAPIRequest;
use App\Models\Admin\Permissions;
use App\Repositories\Admin\PermissionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PermissionsController
 * @package App\Http\Controllers\API\Admin
 */

class PermissionsAPIController extends AppBaseController
{
    /** @var  PermissionsRepository */
    private $permissionsRepository;

    public function __construct(PermissionsRepository $permissionsRepo)
    {
        $this->permissionsRepository = $permissionsRepo;
    }

    /**
     * Display a listing of the Permissions.
     * GET|HEAD /permissions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $permissions = $this->permissionsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($permissions->toArray(), 'Permissions retrieved successfully');
    }

    /**
     * Store a newly created Permissions in storage.
     * POST /permissions
     *
     * @param CreatePermissionsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionsAPIRequest $request)
    {
        $input = $request->all();

        $permissions = $this->permissionsRepository->create($input);

        return $this->sendResponse($permissions->toArray(), 'Permissions saved successfully');
    }

    /**
     * Display the specified Permissions.
     * GET|HEAD /permissions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Permissions $permissions */
        $permissions = $this->permissionsRepository->find($id);

        if (empty($permissions)) {
            return $this->sendError('Permissions not found');
        }

        return $this->sendResponse($permissions->toArray(), 'Permissions retrieved successfully');
    }

    /**
     * Update the specified Permissions in storage.
     * PUT/PATCH /permissions/{id}
     *
     * @param int $id
     * @param UpdatePermissionsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Permissions $permissions */
        $permissions = $this->permissionsRepository->find($id);

        if (empty($permissions)) {
            return $this->sendError('Permissions not found');
        }

        $permissions = $this->permissionsRepository->update($input, $id);

        return $this->sendResponse($permissions->toArray(), 'Permissions updated successfully');
    }

    /**
     * Remove the specified Permissions from storage.
     * DELETE /permissions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Permissions $permissions */
        $permissions = $this->permissionsRepository->find($id);

        if (empty($permissions)) {
            return $this->sendError('Permissions not found');
        }

        $permissions->delete();

        return $this->sendSuccess('Permissions deleted successfully');
    }
}
