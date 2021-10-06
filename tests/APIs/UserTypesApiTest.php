<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admin\UserTypes;

class UserTypesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_user_types()
    {
        $userTypes = UserTypes::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/user_types', $userTypes
        );

        $this->assertApiResponse($userTypes);
    }

    /**
     * @test
     */
    public function test_read_user_types()
    {
        $userTypes = UserTypes::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/user_types/'.$userTypes->id
        );

        $this->assertApiResponse($userTypes->toArray());
    }

    /**
     * @test
     */
    public function test_update_user_types()
    {
        $userTypes = UserTypes::factory()->create();
        $editedUserTypes = UserTypes::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/user_types/'.$userTypes->id,
            $editedUserTypes
        );

        $this->assertApiResponse($editedUserTypes);
    }

    /**
     * @test
     */
    public function test_delete_user_types()
    {
        $userTypes = UserTypes::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/user_types/'.$userTypes->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/user_types/'.$userTypes->id
        );

        $this->response->assertStatus(404);
    }
}
