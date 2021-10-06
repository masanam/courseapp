<?php namespace Tests\Repositories;

use App\Models\USER_TYPE;
use App\Repositories\USER_TYPERepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class USER_TYPERepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var USER_TYPERepository
     */
    protected $uSERTYPERepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->uSERTYPERepo = \App::make(USER_TYPERepository::class);
    }

    /**
     * @test create
     */
    public function test_create_u_s_e_r__t_y_p_e()
    {
        $uSERTYPE = USER_TYPE::factory()->make()->toArray();

        $createdUSER_TYPE = $this->uSERTYPERepo->create($uSERTYPE);

        $createdUSER_TYPE = $createdUSER_TYPE->toArray();
        $this->assertArrayHasKey('id', $createdUSER_TYPE);
        $this->assertNotNull($createdUSER_TYPE['id'], 'Created USER_TYPE must have id specified');
        $this->assertNotNull(USER_TYPE::find($createdUSER_TYPE['id']), 'USER_TYPE with given id must be in DB');
        $this->assertModelData($uSERTYPE, $createdUSER_TYPE);
    }

    /**
     * @test read
     */
    public function test_read_u_s_e_r__t_y_p_e()
    {
        $uSERTYPE = USER_TYPE::factory()->create();

        $dbUSER_TYPE = $this->uSERTYPERepo->find($uSERTYPE->id);

        $dbUSER_TYPE = $dbUSER_TYPE->toArray();
        $this->assertModelData($uSERTYPE->toArray(), $dbUSER_TYPE);
    }

    /**
     * @test update
     */
    public function test_update_u_s_e_r__t_y_p_e()
    {
        $uSERTYPE = USER_TYPE::factory()->create();
        $fakeUSER_TYPE = USER_TYPE::factory()->make()->toArray();

        $updatedUSER_TYPE = $this->uSERTYPERepo->update($fakeUSER_TYPE, $uSERTYPE->id);

        $this->assertModelData($fakeUSER_TYPE, $updatedUSER_TYPE->toArray());
        $dbUSER_TYPE = $this->uSERTYPERepo->find($uSERTYPE->id);
        $this->assertModelData($fakeUSER_TYPE, $dbUSER_TYPE->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_u_s_e_r__t_y_p_e()
    {
        $uSERTYPE = USER_TYPE::factory()->create();

        $resp = $this->uSERTYPERepo->delete($uSERTYPE->id);

        $this->assertTrue($resp);
        $this->assertNull(USER_TYPE::find($uSERTYPE->id), 'USER_TYPE should not exist in DB');
    }
}
