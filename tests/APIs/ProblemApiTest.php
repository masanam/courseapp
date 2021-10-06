<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admin\Problem;

class ProblemApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_problem()
    {
        $problem = Problem::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/problems', $problem
        );

        $this->assertApiResponse($problem);
    }

    /**
     * @test
     */
    public function test_read_problem()
    {
        $problem = Problem::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/problems/'.$problem->id
        );

        $this->assertApiResponse($problem->toArray());
    }

    /**
     * @test
     */
    public function test_update_problem()
    {
        $problem = Problem::factory()->create();
        $editedProblem = Problem::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/problems/'.$problem->id,
            $editedProblem
        );

        $this->assertApiResponse($editedProblem);
    }

    /**
     * @test
     */
    public function test_delete_problem()
    {
        $problem = Problem::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/problems/'.$problem->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/problems/'.$problem->id
        );

        $this->response->assertStatus(404);
    }
}
