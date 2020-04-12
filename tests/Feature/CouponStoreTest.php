<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CouponStoreTest extends TestCase
{
	protected $user;

	public function setUp(): void
	{
		parent::setUp();
		$this->withoutMiddleWare();
	}
    /**
     * @return void
     */
    public function tests_that_coupon_has_been_successfully_stored_in_session(): void
    {
        $coupon = [
        	'code' => 'ABC123'
        ];

        $this->withSession('');
    }
}
