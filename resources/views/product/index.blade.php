@extends('layouts.dashboard')
@section('title')
    <h2 class="text-center">Inventory of {{$establishment}}</h2>
@endsection
@section('content')
    @if ($message = Session::get('deleted'))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif


    @if ($message = Session::get('errorAuth'))
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @endif
    <div class="row">
        @if ($products->count() > 0)
            @foreach ($products as $product)
                <div class="col-md-4 mt-4">
                    <div class="card">
                        <h5 class="card-header bg-dark text-white">{{$product->name}}</h5>
                        <div class="card-body">
                            <h5 class="card-title">Info</h5>
                            <p class="card-text">Cost: {{$product->amount}}</p>
                            <p class="card-text">Quantity: {{$product->quantity}}</p>
                            <p class="card-text">Located At: {{$product->establishment->name}}</p>
                            <p class="card-text">Type: {{$product->type->name}}</p>
                            <a href="{{url('product/update/'.$product->id)}}" class="btn btn-info text-white">Modify</a>
                            <a href="{{url('product/delete/'.$product->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{url('createCoupon/'.$product->id)}}" class="btn btn-success">Add Coupon</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12">
                <h2 class="text-center text-danger">There is no Products to show!</h2>
            </div>
        @endif
    </div>
@endsection