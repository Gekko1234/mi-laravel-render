@extends('layouts.app')

@section('title', 'Registrar Avería')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Registrar Nueva Avería</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Errores al registrar:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm mb-3">
        <div class="card-body">
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
                    <label for="tecnico_id" class="form-label">Técnico asignado</label>
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
                        <option value="En reparación" {{ old('estado') == 'En reparación' ? 'selected' : '' }}>En reparación</option>
                        <option value="Resuelto" {{ old('estado') == 'Resuelto' ? 'selected' : '' }}>Resuelto</option>
                    </select>            
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-success">Registrar Avería</button>
                    <a href="{{ route('averias.index') }}" class="btn btn-secondary">
                        <img src="{{ asset('images/volver.png') }}" alt="Editar" style="width: 15px; height: 15px; margin-right: 5px;">Volver
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
