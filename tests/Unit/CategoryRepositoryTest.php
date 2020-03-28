<?php

namespace Tests\Unit;

use Mockery;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryRepositoryTest extends TestCase
{
    protected $categoryRepository;

    public function setUp(): void
    {
        $this->categoryRepository = Mockery::mock(CategoryRepositoryInterface::class);
    }

    public function tearDown(): void
    {
        Mockery::close();
    }


    public function tests_that_categories_are_listed()
    {
        $this->markTestIncomplete();
    }
}
