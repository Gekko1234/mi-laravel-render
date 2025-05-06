@extends('layouts.app')

@section('title', 'Editar Avería')

@section('content')
    <h1 class="mb-4">Editar Avería</h1>

    <form action="{{ route('averias.update', $averia->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Equipo --}}
        <div class="mb-3">
            <label for="equipo_id">Equipo</label>
            <select name="equipo_id" class="form-select" required>
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}" {{ $averia->equipo_id == $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Técnico --}}
        <div class="mb-3">
            <label for="tecnico_id">Técnico asignado</label>
            <select name="tecnico_id" class="form-select">
                <option value="">Sin asignar</option>
                @foreach ($tecnicos as $tecnico)
                    <option value="{{ $tecnico->id }}" {{ $averia->tecnico_id == $tecnico->id ? 'selected' : '' }}>
                        {{ $tecnico->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Descripción --}}
        <div class="mb-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required>{{ $averia->descripcion }}</textarea>
        </div>

        {{-- Estado --}}
        <div class="mb-3">
            <label for="estado">Estado</label>
            <select name="estado" class="form-select" required>
                <option value="Pendiente" {{ $averia->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="En proceso" {{ $averia->estado == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                <option value="Resuelto" {{ $averia->estado == 'Resuelto' ? 'selected' : '' }}>Resuelto</option>
            </select>
        </div>

        {{-- Fecha de resolución --}}
        <div class="mb-3">
            <label for="fecha_resolucion">Fecha resolución</label>
            <input type="date" name="fecha_resolucion" class="form-control"
                   value="{{ $averia->fecha_resolucion }}">
        </div>

        <button type="submit" class="btn btn-success">Actualizar Avería</button>
    </form>
@endsection
