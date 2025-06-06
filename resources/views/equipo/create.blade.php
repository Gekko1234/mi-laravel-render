@extends('layouts.app')

@section('title', 'Crear Equipo')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Crear Nuevo Equipo</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <form action="{{ route('equipo.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del equipo</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                </div>

                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" name="marca" id="marca" class="form-control" value="{{ old('marca') }}" required>
                </div>

                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" name="modelo" id="modelo" class="form-control" value="{{ old('modelo') }}">
                </div>

                <div class="mb-3">
                    <label for="numero_serie" class="form-label">Número de Serie</label>
                    <input type="text" name="numero_serie" id="numero_serie" class="form-control" value="{{ old('numero_serie') }}">
                </div>

                <div class="mb-3">
                    <label for="fecha_adquisicion" class="form-label">Fecha de Adquisición</label>
                    <input type="date" name="fecha_adquisicion" id="fecha_adquisicion" class="form-control" value="{{ old('fecha_adquisicion') }}">
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" id="estado" class="form-select" required>
                        <option value="Disponible" {{ old('estado') == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="En Reparación" {{ old('estado') == 'En Reparación' ? 'selected' : '' }}>En Reparación</option>
                        <option value="Dado de baja" {{ old('estado') == 'Dado de baja' ? 'selected' : '' }}>Dado de baja</option>
                        <option value="En uso" {{ old('estado') == 'En uso' ? 'selected' : '' }}>En uso</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="aula_id" class="form-label">Aula</label>
                    <select name="aula_id" id="aula_id" class="form-select" required>
                        <option value="">-- Seleccione un aula --</option>
                        @foreach($aulas as $aula)
                            <option value="{{ $aula->id }}" {{ old('aula_id') == $aula->id ? 'selected' : '' }}>
                                {{ $aula->nombre }} (Planta {{ $aula->planta }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Crear Equipo</button>
                    <a href="{{ route('equipo.index') }}" class="btn btn-secondary">
                        <img src="{{ asset('images/volver.png') }}" alt="Editar" style="width: 15px; height: 15px; margin-right: 5px;">Volver
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
