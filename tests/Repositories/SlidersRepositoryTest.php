<?php namespace Tests\Repositories;

use App\Models\Admin\Sliders;
use App\Repositories\Admin\SlidersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SlidersRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SlidersRepository
     */
    protected $slidersRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->slidersRepo = \App::make(SlidersRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sliders()
    {
        $sliders = Sliders::factory()->make()->toArray();

        $createdSliders = $this->slidersRepo->create($sliders);

        $createdSliders = $createdSliders->toArray();
        $this->assertArrayHasKey('id', $createdSliders);
        $this->assertNotNull($createdSliders['id'], 'Created Sliders must have id specified');
        $this->assertNotNull(Sliders::find($createdSliders['id']), 'Sliders with given id must be in DB');
        $this->assertModelData($sliders, $createdSliders);
    }

    /**
     * @test read
     */
    public function test_read_sliders()
    {
        $sliders = Sliders::factory()->create();

        $dbSliders = $this->slidersRepo->find($sliders->id);

        $dbSliders = $dbSliders->toArray();
        $this->assertModelData($sliders->toArray(), $dbSliders);
    }

    /**
     * @test update
     */
    public function test_update_sliders()
    {
        $sliders = Sliders::factory()->create();
        $fakeSliders = Sliders::factory()->make()->toArray();

        $updatedSliders = $this->slidersRepo->update($fakeSliders, $sliders->id);

        $this->assertModelData($fakeSliders, $updatedSliders->toArray());
        $dbSliders = $this->slidersRepo->find($sliders->id);
        $this->assertModelData($fakeSliders, $dbSliders->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sliders()
    {
        $sliders = Sliders::factory()->create();

        $resp = $this->slidersRepo->delete($sliders->id);

        $this->assertTrue($resp);
        $this->assertNull(Sliders::find($sliders->id), 'Sliders should not exist in DB');
    }
}
