@extends('layouts.app') <!-- Extiende el layout principal de la aplicación -->

@section('title', 'Crear Usuario') <!-- Título de la página -->

@section('content')
    <!-- Contenido principal -->
    <h1>Crear nuevo usuario</h1>

    <!-- Mostrar mensaje de éxito si se crea el usuario -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulario para crear usuario -->
    <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf
    
        <!-- Nombre -->
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name') <span class="error">{{ $message }}</span> @enderror

        <!-- Email -->
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email') <span class="error">{{ $message }}</span> @enderror

        <!-- Contraseña -->
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>
        @error('password') <span class="error">{{ $message }}</span> @enderror

        <!-- Confirmar Contraseña -->
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <!-- Apellidos -->
        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
        @error('apellidos') <span class="error">{{ $message }}</span> @enderror

        <!-- Cargo -->
        <label for="cargo" class="form-label">Cargo</label>
        <select name="cargo" id="cargo" class="form-select" required>
            <option value="">Seleccionar cargo</option>
            <option value="Profesor" {{ old('cargo') == 'Profesor' ? 'selected' : '' }}>Profesor</option>
            <option value="Alumno" {{ old('cargo') == 'Alumno' ? 'selected' : '' }}>Alumno</option>
        </select>
        @error('cargo') <small class="text-danger">{{ $message }}</small> @enderror

        <!-- Departamento -->
        <label for="departamento">Departamento</label>
        <input type="text" id="departamento" name="departamento" value="{{ old('departamento') }}">
        @error('departamento') <span class="error">{{ $message }}</span> @enderror

        <!-- Teléfono -->
        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
        @error('telefono') <span class="error">{{ $message }}</span> @enderror

        <!-- Es admin (checkbox) -->
        <label for="es_admin">Es Admin</label>
        <input type="checkbox" id="es_admin" name="es_admin" value="1" {{ old('es_admin') ? 'checked' : '' }}>

        <button type="submit">Crear Usuario</button>
    </form>
@endsection
