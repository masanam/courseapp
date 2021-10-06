<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admin\Achievement;

class AchievementApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_achievement()
    {
        $achievement = Achievement::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/achievements', $achievement
        );

        $this->assertApiResponse($achievement);
    }

    /**
     * @test
     */
    public function test_read_achievement()
    {
        $achievement = Achievement::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/achievements/'.$achievement->id
        );

        $this->assertApiResponse($achievement->toArray());
    }

    /**
     * @test
     */
    public function test_update_achievement()
    {
        $achievement = Achievement::factory()->create();
        $editedAchievement = Achievement::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/achievements/'.$achievement->id,
            $editedAchievement
        );

        $this->assertApiResponse($editedAchievement);
    }

    /**
     * @test
     */
    public function test_delete_achievement()
    {
        $achievement = Achievement::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/achievements/'.$achievement->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/achievements/'.$achievement->id
        );

        $this->response->assertStatus(404);
    }
}
