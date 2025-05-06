@extends('layouts.app')

@section('title', 'Lista de Averías')

@section('content')
    <h1 class="mb-4">Lista de Averías</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Equipo</th>
                <th>Técnico</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha Resolución</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($averias as $averia)
                <tr>
                    <td>{{ $averia->equipo->nombre }}</td>
                    <td>{{ $averia->tecnico?->nombre ?? 'Sin asignar' }}</td>
                    <td>{{ Str::limit($averia->descripcion, 40) }}</td>
                    <td>{{ $averia->estado }}</td>
                    <td>{{ $averia->fecha_resolucion ?? 'Pendiente' }}</td>
                    <td>
                        <a href="{{ route('averias.show', $averia->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('averias.edit', $averia->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
