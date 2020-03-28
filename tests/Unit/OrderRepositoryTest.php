<?php

namespace Tests\Unit;

use App\Interfaces\OrderRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class OrderRepositoryTest extends TestCase
{
    protected $orderRepository;

    public function setUp(): void
    {
        $this->orderRepository = Mockery::mock(OrderRepositoryInterface::class);
    }

    public function tearDown(): void
    {
        Mockery::close();
    }

    public function tests_that_orders_are_placed()
    {
        $this->markTestIncomplete();
    }

    public function tests_that_the_repository_lists_orders()
    {
        $this->markTestIncomplete();
    }
}
