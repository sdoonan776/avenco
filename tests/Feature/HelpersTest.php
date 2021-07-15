<?php

namespace Tests\Unit;

use Tests\TestCase;

class HelpersTest extends TestCase {

	/**
	 * @covers priceFormat
	 */
	public function test_that_price_is_formatted()
	{
	    $this->assertSame('£10.00', priceFormat(1000));
	}

	/**
	 * @covers percentage
	 */
	public function test_percentage_is_formatted()
	{
	    $this->assertSame('30%', percentage(30));
	}
}

