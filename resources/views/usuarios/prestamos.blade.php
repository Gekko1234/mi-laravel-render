@extends('layouts.app')

@section('title', 'Préstamos de ' . $usuario->name)

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 d-flex justify-content-between align-items-center flex-wrap">
        Préstamos de {{ $usuario->name }}
        <a href="{{ route('usuarios.prestamos.pdf', $usuario->id) }}" class="btn btn-primary" target="_blank">
            Descargar PDF
        </a>
    </h1>

    @if ($prestamos->isEmpty())
        <div class="alert alert-info">No hay préstamos registrados para este usuario en el último mes.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Equipo</th>
                        <th>Fecha de Préstamo</th>
                        <th>Fecha de Devolución</th>
                        <th>Observaciones</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestamos as $prestamo)
                        <tr>
                            <td>{{ $prestamo->equipo->nombre }}</td>
                            <td>{{ \Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y') }}</td>
                            <td>{{ $prestamo->fecha_devolucion ? \Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y') : 'No devuelto' }}</td>
                            <td>{{ $prestamo->observaciones ?? 'N/A' }}</td>
                            <td>{{ $prestamo->estado === 'Sin prestar' ? 'Finalizado' : $prestamo->estado }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
