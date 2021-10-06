<?php namespace Tests\Repositories;

use App\Models\Admin\Problem;
use App\Repositories\Admin\ProblemRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProblemRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProblemRepository
     */
    protected $problemRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->problemRepo = \App::make(ProblemRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_problem()
    {
        $problem = Problem::factory()->make()->toArray();

        $createdProblem = $this->problemRepo->create($problem);

        $createdProblem = $createdProblem->toArray();
        $this->assertArrayHasKey('id', $createdProblem);
        $this->assertNotNull($createdProblem['id'], 'Created Problem must have id specified');
        $this->assertNotNull(Problem::find($createdProblem['id']), 'Problem with given id must be in DB');
        $this->assertModelData($problem, $createdProblem);
    }

    /**
     * @test read
     */
    public function test_read_problem()
    {
        $problem = Problem::factory()->create();

        $dbProblem = $this->problemRepo->find($problem->id);

        $dbProblem = $dbProblem->toArray();
        $this->assertModelData($problem->toArray(), $dbProblem);
    }

    /**
     * @test update
     */
    public function test_update_problem()
    {
        $problem = Problem::factory()->create();
        $fakeProblem = Problem::factory()->make()->toArray();

        $updatedProblem = $this->problemRepo->update($fakeProblem, $problem->id);

        $this->assertModelData($fakeProblem, $updatedProblem->toArray());
        $dbProblem = $this->problemRepo->find($problem->id);
        $this->assertModelData($fakeProblem, $dbProblem->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_problem()
    {
        $problem = Problem::factory()->create();

        $resp = $this->problemRepo->delete($problem->id);

        $this->assertTrue($resp);
        $this->assertNull(Problem::find($problem->id), 'Problem should not exist in DB');
    }
}
