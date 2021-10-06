<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateUserTypesAPIRequest;
use App\Http\Requests\API\Admin\UpdateUserTypesAPIRequest;
use App\Models\Admin\UserTypes;
use App\Repositories\Admin\UserTypesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserTypesController
 * @package App\Http\Controllers\API\Admin
 */

class UserTypesAPIController extends AppBaseController
{
    /** @var  UserTypesRepository */
    private $userTypesRepository;

    public function __construct(UserTypesRepository $userTypesRepo)
    {
        $this->userTypesRepository = $userTypesRepo;
    }

    /**
     * Display a listing of the UserTypes.
     * GET|HEAD /userTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userTypes = $this->userTypesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($userTypes->toArray(), 'User Types retrieved successfully');
    }

    /**
     * Store a newly created UserTypes in storage.
     * POST /userTypes
     *
     * @param CreateUserTypesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserTypesAPIRequest $request)
    {
        $input = $request->all();

        $userTypes = $this->userTypesRepository->create($input);

        return $this->sendResponse($userTypes->toArray(), 'User Types saved successfully');
    }

    /**
     * Display the specified UserTypes.
     * GET|HEAD /userTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserTypes $userTypes */
        $userTypes = $this->userTypesRepository->find($id);

        if (empty($userTypes)) {
            return $this->sendError('User Types not found');
        }

        return $this->sendResponse($userTypes->toArray(), 'User Types retrieved successfully');
    }

    /**
     * Update the specified UserTypes in storage.
     * PUT/PATCH /userTypes/{id}
     *
     * @param int $id
     * @param UpdateUserTypesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserTypesAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserTypes $userTypes */
        $userTypes = $this->userTypesRepository->find($id);

        if (empty($userTypes)) {
            return $this->sendError('User Types not found');
        }

        $userTypes = $this->userTypesRepository->update($input, $id);

        return $this->sendResponse($userTypes->toArray(), 'UserTypes updated successfully');
    }

    /**
     * Remove the specified UserTypes from storage.
     * DELETE /userTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserTypes $userTypes */
        $userTypes = $this->userTypesRepository->find($id);

        if (empty($userTypes)) {
            return $this->sendError('User Types not found');
        }

        $userTypes->delete();

        return $this->sendSuccess('User Types deleted successfully');
    }
}
