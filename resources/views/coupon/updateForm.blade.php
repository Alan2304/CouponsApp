@extends('layouts.dashboard')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif
    <div class="row">
        <form action="{{route('updateCoupon', ['id' => $coupon->id])}}" method="POST" class="col-md-12">
            @csrf
            <div class="form-group">
                <label for="name">Name For the Coupon</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter the name of the coupon" value="{{$coupon->name}}">
            </div>
            <div class="form-group">
                <label for="discount">Discount</label>
                <input type="number" name="discount" id="discount" class="form-control" placeholder="Enter the percentage(%) of the discount" value="{{$coupon->discount}}">
            </div>
            <div class="form-group">
                <label for="expiration">Expiration Date</label>
                <input type="date" name="expiration" id="expiration" class="form-control" placeholder="Enter the expiration Date" value="{{$coupon->expiration}}">
            </div>
            
            <div class="form-group">
                <label for="description">Coupon Description</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{$coupon->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection