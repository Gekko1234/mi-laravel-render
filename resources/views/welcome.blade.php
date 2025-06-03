@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
@endsection


@section('title', 'Página Principal')

@section('content')
<div class="container-fluid">
    <h1>Bienvenido a la página principal</h1>
    @auth
        <p class="mt-3">Hola, {{ Auth::user()->name }}!</p>
    @else
        <p>Por favor, inicia sesión.</p>
    @endauth

    <div class="hero-container mx-auto">
        <img src="{{ asset('images/portada.jpg') }}" alt="Portada" class="hero-image">

        @auth
            <a class="btn btn-success hero-button" href="{{ route('admin.panel') }}">
                Panel de Administración
            </a>
        @endauth
    </div>
</div>

@endsection
