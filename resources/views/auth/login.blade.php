@extends('layouts.app') <!-- Extiende el layout principal de la aplicación -->

@section('title', 'Iniciar Sesión') <!-- Título de la página -->

@section('content')
    <!-- Contenido principal -->
    <h1>Iniciar Sesión</h1>

    <!-- Mensaje de error si no se puede iniciar sesión -->
    @if (session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    <!-- Formulario de inicio de sesión -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required autofocus>
        </div>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Entrar</button>
    </form>
@endsection
