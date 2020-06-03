<?php

namespace Tests\Unit;

use Mockery;
use Tests\TestCase;

class CategoryRepositoryTest extends TestCase
{
    /** @test */
    public function it_should_bind_a_list_of_categories_from_the_repository()
    {
        // $this->markTestSkipped();
        $repoMock = Mockery::mock('CategoryRespositoryInterface');
        $repoMock->shouldReceive('listCategories')->once()->andReturn('id');

        $app = $this->createApplication($repoMock);

        $this->assertSame(200, $app->getStatusCode());
    }
}
