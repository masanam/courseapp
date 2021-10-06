<?php namespace Tests\Repositories;

use App\Models\Admin\Achievement;
use App\Repositories\Admin\AchievementRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AchievementRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AchievementRepository
     */
    protected $achievementRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->achievementRepo = \App::make(AchievementRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_achievement()
    {
        $achievement = Achievement::factory()->make()->toArray();

        $createdAchievement = $this->achievementRepo->create($achievement);

        $createdAchievement = $createdAchievement->toArray();
        $this->assertArrayHasKey('id', $createdAchievement);
        $this->assertNotNull($createdAchievement['id'], 'Created Achievement must have id specified');
        $this->assertNotNull(Achievement::find($createdAchievement['id']), 'Achievement with given id must be in DB');
        $this->assertModelData($achievement, $createdAchievement);
    }

    /**
     * @test read
     */
    public function test_read_achievement()
    {
        $achievement = Achievement::factory()->create();

        $dbAchievement = $this->achievementRepo->find($achievement->id);

        $dbAchievement = $dbAchievement->toArray();
        $this->assertModelData($achievement->toArray(), $dbAchievement);
    }

    /**
     * @test update
     */
    public function test_update_achievement()
    {
        $achievement = Achievement::factory()->create();
        $fakeAchievement = Achievement::factory()->make()->toArray();

        $updatedAchievement = $this->achievementRepo->update($fakeAchievement, $achievement->id);

        $this->assertModelData($fakeAchievement, $updatedAchievement->toArray());
        $dbAchievement = $this->achievementRepo->find($achievement->id);
        $this->assertModelData($fakeAchievement, $dbAchievement->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_achievement()
    {
        $achievement = Achievement::factory()->create();

        $resp = $this->achievementRepo->delete($achievement->id);

        $this->assertTrue($resp);
        $this->assertNull(Achievement::find($achievement->id), 'Achievement should not exist in DB');
    }
}
