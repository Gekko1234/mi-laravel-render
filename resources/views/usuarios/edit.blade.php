@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="container mt-4">
    <h2>Editar Usuario</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $usuario->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $usuario->apellidos) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $usuario->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $usuario->telefono) }}" required>
        </div>

        <div class="mb-3">
            <label for="cargo" class="form-label">Cargo</label>
            <select name="cargo" class="form-select" required>
                <option value="Profesor" {{ $usuario->cargo == 'Profesor' ? 'selected' : '' }}>Profesor</option>
                <option value="Alumno" {{ $usuario->cargo == 'Alumno' ? 'selected' : '' }}>Alumno</option>
                <option value="Técnico" {{ $usuario->cargo == 'Técnico' ? 'selected' : '' }}>Técnico</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="departamento" class="form-label">Departamento</label>
            <input type="text" name="departamento" class="form-control" value="{{ old('departamento', $usuario->departamento) }}">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="es_admin" id="es_admin" class="form-check-input" value="1"
                {{ $usuario->es_admin ? 'checked' : '' }}>
            <label class="form-check-label" for="es_admin">Es administrador</label>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
