<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admin\Testimony;

class TestimonyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_testimony()
    {
        $testimony = Testimony::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/testimonies', $testimony
        );

        $this->assertApiResponse($testimony);
    }

    /**
     * @test
     */
    public function test_read_testimony()
    {
        $testimony = Testimony::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/testimonies/'.$testimony->id
        );

        $this->assertApiResponse($testimony->toArray());
    }

    /**
     * @test
     */
    public function test_update_testimony()
    {
        $testimony = Testimony::factory()->create();
        $editedTestimony = Testimony::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/testimonies/'.$testimony->id,
            $editedTestimony
        );

        $this->assertApiResponse($editedTestimony);
    }

    /**
     * @test
     */
    public function test_delete_testimony()
    {
        $testimony = Testimony::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/testimonies/'.$testimony->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/testimonies/'.$testimony->id
        );

        $this->response->assertStatus(404);
    }
}
