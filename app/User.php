<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Coupon;
use App\user_coupon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id', 'estate_id','city_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function coupons(){
        return $this->belongsToMany(Coupon::class, 'user_coupon')->withPivot('code', 'used');
    }

    public function establishments(){
        return $this->hasMany('App\Establishment');
    }

    public function countCoupons(){
        $establishments = $this->establishments;
        $coupons = 0;
        foreach ($establishments as $establishment) {
            $coupons += $establishment->coupons->count();
        }
        return $coupons;
    }

    public function moneyCoupons(){
        $establishments = $this->establishments;
        $money = 0;
        foreach ($establishments as $establishment) {
            $coupons = $establishment->coupons;
            foreach ($coupons as $coupon) {
                $couponsUsed = user_coupon::where('coupon_id', $coupon->id)->where('used', '1')->count();
                $cost = $couponsUsed *( $coupon->product->amount * ($coupon->discount/100) );
                $money +=  $cost;
            }
        }
        return $money;
    }

    public function popularCoupon(){
        $establishments = $this->establishments;
        $coupon = null;
        $couponsMostUsed = array();
        foreach ($establishments as $establishment) {
            $coupons = $establishment->coupons;
            foreach ($coupons as $coupon) {
                $couponsUsed = user_coupon::where('coupon_id', $coupon->id)->where('used', '1')->count();
                $couponsMostUsed += [$coupon->id => $couponsUsed];
            }
        }
        $prevCount = 0;
        foreach ($couponsMostUsed as $id => $count) {
            if (!$coupon) {
                $coupon = Coupon::where('id', $id)->first();
                $prevCount = $count;
            }else{
                if ($count > $prevCount) {
                    $coupon = Coupon::where('id', $id)->first();
                    $prevCount = $count;
                }
            }
        }
        return $coupon->name;
    }

    public function productsWithoutSell(){
        $establishments = $this->establishments;
        $count = 0;
        foreach ($establishments as $establishment) {
            $products = $establishment->products;
            foreach ($products as $product) {
                $count += $product->quantity;
            }
        }
        return $count;
    }

}
