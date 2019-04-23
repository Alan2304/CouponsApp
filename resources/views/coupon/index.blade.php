@extends('layouts.app')

@section('modal')
    <div class="modal fade" id="exchangeModal" tabindex="-1" role="dialog" aria-labelledby="exchangeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter the coupon of the user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                    <h5>Enter The User Code</h5>
                    <div class="row">
                        <div class="form-group col-md-3 mt-1">
                          <input type="text" class="form-control" id="code">
                        </div>
                        <div class="my-auto">
                            <h4 class="text-right" id="couponCode"></h4>
                        </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="exchangeButton">Accept</button>
              </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if ($coupons->count() > 0)
                @foreach ($coupons as $coupon)
                    <div class="card">
                        <h5 class="card-header bg-dark text-white">{{$coupon->name}}</h5>
                        <div class="card-body">
                            <h5 class="card-title">Info</h5>
                            <p class="card-text">Discount: {{$coupon->discount}}</p>
                            <p class="card-text">Expiration Date: {{$coupon->expiration}}</p>
                            <p class="card-text">Establishment: {{$coupon->establishment->name}}, Product: {{$coupon->product->name}}</p>
                            <p class="card-text">{{$coupon->description}}</p>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exchangeModal" data-code="{{$coupon->id}}">Exchange</button>
                            <a href="{{url('coupon/update/'.$coupon->id)}}" class="btn btn-info text-white">Modify</a>
                            <a href="{{url('coupon/delete/'.$coupon->id)}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                @endforeach
                
            @else
                <div class="col-md-12">
                    <h2 class="text-center text-danger">There is no Coupons To show!</h2>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/modalCodeHandler.js')}}"></script>
@endsection