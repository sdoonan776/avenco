<?php

namespace Tests\Unit;

use Tests\TestCase;

class HelpersTest extends TestCase {

	/**
	 * @covers priceFormat
	 */
	public function tests_that_price_is_formatted()
	{
	    $this->assertSame('£10.00', priceFormat(1000));
	}
}

