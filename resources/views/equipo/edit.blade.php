@extends('layouts.app')

@section('title', 'Editar Equipo')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Editar Equipo</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('equipo.update', $equipo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del equipo</label>
            <input type="text" name="nombre" id="nombre" class="form-control" 
                   value="{{ old('nombre', $equipo->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control" 
                   value="{{ old('marca', $equipo->marca) }}" required>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control" 
                   value="{{ old('modelo', $equipo->modelo) }}">
        </div>

        <div class="mb-3">
            <label for="numero_serie" class="form-label">Número de Serie</label>
            <input type="text" name="numero_serie" id="numero_serie" class="form-control" 
                   value="{{ old('numero_serie', $equipo->numero_serie) }}">
        </div>

        <div class="mb-3">
            <label for="fecha_adquisicion" class="form-label">Fecha de Adquisición</label>
            <input type="date" name="fecha_adquisicion" id="fecha_adquisicion" class="form-control" 
                   value="{{ old('fecha_adquisicion', $equipo->fecha_adquisicion) }}">
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="Disponible" {{ old('estado', $equipo->estado) == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="En Reparación" {{ old('estado', $equipo->estado) == 'En Reparación' ? 'selected' : '' }}>En Reparación</option>
                <option value="Dado de baja" {{ old('estado', $equipo->estado) == 'Dado de baja' ? 'selected' : '' }}>Dado de baja</option>
                <option value="En uso" {{ old('estado', $equipo->estado) == 'En uso' ? 'selected' : '' }}>En uso</option>
            </select>
        </div>

        <div class="form-group">
            <label for="aula_id">Aula</label>
            <select name="aula_id" id="aula_id" class="form-control" required>
                <option value="">-- Seleccione un aula --</option>
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}" 
                        {{ old('aula_id', $equipo->aula_id) == $aula->id ? 'selected' : '' }}>
                        {{ $aula->nombre }} (Planta {{ $aula->planta }})
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Equipo</button>
        <a href="{{ route('equipo.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </form>
</div>
@endsection
