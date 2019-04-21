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
                    <label for="estates">Select a Estate</label>
                    <select name="estate_id" id="estates" class="form-control">
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="estates">Select a City</label>
                    <select name="city_id" id="cities" class="form-control" disabled>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/cityHandler.js') }}"></script>
@endsection