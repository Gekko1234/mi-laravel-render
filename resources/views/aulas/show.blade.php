@extends('layouts.app')

@section('title', 'Detalles del Aula')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="mb-3">Aula: {{ $aula->nombre }}</h1>

            <p><strong>Planta:</strong> {{ $aula->planta }}</p>
            <p><strong>Posición X:</strong> {{ $aula->pos_x }}</p>
            <p><strong>Posición Y:</strong> {{ $aula->pos_y }}</p>

            <h4 class="mt-4">Equipos en esta aula:</h4>
            <ul class="list-group mb-4">
                @forelse ($aula->equipos as $equipo)
                    <li class="list-group-item">{{ $equipo->nombre ?? 'Equipo sin nombre' }}</li>
                @empty
                    <li class="list-group-item text-muted">No hay equipos</li>
                @endforelse
            </ul>

            <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
