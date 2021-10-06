<?php namespace Tests\Repositories;

use App\Models\Admin\UserTypes;
use App\Repositories\Admin\UserTypesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UserTypesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserTypesRepository
     */
    protected $userTypesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userTypesRepo = \App::make(UserTypesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_user_types()
    {
        $userTypes = UserTypes::factory()->make()->toArray();

        $createdUserTypes = $this->userTypesRepo->create($userTypes);

        $createdUserTypes = $createdUserTypes->toArray();
        $this->assertArrayHasKey('id', $createdUserTypes);
        $this->assertNotNull($createdUserTypes['id'], 'Created UserTypes must have id specified');
        $this->assertNotNull(UserTypes::find($createdUserTypes['id']), 'UserTypes with given id must be in DB');
        $this->assertModelData($userTypes, $createdUserTypes);
    }

    /**
     * @test read
     */
    public function test_read_user_types()
    {
        $userTypes = UserTypes::factory()->create();

        $dbUserTypes = $this->userTypesRepo->find($userTypes->id);

        $dbUserTypes = $dbUserTypes->toArray();
        $this->assertModelData($userTypes->toArray(), $dbUserTypes);
    }

    /**
     * @test update
     */
    public function test_update_user_types()
    {
        $userTypes = UserTypes::factory()->create();
        $fakeUserTypes = UserTypes::factory()->make()->toArray();

        $updatedUserTypes = $this->userTypesRepo->update($fakeUserTypes, $userTypes->id);

        $this->assertModelData($fakeUserTypes, $updatedUserTypes->toArray());
        $dbUserTypes = $this->userTypesRepo->find($userTypes->id);
        $this->assertModelData($fakeUserTypes, $dbUserTypes->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_user_types()
    {
        $userTypes = UserTypes::factory()->create();

        $resp = $this->userTypesRepo->delete($userTypes->id);

        $this->assertTrue($resp);
        $this->assertNull(UserTypes::find($userTypes->id), 'UserTypes should not exist in DB');
    }
}
