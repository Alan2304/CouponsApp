<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class updateCouponTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $coupon = factory(\App\Coupon::class)->create();
    
        $response = $this->call('POST', '/coupon/update/'.$coupon->id, [
            'name' => 'Updated '.$coupon->name,
            'discount' => $coupon->discount,
            'expiration' => $coupon->expiration,
            'description' => $coupon->description,
        ]);

        $response->assertStatus(302); //Because redirects to somewhere else
        $this->assertDatabasehas('coupon', [
            'id' => $coupon->id,
            'name' => 'Updated '.$coupon->name,
            'discount' => $coupon->discount,
            'description' => $coupon->description,
        ]);
        $coupon->delete();
    }
}
