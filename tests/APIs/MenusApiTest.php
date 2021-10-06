<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admin\Menus;

class MenusApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_menus()
    {
        $menus = Menus::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/menuses', $menus
        );

        $this->assertApiResponse($menus);
    }

    /**
     * @test
     */
    public function test_read_menus()
    {
        $menus = Menus::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/menuses/'.$menus->id
        );

        $this->assertApiResponse($menus->toArray());
    }

    /**
     * @test
     */
    public function test_update_menus()
    {
        $menus = Menus::factory()->create();
        $editedMenus = Menus::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/menuses/'.$menus->id,
            $editedMenus
        );

        $this->assertApiResponse($editedMenus);
    }

    /**
     * @test
     */
    public function test_delete_menus()
    {
        $menus = Menus::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/menuses/'.$menus->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/menuses/'.$menus->id
        );

        $this->response->assertStatus(404);
    }
}
