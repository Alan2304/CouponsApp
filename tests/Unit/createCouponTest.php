<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Coupon;

class createCouponTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $coupons = factory(\App\Coupon::class, 10)->create();
        foreach ($coupons as $coupon) {
            $this->assertDatabasehas('coupon', $coupon->toArray());
            $coupon->delete();
        }
    }
}
