<?php

namespace Tests\Feature;

use GuzzleHttp\Client;
use Tests\TestCase;

class RouteTest extends TestCase
{
	protected $http;

	public function setUp(): void
	{
		$this->http = new Client(['http://localhost']);
	}
	/**
	 * @dataProvider getPublicUrls()
	 * @return void
	 */
	public function test_that_public_urls_are_accessable(string $data)
	{
	    $response = $this->http->get($data);
	    $this->assertSame(200, $response->getStatusCode());
	}

	/**
	 * [test_that_logged_in_user_urls_are_accessable description]
	 * @dataProvider 
	 * @return void
	 */
	public function test_that_logged_in_user_urls_are_accessable()
	{
		$this->markTestIncomplete();
	}

	public function getPublicUrls()
	{
		yield ['/'];
		yield ['/shop'];
		yield ['/shop/dress-1'];
		yield ['/login'];
		yield ['/register'];
	}
}
