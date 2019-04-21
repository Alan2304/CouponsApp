@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{$message}}
            </div>
        @endif
        <div class="row">
            <form action="{{route('registerProduct')}}" method="POST" class="col-md-12">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter the product name">
                </div>

                <div class="form-group">
                    <label for="amount">Cost</label>
                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter the cost of the product">
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Enter the total of the products in the store">
                </div>

                <div class="form-group">
                    <label for="establishment_id">Establishment</label>
                    <select name="establishment_id" id="establishment_id" class="form-control">
                        <option value="0">Select an Option</option>
                        @foreach ($establishments as $establishment)
                            <option value="{{$establishment->id}}">{{$establishment->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </form>
        </div>
    </div>
@endsection