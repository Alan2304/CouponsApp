@extends('layouts.dashboard')

@section('title')
    <h2 class="pr-5">Establishments</h2>
@endsection

@section('content')
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