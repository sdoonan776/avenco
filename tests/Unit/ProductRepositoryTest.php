<?php

namespace Tests\Unit;

use App\Interfaces\ProductRepositoryInterface;
use Mockery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductRepositoryTest extends TestCase
{
    protected $productRepository;

    public function setUp(): void
    {
        $this->productRepository = Mockery::mock(ProductRepositoryInterface::class);
    }

    public function tearDown(): void
    {
        Mockery::close();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
