<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class exchangeCouponTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->call('POST', '/api/coupon/3', [
            'couponId' => 6, 
            'code' => '3-Ti-7aHzx', 
            'user_id' => 3]);
        $response->assertJsonFragment([
            'used' => 1
        ]);
        $response->assertStatus(200);
    }
}
