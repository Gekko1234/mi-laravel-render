@extends('layouts.app')

@section('title', 'Averías de ' . $equipo->nombre)

@section('content')
    <h1 class="mb-4">Averías del equipo: {{ $equipo->nombre }} 
        <a href="{{ route('equipos.averias.pdf', $equipo->id) }}" class="btn btn-primary mb-3" target="_blank">
            Descargar PDF
        </a>
    </h1>


    @if ($averias->isEmpty())
        <p>No hay averías registradas para este equipo en el último mes.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha de Resolución</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($averias as $averia)
                    <tr>
                        <td>{{ $averia->descripcion }}</td>
                        <td>{{ $averia->estado }}</td>
                        <td>{{ \Carbon\Carbon::parse($averia->fecha_creacion)->format('d/m/Y H:i') }}</td>
                        <td>{{ $averia->fecha_resolucion ?? 'Pendiente' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('averias.index') }}" class="btn btn-secondary">Volver</a>
@endsection
