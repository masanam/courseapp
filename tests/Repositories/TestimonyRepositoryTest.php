<?php namespace Tests\Repositories;

use App\Models\Admin\Testimony;
use App\Repositories\Admin\TestimonyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TestimonyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TestimonyRepository
     */
    protected $testimonyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->testimonyRepo = \App::make(TestimonyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_testimony()
    {
        $testimony = Testimony::factory()->make()->toArray();

        $createdTestimony = $this->testimonyRepo->create($testimony);

        $createdTestimony = $createdTestimony->toArray();
        $this->assertArrayHasKey('id', $createdTestimony);
        $this->assertNotNull($createdTestimony['id'], 'Created Testimony must have id specified');
        $this->assertNotNull(Testimony::find($createdTestimony['id']), 'Testimony with given id must be in DB');
        $this->assertModelData($testimony, $createdTestimony);
    }

    /**
     * @test read
     */
    public function test_read_testimony()
    {
        $testimony = Testimony::factory()->create();

        $dbTestimony = $this->testimonyRepo->find($testimony->id);

        $dbTestimony = $dbTestimony->toArray();
        $this->assertModelData($testimony->toArray(), $dbTestimony);
    }

    /**
     * @test update
     */
    public function test_update_testimony()
    {
        $testimony = Testimony::factory()->create();
        $fakeTestimony = Testimony::factory()->make()->toArray();

        $updatedTestimony = $this->testimonyRepo->update($fakeTestimony, $testimony->id);

        $this->assertModelData($fakeTestimony, $updatedTestimony->toArray());
        $dbTestimony = $this->testimonyRepo->find($testimony->id);
        $this->assertModelData($fakeTestimony, $dbTestimony->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_testimony()
    {
        $testimony = Testimony::factory()->create();

        $resp = $this->testimonyRepo->delete($testimony->id);

        $this->assertTrue($resp);
        $this->assertNull(Testimony::find($testimony->id), 'Testimony should not exist in DB');
    }
}
