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
<div class="jumbotron index">
    <h1 class="display-4 text-center">Coupons App</h1>
    <p class="lead text-center">
        Coupons App es una aplicacion que te permitira utilizar cupones para poder comprar productos
        a un mejor precio!
    </p>
    <p class="text-center">
        <a class="btn btn-primary btn-lg text-center" role="button" href="{{route('categorizedCoupons')}}">Ver mas</a>
    </p>
</div>

<div class="container mt-3">
    <div class="row d-flex justify-content-center">
        <div class="card-deck">
            @foreach ($coupons as $coupon)
            <div class="col-md-3 card">
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
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('js/modalGetCoupon.js')}}"></script>
@endsection
