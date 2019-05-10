@extends('layouts.dashboard')

@section('title')
    <h2 class="pr-5">Establishments</h2>
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <i class="fas fa-money-check text-warning statistic-icon"></i>
                        </div>
                        <div class="col-md-6 info-statistic">
                            <p>Coupons:</p>
                            <p>{{$toalCoupons}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                                <i class="fas fa-window-close text-danger statistic-icon"></i>
                        </div>
                        <div class="col-md-9 info-statistic">
                            <p>Products in stock:</p>
                            <p>{{$productsWithoutSell}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <i class="fas fa-money-bill-wave text-success statistic-icon"></i>
                        </div>
                        <div class="col-md-8 info-statistic">
                            <p>$ With coupons:</p>
                            <p>{{$moneyWithCoupons}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <i class="fas fa-plus-square text-primary statistic-icon"></i>
                        </div>
                        <div class="col-md-8 info-statistic">
                            <p>Popular Coupon:</p>
                            <p>{{$couponMostUsed}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if ($establishments->count() > 0)
            @foreach ($establishments as $establishment)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <h5 class="card-header bg-dark text-white">{{$establishment->name}}</h5>
                        <div class="card-body">
                            <h5 class="card-title">Info</h5>
                            <p class="card-text"><strong>Address:</strong> {{$establishment->address}}</p>
                            <p class="card-text"><strong>City:</strong> {{$establishment->city->name}}, Estate: {{$establishment->city->estate->name}}</p>
                            <a href="{{url('coupon/'.$establishment->id)}}" class="btn btn-primary">See Coupons</a>
                            <a href="{{url('inventory/'.$establishment->id)}}" class="btn btn-success">See Inventory</a>
                        </div>
                    </div>
                </div>
            @endforeach
                
        @else
        <div class="col-md-12">
            <h2 class="text-center text-danger">There is no Establishments to show!</h2>
        </div>        
        @endif
    </div>
@endsection