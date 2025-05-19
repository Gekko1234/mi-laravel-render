@extends('layouts.app')

@section('content')
<h1>Aula: {{ $aula->nombre }}</h1>
<p>Planta: {{ $aula->planta }}</p>
<p>Posición X: {{ $aula->pos_x }}</p>
<p>Posición Y: {{ $aula->pos_y }}</p>

<h3>Equipos en esta aula:</h3>
<ul>
    @forelse ($aula->equipos as $equipo)
        <li>{{ $equipo->nombre ?? 'Equipo sin nombre' }}</li>
    @empty
        <li>No hay equipos</li>
    @endforelse
</ul>

<a href="{{ route('aulas.index') }}">Volver</a>
@endsection
