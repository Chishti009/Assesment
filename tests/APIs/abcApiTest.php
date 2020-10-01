<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\abc;

class abcApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_abc()
    {
        $abc = factory(abc::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/abcs', $abc
        );

        $this->assertApiResponse($abc);
    }

    /**
     * @test
     */
    public function test_read_abc()
    {
        $abc = factory(abc::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/abcs/'.$abc->id
        );

        $this->assertApiResponse($abc->toArray());
    }

    /**
     * @test
     */
    public function test_update_abc()
    {
        $abc = factory(abc::class)->create();
        $editedabc = factory(abc::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/abcs/'.$abc->id,
            $editedabc
        );

        $this->assertApiResponse($editedabc);
    }

    /**
     * @test
     */
    public function test_delete_abc()
    {
        $abc = factory(abc::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/abcs/'.$abc->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/abcs/'.$abc->id
        );

        $this->response->assertStatus(404);
    }
}
