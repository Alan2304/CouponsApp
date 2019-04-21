@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{$message}}
            </div>
        @endif
        <div class="row">
            <form action="{{route('registerEstablishment')}}" method="POST" class="col-md-12">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter the name of the Establishment">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter the addres of the Establishment">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="Enter the City of the establishment">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
@endsection