<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class deleteCouponTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $coupon = factory(\App\Coupon::class)->create();

        $response = $this->call('GET','/coupon/delete/'.$coupon->id);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('coupon', [
            'id' => $coupon->id
        ]);
    }
}
