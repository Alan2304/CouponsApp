@extends('layouts.dashboard')

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
                    <h5 class="text-center text-danger" id="error"></h5>
                    <h5 class="text-center text-success" id="success"></h5>                  
                    <div id="exchangeForm">
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
              </div>
              <div class="modal-footer">
                <div class="actions">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="exchangeButton">Accept</button>
                </div>
                <div class="lds-ring">
                    <div></div><div></div><div></div><div></div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    <h2 class="pr-5">Coupons</h2>
@endsection

@section('content')

    <form action="{{route('searchCoupons')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" name="couponCode" class="form-control" placeholder="Search a Coupon by Code" aria-label="couponCode" aria-describedby="basic-addon1">
                    <input type="hidden" name="establishmentId" id="establishmentId" value="{{$establishmentId}}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        @if ($message = Session::get('errorEstablishment'))
            <div class="alert alert-danger col-md-12">
                {{$message}}
            </div>
        @endif
        @if ($coupons->count() > 0)
            @foreach ($coupons as $coupon)
                <div class="card mb-4">
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
@endsection

@section('scripts')
    <script src="{{asset('js/modalCodeHandler.js')}}"></script>
@endsection