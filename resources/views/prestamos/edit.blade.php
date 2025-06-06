@extends('layouts.app')

@section('title', 'Editar Préstamo')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Editar Préstamo</h1>

    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <form action="{{ route('prestamos.update', $prestamo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Selección de equipo -->
                <div class="mb-3">
                    <label for="equipo_id" class="form-label">Equipo</label>
                    <select name="equipo_id" id="equipo_id" class="form-select" required>
                        <option value="">Seleccione un equipo</option>
                        @foreach($equipos as $equipo)
                            <option value="{{ $equipo->id }}" {{ (old('equipo_id', $prestamo->equipo_id) == $equipo->id) ? 'selected' : '' }}>
                                {{ $equipo->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('equipo_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Selección de usuario -->
                <div class="mb-3">
                    <label for="user_id" class="form-label">Usuario</label>
                    <select name="user_id" id="user_id" class="form-select" required>
                        <option value="">Seleccione un usuario</option>
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ (old('user_id', $prestamo->user_id) == $usuario->id) ? 'selected' : '' }}>
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Estado -->
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" id="estado" class="form-select" required>
                        <option value="Prestado" {{ (old('estado', $prestamo->estado) == 'Prestado') ? 'selected' : '' }}>Prestado</option>
                        <option value="Sin prestar" {{ (old('estado', $prestamo->estado) == 'Sin prestar') ? 'selected' : '' }}>Sin prestar</option>
                    </select>
                    @error('estado') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Fecha Préstamo -->
                <div class="mb-3">
                    <label for="fecha_prestamo" class="form-label">Fecha Préstamo</label>
                    <input type="date" name="fecha_prestamo" id="fecha_prestamo" class="form-control" value="{{ old('fecha_prestamo', $prestamo->fecha_prestamo) }}">
                    @error('fecha_prestamo') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Fecha Devolución -->
                <div class="mb-3">
                    <label for="fecha_devolucion" class="form-label">Fecha Devolución</label>
                    <input type="date" name="fecha_devolucion" id="fecha_devolucion" class="form-control" value="{{ old('fecha_devolucion', $prestamo->fecha_devolucion) }}">
                    @error('fecha_devolucion') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Observaciones -->
                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea name="observaciones" id="observaciones" class="form-control" rows="4">{{ old('observaciones', $prestamo->observaciones) }}</textarea>
                    @error('observaciones') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">Actualizar Prestamo</button>
                    <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">
                        <img src="{{ asset('images/volver.png') }}" alt="Editar" style="width: 15px; height: 15px; margin-right: 5px;">Volver
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
