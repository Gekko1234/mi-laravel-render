@extends('layouts.app')

@section('title', 'Préstamos de ' . $usuario->name)

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Préstamos de {{ $usuario->name }}
            <a href="{{ route('usuarios.prestamos.pdf', $usuario->id) }}" class="btn btn-primary mb-3" target="_blank">
                Descargar PDF
            </a>
        </h1>

        @if ($prestamos->isEmpty())
            <p>No hay préstamos registrados para este usuario en el último mes.</p>
        @else
            <table class="table table-bordered">
                <thead>
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
                            <td>{{ \Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y H:i') }}</td>
                            <td>{{ $prestamo->fecha_devolucion ? \Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y H:i') : 'No devuelto' }}</td>
                            <td>{{ $prestamo->observaciones ?? 'N/A' }}</td>
                            <td>{{ $prestamo->estado === 'Sin prestar' ? 'Finalizado' : $prestamo->estado }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
@endsection
