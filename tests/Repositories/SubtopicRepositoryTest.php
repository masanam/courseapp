<?php namespace Tests\Repositories;

use App\Models\Admin\Subtopic;
use App\Repositories\Admin\SubtopicRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SubtopicRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubtopicRepository
     */
    protected $subtopicRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->subtopicRepo = \App::make(SubtopicRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_subtopic()
    {
        $subtopic = Subtopic::factory()->make()->toArray();

        $createdSubtopic = $this->subtopicRepo->create($subtopic);

        $createdSubtopic = $createdSubtopic->toArray();
        $this->assertArrayHasKey('id', $createdSubtopic);
        $this->assertNotNull($createdSubtopic['id'], 'Created Subtopic must have id specified');
        $this->assertNotNull(Subtopic::find($createdSubtopic['id']), 'Subtopic with given id must be in DB');
        $this->assertModelData($subtopic, $createdSubtopic);
    }

    /**
     * @test read
     */
    public function test_read_subtopic()
    {
        $subtopic = Subtopic::factory()->create();

        $dbSubtopic = $this->subtopicRepo->find($subtopic->id);

        $dbSubtopic = $dbSubtopic->toArray();
        $this->assertModelData($subtopic->toArray(), $dbSubtopic);
    }

    /**
     * @test update
     */
    public function test_update_subtopic()
    {
        $subtopic = Subtopic::factory()->create();
        $fakeSubtopic = Subtopic::factory()->make()->toArray();

        $updatedSubtopic = $this->subtopicRepo->update($fakeSubtopic, $subtopic->id);

        $this->assertModelData($fakeSubtopic, $updatedSubtopic->toArray());
        $dbSubtopic = $this->subtopicRepo->find($subtopic->id);
        $this->assertModelData($fakeSubtopic, $dbSubtopic->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_subtopic()
    {
        $subtopic = Subtopic::factory()->create();

        $resp = $this->subtopicRepo->delete($subtopic->id);

        $this->assertTrue($resp);
        $this->assertNull(Subtopic::find($subtopic->id), 'Subtopic should not exist in DB');
    }
}
