<?php

namespace Tests\Feature;

use App\Models\User;
use GuzzleHttp\Client;
use Tests\TestCase;

class RouteTest extends TestCase
{
	protected $http;
	protected $user;

	public function setUp(): void
	{
		parent::setUp();
		$this->http = new Client();
		$this->user = factory(User::class)->create();
	}
	/**
	 * @dataProvider getPublicUrls()
	 * @return void
	 */
	public function test_that_public_urls_are_accessable(string $data)
	{
	    $response = $this->http->request('GET', $data);
	    $this->assertSame(200, $response->getStatusCode());
	}

	/**
	 * @dataProvider getProtectedUrls()
	 * @return void
	 */
	public function test_that_logged_in_user_urls_are_accessable(string $data)
	{
		$response = $this->actingAs($this->user)->http->request('GET', $data);
		$this->assertSame(200, $response->getStatusCode());
	}

	public function getPublicUrls()
	{
		yield ['http://localhost/'];
		yield ['http://localhost/shop'];
		yield ['http://localhost/shop/dress-1'];
		yield ['http://localhost/login'];
		yield ['http://localhost/register'];
	}

	public function getProtectedUrls()
	{	
		yield ['http://localhost/cart'];
		yield ['http://localhost/profile/edit'];
		yield ['http://localhost/orders'];
		yield ['http://localhost/orders/1'];
		yield ['http://localhost/checkout'];
	}

}
