@extends('layouts.app')

@section('modal')
    @guest
        <div class="modal fade" id="getCouponModal" tabindex="-1" role="dialog" aria-labelledby="getCouponModal" aria-hidden="true">        
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">   
                        <h5 class="modal-title">Ups! There is a Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <h5 class="text-center text-danger">You need to register to this website for use a Coupon!</h5>
                            <h5 class="text-center text-danger">You con Log in of Register in the buttons below</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        <a href="{{ route('login') }}" class="btn btn-success">Log In</a>
                    </div>  
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="getCouponModal" tabindex="-1" role="dialog" aria-labelledby="getCouponModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Your Code will be:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                        <h4>Code:</h5>
                        <h5 class="text-center text-success" id="code"></h5>
                        <h5 class="text-center text-danger" id="error"></h5>
                        <p class="text-center" id="info">You can check your coupons in the "My Coupons" section in the menu</p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="actions">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="getButton">Get</button>
                    </div>
                    <div class="lds-ring">
                        <div></div><div></div><div></div><div></div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    @endguest
@endsection

@section('content')
    <div class="container">
        <h2 class="text-center">Coupons of {{$type->name}}</h2>
        <p class="text-center"><i class="{{$type->icon}} text-primary fa-4x"></i></p>
        <div class="row">
            @foreach ($coupons as $coupon)      
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-image-top" src="https://via.placeholder.com/300x100C" alt="test">
                        <div class="card-body">
                            <h5 class="card-title">{{$coupon->name}}</h5>
                            <p class="card-text">{{$coupon->description}}</p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#getCouponModal" data-code="{{$coupon->id}}">Get cupon</button>
                            @auth
                                <input type="hidden" id="userId" value="{{Auth::user()->id}}">
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/modalGetCoupon.js')}}"></script>
@endsection