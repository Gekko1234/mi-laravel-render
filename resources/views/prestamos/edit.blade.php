@extends('layouts.app')

@section('title', 'Editar Préstamo')

@section('content')
    <div class="container mt-4">
        <h2>Editar Préstamo</h2>

        <form action="{{ route('prestamos.update', $prestamo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="usuario_id" class="form-label">Usuario</label>
                <select name="usuario_id" class="form-select" required>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $prestamo->usuario_id == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="equipo_id" class="form-label">Equipo</label>
                <select name="equipo_id" class="form-select" required>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}" {{ $prestamo->equipo_id == $equipo->id ? 'selected' : '' }}>
                            {{ $equipo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha_prestamo" class="form-label">Fecha Préstamo</label>
                <input type="date" name="fecha_prestamo" class="form-control" value="{{ $prestamo->fecha_prestamo }}">
            </div>

            <div class="mb-3">
                <label for="fecha_devolucion" class="form-label">Fecha Devolución</label>
                <input type="date" name="fecha_devolucion" class="form-control" value="{{ $prestamo->fecha_devolucion }}">
            </div>

            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" class="form-control">{{ $prestamo->observaciones }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
