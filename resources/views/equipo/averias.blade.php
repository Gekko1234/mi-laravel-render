@extends('layouts.app')

@section('title', 'Averías de ' . $equipo->nombre)

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 d-flex justify-content-between align-items-center flex-wrap">
        Averías del equipo: {{ $equipo->nombre }}
        <a href="{{ route('equipos.averias.pdf', $equipo->id) }}" class="btn btn-primary" target="_blank">
            Descargar PDF
        </a>
    </h1>

    @if ($averias->isEmpty())
        <div class="alert alert-info">No hay averías registradas para este equipo en el último mes.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 40%">Descripción</th>
                        <th>Estado</th>
                        <th>Fecha de Creación</th>
                        <th>Fecha de Resolución</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($averias as $averia)
                        <tr>
                            <td style="white-space: pre-wrap; word-break: break-word;">{{ $averia->descripcion }}</td>
                            <td>{{ $averia->estado }}</td>
                            <td>{{ \Carbon\Carbon::parse($averia->fecha_creacion)->format('d/m/Y') }}</td>
                            <td>{{ $averia->fecha_resolucion ?? 'Pendiente' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <a href="{{ route('averias.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
