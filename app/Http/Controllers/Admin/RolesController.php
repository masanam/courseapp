<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RolesDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use App\Repositories\Admin\RolesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RolesController extends AppBaseController
{
    /** @var  RolesRepository */
    private $rolesRepository;

    public function __construct(RolesRepository $rolesRepo)
    {
        $this->rolesRepository = $rolesRepo;
    }

    /**
     * Display a listing of the Roles.
     *
     * @param RolesDataTable $rolesDataTable
     * @return Response
     */
    public function index(RolesDataTable $rolesDataTable)
    {
        return $rolesDataTable->render('admin.roles.index');
    }

    /**
     * Show the form for creating a new Roles.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created Roles in storage.
     *
     * @param CreateRolesRequest $request
     *
     * @return Response
     */
    public function store(CreateRolesRequest $request)
    {
        $input = $request->all();

        $roles = $this->rolesRepository->create($input);

        Flash::success('Roles saved successfully.');

        return redirect(route('admin.roles.index'));
    }

    /**
     * Display the specified Roles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('admin.roles.index'));
        }

        return view('admin.roles.show')->with('roles', $roles);
    }

    /**
     * Show the form for editing the specified Roles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('admin.roles.index'));
        }

        return view('admin.roles.edit')->with('roles', $roles);
    }

    /**
     * Update the specified Roles in storage.
     *
     * @param  int              $id
     * @param UpdateRolesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRolesRequest $request)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('admin.roles.index'));
        }

        $roles = $this->rolesRepository->update($request->all(), $id);

        Flash::success('Roles updated successfully.');

        return redirect(route('admin.roles.index'));
    }

    /**
     * Remove the specified Roles from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('admin.roles.index'));
        }

        $this->rolesRepository->delete($id);

        Flash::success('Roles deleted successfully.');

        return redirect(route('admin.roles.index'));
    }
}
