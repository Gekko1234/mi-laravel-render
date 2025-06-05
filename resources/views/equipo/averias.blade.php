@extends('layouts.app')

@section('title', 'Averías de Equipo: ' . $equipo->nombre)

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 d-flex justify-content-between align-items-center flex-wrap">
        Averías de {{ $equipo->nombre }}
        <a href="{{ route('equipos.averias.pdf', $equipo->id) }}" class="btn btn-primary" target="_blank">
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

    <table id="tablaAverias" class="table table-striped table-bordered datatable">
        <thead>
            <tr>
                <th>Fecha de Creación</th>
                <th>Descripción</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($averias as $averia)
                <tr>
                    <td>{{ $averia->fecha_creacion->format('Y-m-d') }}</td>
                    <td>
                        <div style="width: 200px; word-wrap: break-word; overflow-wrap: break-word; white-space: normal;">
                            {{ $averia->descripcion }}
                        </div>
                    </td>  
                    <td>{{ $averia->estado ?? 'Desconocido' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('averias.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/time-filter-averias.js') }}"></script>
@endpush
