@extends('layouts.app')

@section('modal')
<div class="modal fade" id="seeCouponModal" tabindex="-1" role="dialog" aria-labelledby="seeCouponModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">The Code is:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
                <h4>Code:</h5>
                <h5 class="text-center text-success" id="code"></h5>
                <p class="text-center" id="info">You can use this in the store where the product is</p>
            </div>
          </div>
          <div class="modal-footer">
            <div class="actions">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{$message}}
            </div>
        @endif

        <h2 class="text-center">My Coupons </h2>
        <p class="text-center"><i class="fas fa-users text-primary fa-5x"></i></p>
        <div class="row">
            @if ($couponsCount > 0)
                @foreach ($myCoupons as $coupon)
                    @if ($coupon->pivot->used == 0)
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-image-top" src="https://via.placeholder.com/300x100C" alt="test">
                                <div class="card-body">
                                    <h5 class="card-title">{{$coupon->name}}</h5>
                                    <p class="card-text">{{$coupon->description}}</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#seeCouponModal" data-code="{{$coupon->id}}">Use cupon</button>
                                    <a href="{{url('myCoupons/delete/'.$coupon->id)}}" class="btn btn-danger">Delete</a>
                                    @auth
                                        <input type="hidden" id="userId" value="{{Auth::user()->id}}">
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <h2 class="text-danger text-center">You don't have any coupon</h2>
            @endif
        </div>
        <div class="d-flex justify-content-center">
            {{$myCoupons->links()}}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/modalSeeCoupon.js')}}"></script>
@endsection