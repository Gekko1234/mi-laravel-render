@extends('layouts.app')

@section('title', 'Detalle del Préstamo')

@section('content')
    <div class="container mt-4">
        <h2>Detalle del Préstamo</h2>

        <div class="card mt-3">
            <div class="card-body">
                <p><strong>Usuario:</strong> {{ $prestamo->usuario->name }}</p>
                <p><strong>Equipo:</strong> {{ $prestamo->equipo->nombre }}</p>
                <p><strong>Fecha de Préstamo:</strong> {{ $prestamo->fecha_prestamo }}</p>
                <p><strong>Fecha de Devolución:</strong> {{ $prestamo->fecha_devolucion ?? 'No registrada' }}</p>
                <p><strong>Observaciones:</strong> {{ $prestamo->observaciones }}</p>

                <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
@endsection
