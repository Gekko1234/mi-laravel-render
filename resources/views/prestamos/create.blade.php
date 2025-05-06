@extends('layouts.app')

@section('title', 'Crear Préstamo')

@section('content')
    <div class="container">
        <h1 class="my-4">Registrar Nuevo Préstamo</h1>

        <form action="{{ route('prestamos.store') }}" method="POST">
            @csrf

            <!-- Selección de equipo -->
            <div class="mb-3">
                <label for="equipo_id" class="form-label">Equipo</label>
                <select name="equipo_id" class="form-select" required>
                    <option value="">Seleccione un equipo</option>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option> <!-- Mostrar nombre -->
                    @endforeach
                </select>
            </div>

            <!-- Selección de usuario -->
            <div class="mb-3">
                <label for="usuario_id" class="form-label">Usuario</label>
                <select name="usuario_id" class="form-select" required>
                    <option value="">Seleccione un usuario</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option> <!-- Mostrar nombre -->
                    @endforeach
                </select>
            </div>

            <!-- Fecha de préstamo -->
            <div class="mb-3">
                <label for="fecha_prestamo" class="form-label">Fecha de Préstamo</label>
                <input type="date" name="fecha_prestamo" class="form-control" required>
            </div>

            <!-- Fecha de devolución -->
            <div class="mb-3">
                <label for="fecha_devolucion" class="form-label">Fecha de Devolución</label>
                <input type="date" name="fecha_devolucion" class="form-control">
            </div>

            <!-- Observaciones -->
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" class="form-control" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Registrar Préstamo</button>
        </form>
    </div>
@endsection
