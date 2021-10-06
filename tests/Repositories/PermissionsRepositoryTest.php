<?php namespace Tests\Repositories;

use App\Models\Admin\Permissions;
use App\Repositories\Admin\PermissionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PermissionsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PermissionsRepository
     */
    protected $permissionsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->permissionsRepo = \App::make(PermissionsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_permissions()
    {
        $permissions = Permissions::factory()->make()->toArray();

        $createdPermissions = $this->permissionsRepo->create($permissions);

        $createdPermissions = $createdPermissions->toArray();
        $this->assertArrayHasKey('id', $createdPermissions);
        $this->assertNotNull($createdPermissions['id'], 'Created Permissions must have id specified');
        $this->assertNotNull(Permissions::find($createdPermissions['id']), 'Permissions with given id must be in DB');
        $this->assertModelData($permissions, $createdPermissions);
    }

    /**
     * @test read
     */
    public function test_read_permissions()
    {
        $permissions = Permissions::factory()->create();

        $dbPermissions = $this->permissionsRepo->find($permissions->id);

        $dbPermissions = $dbPermissions->toArray();
        $this->assertModelData($permissions->toArray(), $dbPermissions);
    }

    /**
     * @test update
     */
    public function test_update_permissions()
    {
        $permissions = Permissions::factory()->create();
        $fakePermissions = Permissions::factory()->make()->toArray();

        $updatedPermissions = $this->permissionsRepo->update($fakePermissions, $permissions->id);

        $this->assertModelData($fakePermissions, $updatedPermissions->toArray());
        $dbPermissions = $this->permissionsRepo->find($permissions->id);
        $this->assertModelData($fakePermissions, $dbPermissions->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_permissions()
    {
        $permissions = Permissions::factory()->create();

        $resp = $this->permissionsRepo->delete($permissions->id);

        $this->assertTrue($resp);
        $this->assertNull(Permissions::find($permissions->id), 'Permissions should not exist in DB');
    }
}
