@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($establishments as $establishment)
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header">{{$establishment->name}}</h5>
                        <div class="card-body">
                            <h5 class="card-title">Info</h5>
                            <p class="card-text">Address: {{$establishment->address}}</p>
                            <p class="card-text">City: {{$establishment->city}}</p>
                            <a href="#" class="btn btn-primary">See Coupons</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection