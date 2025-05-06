@extends('layouts.app')

@section('title', 'Página Principal')

@section('content')
    <h1>Bienvenido a la página principal</h1>

    <!-- Si el usuario está autenticado, muestra un saludo -->
    @auth
        <p>Hola, {{ Auth::user()->name }}!</p>
    @else
        <p>Por favor, inicia sesión.</p>
    @endauth
@endsection
