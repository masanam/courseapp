<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UserTypesDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateUserTypesRequest;
use App\Http\Requests\Admin\UpdateUserTypesRequest;
use App\Repositories\Admin\UserTypesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UserTypesController extends AppBaseController
{
    /** @var  UserTypesRepository */
    private $userTypesRepository;

    public function __construct(UserTypesRepository $userTypesRepo)
    {
        $this->userTypesRepository = $userTypesRepo;
    }

    /**
     * Display a listing of the UserTypes.
     *
     * @param UserTypesDataTable $userTypesDataTable
     * @return Response
     */
    public function index(UserTypesDataTable $userTypesDataTable)
    {
        return $userTypesDataTable->render('admin.user_types.index');
    }

    /**
     * Show the form for creating a new UserTypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.user_types.create');
    }

    /**
     * Store a newly created UserTypes in storage.
     *
     * @param CreateUserTypesRequest $request
     *
     * @return Response
     */
    public function store(CreateUserTypesRequest $request)
    {
        $input = $request->all();

        $userTypes = $this->userTypesRepository->create($input);

        Flash::success('User Types saved successfully.');

        return redirect(route('admin.userTypes.index'));
    }

    /**
     * Display the specified UserTypes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userTypes = $this->userTypesRepository->find($id);

        if (empty($userTypes)) {
            Flash::error('User Types not found');

            return redirect(route('admin.userTypes.index'));
        }

        return view('admin.user_types.show')->with('userTypes', $userTypes);
    }

    /**
     * Show the form for editing the specified UserTypes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userTypes = $this->userTypesRepository->find($id);

        if (empty($userTypes)) {
            Flash::error('User Types not found');

            return redirect(route('admin.userTypes.index'));
        }

        return view('admin.user_types.edit')->with('userTypes', $userTypes);
    }

    /**
     * Update the specified UserTypes in storage.
     *
     * @param  int              $id
     * @param UpdateUserTypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserTypesRequest $request)
    {
        $userTypes = $this->userTypesRepository->find($id);

        if (empty($userTypes)) {
            Flash::error('User Types not found');

            return redirect(route('admin.userTypes.index'));
        }

        $userTypes = $this->userTypesRepository->update($request->all(), $id);

        Flash::success('User Types updated successfully.');

        return redirect(route('admin.userTypes.index'));
    }

    /**
     * Remove the specified UserTypes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userTypes = $this->userTypesRepository->find($id);

        if (empty($userTypes)) {
            Flash::error('User Types not found');

            return redirect(route('admin.userTypes.index'));
        }

        $this->userTypesRepository->delete($id);

        Flash::success('User Types deleted successfully.');

        return redirect(route('admin.userTypes.index'));
    }
}
