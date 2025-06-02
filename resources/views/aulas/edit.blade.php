@extends('layouts.app')

@section('content')
<h1>Editar Aula</h1>

<form action="{{ route('aulas.update', $aula->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ $aula->nombre }}" required>

    <label>Planta:</label>
    <input type="number" name="planta" value="{{ $aula->planta }}" min="0" required>

    <label>Posición X:</label>
    <input type="number" name="pos_x" value="{{ $aula->pos_x }}" required>

    <label>Posición Y:</label>
    <input type="number" name="pos_y" value="{{ $aula->pos_y }}" required>

    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('aulas.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
