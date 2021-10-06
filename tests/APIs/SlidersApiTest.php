<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admin\Sliders;

class SlidersApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sliders()
    {
        $sliders = Sliders::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/sliders', $sliders
        );

        $this->assertApiResponse($sliders);
    }

    /**
     * @test
     */
    public function test_read_sliders()
    {
        $sliders = Sliders::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/sliders/'.$sliders->id
        );

        $this->assertApiResponse($sliders->toArray());
    }

    /**
     * @test
     */
    public function test_update_sliders()
    {
        $sliders = Sliders::factory()->create();
        $editedSliders = Sliders::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/sliders/'.$sliders->id,
            $editedSliders
        );

        $this->assertApiResponse($editedSliders);
    }

    /**
     * @test
     */
    public function test_delete_sliders()
    {
        $sliders = Sliders::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/sliders/'.$sliders->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/sliders/'.$sliders->id
        );

        $this->response->assertStatus(404);
    }
}
