<?php namespace Tests\Repositories;

use App\Models\abc;
use App\Repositories\abcRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class abcRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var abcRepository
     */
    protected $abcRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->abcRepo = \App::make(abcRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_abc()
    {
        $abc = factory(abc::class)->make()->toArray();

        $createdabc = $this->abcRepo->create($abc);

        $createdabc = $createdabc->toArray();
        $this->assertArrayHasKey('id', $createdabc);
        $this->assertNotNull($createdabc['id'], 'Created abc must have id specified');
        $this->assertNotNull(abc::find($createdabc['id']), 'abc with given id must be in DB');
        $this->assertModelData($abc, $createdabc);
    }

    /**
     * @test read
     */
    public function test_read_abc()
    {
        $abc = factory(abc::class)->create();

        $dbabc = $this->abcRepo->find($abc->id);

        $dbabc = $dbabc->toArray();
        $this->assertModelData($abc->toArray(), $dbabc);
    }

    /**
     * @test update
     */
    public function test_update_abc()
    {
        $abc = factory(abc::class)->create();
        $fakeabc = factory(abc::class)->make()->toArray();

        $updatedabc = $this->abcRepo->update($fakeabc, $abc->id);

        $this->assertModelData($fakeabc, $updatedabc->toArray());
        $dbabc = $this->abcRepo->find($abc->id);
        $this->assertModelData($fakeabc, $dbabc->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_abc()
    {
        $abc = factory(abc::class)->create();

        $resp = $this->abcRepo->delete($abc->id);

        $this->assertTrue($resp);
        $this->assertNull(abc::find($abc->id), 'abc should not exist in DB');
    }
}
