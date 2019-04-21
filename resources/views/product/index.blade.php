@extends('layouts.app')

@section('content')
    <h2 class="text-center">Inventory of {{$establishment}}</h2>
    <div class="container">
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
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <h5 class="card-header bg-dark text-white">{{$product->name}}</h5>
                        <div class="card-body">
                            <h5 class="card-title">Info</h5>
                            <p class="card-text">Cost: {{$product->amount}}</p>
                            <p class="card-text">Quantity: {{$product->quantity}}</p>
                            <p class="card-text">Located At: {{$product->establishment->name}}</p>
                            <a href="{{url('product/update/'.$product->id)}}" class="btn btn-info text-white">Modify</a>
                            <a href="{{url('product/delete/'.$product->id)}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection