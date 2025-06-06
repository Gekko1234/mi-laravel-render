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

    <div class="mb-3">
        <label for="filtroTiempo" class="form-label">Filtrar por periodo:</label>
        <select id="filtroTiempo" class="form-select" style="max-width: 250px;">
            <option value="7">Última semana</option>
            <option value="30" selected>Último mes</option>
            <option value="365">Último año</option>
            <option value="0">Todos</option>
        </select>
    </div>

    @if ($prestamos->isEmpty())
        <div class="alert alert-info">No hay préstamos registrados para este usuario.</div>
    @else
        <div class="table-responsive">
            <table id="tablaPrestamos" class="table table-striped table-bordered align-middle datatable">
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
                            <td>
                                <div style="max-width: 200px; word-wrap: break-word; overflow-wrap: break-word; white-space: normal;">
                                    {{ $prestamo->observaciones ?? 'N/A' }}
                                </div>
                            </td>
                            <td>{{ $prestamo->estado === 'Sin prestar' ? 'Finalizado' : $prestamo->estado }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    
    <div class="mb-3">
        <a href="{{ route('prestamos.index') }}" class="btn btn-secondary mt-3">
            <img src="{{ asset('images/volver.png') }}" alt="Editar" style="width: 15px; height: 15px; margin-right: 5px;">Volver
        </a>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/time-filter-prestamos.js') }}"></script>
@endpush
