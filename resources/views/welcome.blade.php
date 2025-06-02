@extends('layouts.app')

@section('title', 'Página Principal')

@section('content')
    <div class="container-fluid">
        <h1>Bienvenido a la página principal</h1>
        <div class="row">
            <div class="col">
                <img src="" alt="">
            </div>

        </div>
    </div>
    

    <!-- Si el usuario está autenticado, muestra un saludo -->
    @auth
        <p>Hola, {{ Auth::user()->name }}!</p>
    @else
        <p>Por favor, inicia sesión.</p>
    @endauth
    <img src="{{ asset("images/portada.jpg") }}" width="1200px" height="800px"/>
@endsection
