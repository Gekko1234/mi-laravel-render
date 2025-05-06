@extends('layouts.app')

@section('title', 'Registrar Avería')

@section('content')
    <h1 class="mb-4">Registrar Nueva Avería</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Errores al registrar:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('averias.store') }}" method="POST">
        @csrf

        {{-- Equipo --}}
        <div class="mb-3">
            <label for="equipo_id" class="form-label">Equipo</label>
            <select name="equipo_id" class="form-select" required>
                <option value="">Selecciona un equipo</option>
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}" {{ old('equipo_id') == $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->nombre }} ({{ $equipo->modelo }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Técnico --}}
        <div class="mb-3">
            <label for="tecnico_id" class="form-label">Técnico asignado (opcional)</label>
            <select name="tecnico_id" class="form-select">
                <option value="">Sin asignar</option>
                @foreach ($tecnicos as $tecnico)
                    <option value="{{ $tecnico->id }}" {{ old('tecnico_id') == $tecnico->id ? 'selected' : '' }}>
                        {{ $tecnico->nombre }} - {{ $tecnico->especialidad }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Descripción --}}
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción de la avería</label>
            <textarea name="descripcion" class="form-control" rows="3" required>{{ old('descripcion') }}</textarea>
        </div>

        {{-- Estado --}}
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-select" required>
                <option value="Pendiente" {{ old('estado') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="En proceso" {{ old('estado') == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                <option value="Resuelto" {{ old('estado') == 'Resuelto' ? 'selected' : '' }}>Resuelto</option>
            </select>
        </div>

        {{-- Fecha de resolución --}}
        <div class="mb-3">
            <label for="fecha_resolucion" class="form-label">Fecha de resolución (opcional)</label>
            <input type="date" name="fecha_resolucion" class="form-control" value="{{ old('fecha_resolucion') }}">
        </div>

        <button type="submit" class="btn btn-success">Registrar Avería</button>
    </form>
@endsection
