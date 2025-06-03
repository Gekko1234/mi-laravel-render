@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Editar Usuario</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $usuario->name) }}" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ old('apellidos', $usuario->apellidos) }}" required>
                    @error('apellidos') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $usuario->email) }}" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $usuario->telefono) }}" required>
                    @error('telefono') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="cargo" class="form-label">Cargo</label>
                    <select name="cargo" id="cargo" class="form-select" required>
                        <option value="Profesor" {{ $usuario->cargo == 'Profesor' ? 'selected' : '' }}>Profesor</option>
                        <option value="Alumno" {{ $usuario->cargo == 'Alumno' ? 'selected' : '' }}>Alumno</option>
                        <option value="Técnico" {{ $usuario->cargo == 'Técnico' ? 'selected' : '' }}>Técnico</option>
                    </select>
                    @error('cargo') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="departamento" class="form-label">Departamento</label>
                    <input type="text" name="departamento" id="departamento" class="form-control" value="{{ old('departamento', $usuario->departamento) }}">
                    @error('departamento') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="es_admin" id="es_admin" class="form-check-input" value="1"
                        {{ old('es_admin', $usuario->es_admin) ? 'checked' : '' }}>
                    <label class="form-check-label" for="es_admin">¿Es administrador?</label>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
