@extends('layouts.app')

@section('title', 'Detalle de Avería')

@section('content')
    <h1 class="mb-4">Detalle de Avería</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Equipo:</strong> {{ $averia->equipo->nombre }}</p>
            <p><strong>Técnico asignado:</strong> {{ $averia->tecnico?->nombre ?? 'Sin asignar' }}</p>
            <p><strong>Descripción:</strong> {{ $averia->descripcion }}</p>
            <p><strong>Estado:</strong> {{ $averia->estado }}</p>
            <p><strong>Fecha de resolución:</strong> {{ $averia->fecha_resolucion ?? 'No resuelta' }}</p>
        </div>
    </div>

    <a href="{{ route('averias.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
