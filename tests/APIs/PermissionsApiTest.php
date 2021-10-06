<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admin\Permissions;

class PermissionsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_permissions()
    {
        $permissions = Permissions::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/permissions', $permissions
        );

        $this->assertApiResponse($permissions);
    }

    /**
     * @test
     */
    public function test_read_permissions()
    {
        $permissions = Permissions::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/permissions/'.$permissions->id
        );

        $this->assertApiResponse($permissions->toArray());
    }

    /**
     * @test
     */
    public function test_update_permissions()
    {
        $permissions = Permissions::factory()->create();
        $editedPermissions = Permissions::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/permissions/'.$permissions->id,
            $editedPermissions
        );

        $this->assertApiResponse($editedPermissions);
    }

    /**
     * @test
     */
    public function test_delete_permissions()
    {
        $permissions = Permissions::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/permissions/'.$permissions->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/permissions/'.$permissions->id
        );

        $this->response->assertStatus(404);
    }
}
