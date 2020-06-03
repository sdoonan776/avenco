<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Interfaces\SumInterface;

class SumInterfaceTest extends TestCase
{
    /** @test */
    public function it_should_return_the_sum_of_two_integers()
    {
        $this->markTestIncomplete();
        $mock = Mockery::mock('SumInterface');
    }
    
}
