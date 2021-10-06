<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admin\Subtopic;

class SubtopicApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_subtopic()
    {
        $subtopic = Subtopic::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/subtopics', $subtopic
        );

        $this->assertApiResponse($subtopic);
    }

    /**
     * @test
     */
    public function test_read_subtopic()
    {
        $subtopic = Subtopic::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/subtopics/'.$subtopic->id
        );

        $this->assertApiResponse($subtopic->toArray());
    }

    /**
     * @test
     */
    public function test_update_subtopic()
    {
        $subtopic = Subtopic::factory()->create();
        $editedSubtopic = Subtopic::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/subtopics/'.$subtopic->id,
            $editedSubtopic
        );

        $this->assertApiResponse($editedSubtopic);
    }

    /**
     * @test
     */
    public function test_delete_subtopic()
    {
        $subtopic = Subtopic::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/subtopics/'.$subtopic->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/subtopics/'.$subtopic->id
        );

        $this->response->assertStatus(404);
    }
}
