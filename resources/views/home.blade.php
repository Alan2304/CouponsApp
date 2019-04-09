@extends('layouts.app')

@section('content')
<div class="jumbotron index">
    <h1 class="display-4 text-center">Coupons App</h1>
    <p class="lead text-center">
        Coupons App es una aplicacion que te permitira utilizar cupones para poder comprar productos
        a un mejor precio!
    </p>
    <p class="text-center">
        <a class="btn btn-primary btn-lg text-center" role="button" href="#">Ver mas</a>
    </p>
</div>

<div class="container mt-3">
    <div class="row d-flex justify-content-center">
        <div class="card-deck">
        <div class="col-md-4 card">
            <img class="card-image-top" src="https://via.placeholder.com/300x100C" alt="test">
            <div class="card-body">
                <h5 class="card-title">Card Title</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores placeat illum aperiam aut et provident odio nostrum, quibusdam vero praesentium ab quia eius, repudiandae commodi corrupti at explicabo quaerat culpa.</p>
                <a href="#" class="btn btn-primary">Obtener cupon</a>
            </div>
        </div>

        <div class="col-md-4 card">
            <img class="card-image-top" src="https://via.placeholder.com/300x100C" alt="test">
            <div class="card-body">
                <h5 class="card-title">Card Title</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores placeat illum aperiam aut et provident odio nostrum, quibusdam vero praesentium ab quia eius, repudiandae commodi corrupti at explicabo quaerat culpa.</p>
                <a href="#" class="btn btn-primary">Obtener cupon</a>
            </div>
        </div>

        <div class="col-md-4 card">
            <img class="card-image-top" src="https://via.placeholder.com/300x100C" alt="test">
            <div class="card-body">
                <h5 class="card-title">Card Title</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores placeat illum aperiam aut et provident odio nostrum, quibusdam vero praesentium ab quia eius, repudiandae commodi corrupti at explicabo quaerat culpa.</p>
                <a href="#" class="btn btn-primary">Obtener cupon</a>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
