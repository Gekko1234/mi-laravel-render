@extends('layouts.app')

@section('title', 'Detalles del Equipo')

@section('content')
    <h1>Detalles del Equipo</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $equipo->nombre }}</p>
            <p><strong>Marca:</strong> {{ $equipo->marca }}</p>
            <p><strong>Modelo:</strong> {{ $equipo->modelo }}</p>
            <p><strong>Número de Serie:</strong> {{ $equipo->numero_serie }}</p>
            <p><strong>Fecha de Adquisición:</strong> {{ $equipo->fecha_adquisicion }}</p>
            <p><strong>Estado:</strong> {{ $equipo->estado }}</p>
            @if ($equipo->aula)
                <p><strong>Aula:</strong> {{ $equipo->aula->nombre }} (Planta {{ $equipo->aula->planta }})</p>
            @else
                <p><strong>Aula:</strong> No asignada</p>
            @endif
        </div>
    </div>

    <a href="{{ route('equipo.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
