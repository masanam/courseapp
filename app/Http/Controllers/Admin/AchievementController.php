<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AchievementDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateAchievementRequest;
use App\Http\Requests\Admin\UpdateAchievementRequest;
use App\Repositories\Admin\AchievementRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AchievementController extends AppBaseController
{
    /** @var  AchievementRepository */
    private $achievementRepository;

    public function __construct(AchievementRepository $achievementRepo)
    {
        $this->achievementRepository = $achievementRepo;
    }

    /**
     * Display a listing of the Achievement.
     *
     * @param AchievementDataTable $achievementDataTable
     * @return Response
     */
    public function index(AchievementDataTable $achievementDataTable)
    {
        return $achievementDataTable->render('admin.achievements.index');
    }

    /**
     * Show the form for creating a new Achievement.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.achievements.create');
    }

    /**
     * Store a newly created Achievement in storage.
     *
     * @param CreateAchievementRequest $request
     *
     * @return Response
     */
    public function store(CreateAchievementRequest $request)
    {
        $input = $request->all();

        $achievement = $this->achievementRepository->create($input);

        Flash::success('Achievement saved successfully.');

        return redirect(route('admin.achievements.index'));
    }

    /**
     * Display the specified Achievement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $achievement = $this->achievementRepository->find($id);

        if (empty($achievement)) {
            Flash::error('Achievement not found');

            return redirect(route('admin.achievements.index'));
        }

        return view('admin.achievements.show')->with('achievement', $achievement);
    }

    /**
     * Show the form for editing the specified Achievement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $achievement = $this->achievementRepository->find($id);

        if (empty($achievement)) {
            Flash::error('Achievement not found');

            return redirect(route('admin.achievements.index'));
        }

        return view('admin.achievements.edit')->with('achievement', $achievement);
    }

    /**
     * Update the specified Achievement in storage.
     *
     * @param  int              $id
     * @param UpdateAchievementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAchievementRequest $request)
    {
        $achievement = $this->achievementRepository->find($id);

        if (empty($achievement)) {
            Flash::error('Achievement not found');

            return redirect(route('admin.achievements.index'));
        }

        $achievement = $this->achievementRepository->update($request->all(), $id);

        Flash::success('Achievement updated successfully.');

        return redirect(route('admin.achievements.index'));
    }

    /**
     * Remove the specified Achievement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $achievement = $this->achievementRepository->find($id);

        if (empty($achievement)) {
            Flash::error('Achievement not found');

            return redirect(route('admin.achievements.index'));
        }

        $this->achievementRepository->delete($id);

        Flash::success('Achievement deleted successfully.');

        return redirect(route('admin.achievements.index'));
    }
}
