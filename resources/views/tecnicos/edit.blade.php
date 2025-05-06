@extends('layouts.app')

@section('title', 'Editar Técnico')

@section('content')
    <h1 class="mb-4">Editar Técnico</h1>

    <form action="{{ route('tecnicos.update', $tecnico->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $tecnico->nombre) }}" required>
            @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="especialidad" class="form-label">Especialidad</label>
            <input type="text" name="especialidad" class="form-control" value="{{ old('especialidad', $tecnico->especialidad) }}">
            @error('especialidad') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="contacto" class="form-label">Contacto</label>
            <input type="text" name="contacto" class="form-control" value="{{ old('contacto', $tecnico->contacto) }}">
            @error('contacto') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success">Actualizar Técnico</button>
        <a href="{{ route('tecnicos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
