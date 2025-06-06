@extends('layouts.app')

@section('title', 'Editar Técnico')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Editar Técnico</h1>

    <div class="card shadow-sm mb-3">
        <div class="card-body">
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

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">Actualizar Técnico</button>
                    <a href="{{ route('tecnicos.index') }}" class="btn btn-secondary">
                        <img src="{{ asset('images/volver.png') }}" alt="Editar" style="width: 15px; height: 15px; margin-right: 5px;">Volver
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
