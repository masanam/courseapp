<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\USER_TYPE;

class USER_TYPEApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_u_s_e_r__t_y_p_e()
    {
        $uSERTYPE = USER_TYPE::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/u_s_e_r__t_y_p_e_s', $uSERTYPE
        );

        $this->assertApiResponse($uSERTYPE);
    }

    /**
     * @test
     */
    public function test_read_u_s_e_r__t_y_p_e()
    {
        $uSERTYPE = USER_TYPE::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/u_s_e_r__t_y_p_e_s/'.$uSERTYPE->id
        );

        $this->assertApiResponse($uSERTYPE->toArray());
    }

    /**
     * @test
     */
    public function test_update_u_s_e_r__t_y_p_e()
    {
        $uSERTYPE = USER_TYPE::factory()->create();
        $editedUSER_TYPE = USER_TYPE::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/u_s_e_r__t_y_p_e_s/'.$uSERTYPE->id,
            $editedUSER_TYPE
        );

        $this->assertApiResponse($editedUSER_TYPE);
    }

    /**
     * @test
     */
    public function test_delete_u_s_e_r__t_y_p_e()
    {
        $uSERTYPE = USER_TYPE::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/u_s_e_r__t_y_p_e_s/'.$uSERTYPE->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/u_s_e_r__t_y_p_e_s/'.$uSERTYPE->id
        );

        $this->response->assertStatus(404);
    }
}
