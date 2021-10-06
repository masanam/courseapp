<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateMenuAPIRequest;
use App\Http\Requests\API\Admin\UpdateMenuAPIRequest;
use App\Models\Admin\Menu;
use App\Repositories\Admin\MenuRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MenuController
 * @package App\Http\Controllers\API\Admin
 */

class MenuAPIController extends AppBaseController
{
    /** @var  MenuRepository */
    private $menuRepository;

    public function __construct(MenuRepository $menuRepo)
    {
        $this->menuRepository = $menuRepo;
    }

    /**
     * Display a listing of the Menu.
     * GET|HEAD /menus
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $menus = $this->menuRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($menus->toArray(), 'Menus retrieved successfully');
    }

    /**
     * Store a newly created Menu in storage.
     * POST /menus
     *
     * @param CreateMenuAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMenuAPIRequest $request)
    {
        $input = $request->all();

        $menu = $this->menuRepository->create($input);

        return $this->sendResponse($menu->toArray(), 'Menu saved successfully');
    }

    /**
     * Display the specified Menu.
     * GET|HEAD /menus/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Menu $menu */
        $menu = $this->menuRepository->find($id);

        if (empty($menu)) {
            return $this->sendError('Menu not found');
        }

        return $this->sendResponse($menu->toArray(), 'Menu retrieved successfully');
    }

    /**
     * Update the specified Menu in storage.
     * PUT/PATCH /menus/{id}
     *
     * @param int $id
     * @param UpdateMenuAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMenuAPIRequest $request)
    {
        $input = $request->all();

        /** @var Menu $menu */
        $menu = $this->menuRepository->find($id);

        if (empty($menu)) {
            return $this->sendError('Menu not found');
        }

        $menu = $this->menuRepository->update($input, $id);

        return $this->sendResponse($menu->toArray(), 'Menu updated successfully');
    }

    /**
     * Remove the specified Menu from storage.
     * DELETE /menus/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Menu $menu */
        $menu = $this->menuRepository->find($id);

        if (empty($menu)) {
            return $this->sendError('Menu not found');
        }

        $menu->delete();

        return $this->sendSuccess('Menu deleted successfully');
    }
}
