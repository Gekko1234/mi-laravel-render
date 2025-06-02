@extends('layouts.app')

@section('title', 'Agregar Técnico')

@section('content')
    <h1 class="text-center mt-4">Agregar Nuevo Técnico</h1>

    <div class="container mt-5">
        <form action="{{ route('tecnicos.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="especialidad">Especialidad</label>
                <input type="text" class="form-control" id="especialidad" name="especialidad" required>
            </div>

            <div class="form-group">
                <label for="contacto">Contacto</label>
                <input type="text" class="form-control" id="contacto" name="contacto" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
            <a href="{{ route('tecnicos.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
@endsection
