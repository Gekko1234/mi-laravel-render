@extends('layouts.app')

@section('title', 'Editar Avería')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Editar Avería</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('averias.update', $averia->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Equipo --}}
                <div class="mb-3">
                    <label for="equipo_id" class="form-label">Equipo</label>
                    <select name="equipo_id" id="equipo_id" class="form-select" required>
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}" {{ $averia->equipo_id == $equipo->id ? 'selected' : '' }}>
                                {{ $equipo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Técnico --}}
                <div class="mb-3">
                    <label for="tecnico_id" class="form-label">Técnico asignado</label>
                    <select name="tecnico_id" id="tecnico_id" class="form-select">
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
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required>{{ $averia->descripcion }}</textarea>
                </div>

                {{-- Estado --}}
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" id="estado" class="form-select" required>
                        <option value="Pendiente" {{ $averia->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="En reparación" {{ $averia->estado == 'En reparación' ? 'selected' : '' }}>En reparación</option>
                        <option value="Resuelto" {{ $averia->estado == 'Resuelto' ? 'selected' : '' }}>Resuelto</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Actualizar Avería</button>
                    <a href="{{ route('averias.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
