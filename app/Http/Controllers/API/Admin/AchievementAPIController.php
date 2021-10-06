<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateAchievementAPIRequest;
use App\Http\Requests\API\Admin\UpdateAchievementAPIRequest;
use App\Models\Admin\Achievement;
use App\Repositories\Admin\AchievementRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AchievementController
 * @package App\Http\Controllers\API\Admin
 */

class AchievementAPIController extends AppBaseController
{
    /** @var  AchievementRepository */
    private $achievementRepository;

    public function __construct(AchievementRepository $achievementRepo)
    {
        $this->achievementRepository = $achievementRepo;
    }

    /**
     * Display a listing of the Achievement.
     * GET|HEAD /achievements
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $achievements = $this->achievementRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($achievements->toArray(), 'Achievements retrieved successfully');
    }

    /**
     * Store a newly created Achievement in storage.
     * POST /achievements
     *
     * @param CreateAchievementAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAchievementAPIRequest $request)
    {
        $input = $request->all();

        $achievement = $this->achievementRepository->create($input);

        return $this->sendResponse($achievement->toArray(), 'Achievement saved successfully');
    }

    /**
     * Display the specified Achievement.
     * GET|HEAD /achievements/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Achievement $achievement */
        $achievement = $this->achievementRepository->find($id);

        if (empty($achievement)) {
            return $this->sendError('Achievement not found');
        }

        return $this->sendResponse($achievement->toArray(), 'Achievement retrieved successfully');
    }

    /**
     * Update the specified Achievement in storage.
     * PUT/PATCH /achievements/{id}
     *
     * @param int $id
     * @param UpdateAchievementAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAchievementAPIRequest $request)
    {
        $input = $request->all();

        /** @var Achievement $achievement */
        $achievement = $this->achievementRepository->find($id);

        if (empty($achievement)) {
            return $this->sendError('Achievement not found');
        }

        $achievement = $this->achievementRepository->update($input, $id);

        return $this->sendResponse($achievement->toArray(), 'Achievement updated successfully');
    }

    /**
     * Remove the specified Achievement from storage.
     * DELETE /achievements/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Achievement $achievement */
        $achievement = $this->achievementRepository->find($id);

        if (empty($achievement)) {
            return $this->sendError('Achievement not found');
        }

        $achievement->delete();

        return $this->sendSuccess('Achievement deleted successfully');
    }
}
