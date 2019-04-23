@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{$message}}
            </div>
        @endif
        <div class="row">
            <form action="{{route('createCoupon', ['id' => $product->id])}}" method="POST" class="col-md-12">
                @csrf
                <div class="form-group">
                    <label for="name">Name For the Coupon</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter the name of the coupon">
                </div>

                <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="number" name="discount" id="discount" class="form-control" placeholder="Enter the percentage(%) of the discount">
                </div>

                <div class="form-group">
                    <label for="expiration">Expiration Date</label>
                    <input type="date" name="expiration" id="expiration" class="form-control" placeholder="Enter the expiration Date">
                </div>
                
                <div class="form-group">
                    <label for="description">Coupon Description</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection