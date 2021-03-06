@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{$message}}
            </div>
        @endif
        <form action="{{route('registerEstablishmentAcc')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter the name of the user">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter the email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="email" name="pass">
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
@endsection

@section('scripts')
    <script src="{{ asset('js/cityHandler.js') }}"></script>
@endsection