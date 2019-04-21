@extends('layouts.app')

@section('content')
    <h2 class="text-center">Establishments</h2>
    <div class="container">
        <div class="row">
            @foreach ($establishments as $establishment)
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header bg-dark text-white">{{$establishment->name}}</h5>
                        <div class="card-body">
                            <h5 class="card-title">Info</h5>
                            <p class="card-text">Address: {{$establishment->address}}</p>
                            <p class="card-text">City: {{$establishment->city}}</p>
                            <a href="#" class="btn btn-primary">See Coupons</a>
                            <a href="{{url('inventory/'.$establishment->id)}}" class="btn btn-success">See Inventory</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection