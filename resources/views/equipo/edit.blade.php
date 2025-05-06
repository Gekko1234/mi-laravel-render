@extends('layouts.app')

@section('title', 'Editar Equipo')

@section('content')
    <h1>Editar equipo</h1>

    <form action="{{ route('equipo.update', $equipo->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('equipo.partials.form', ['equipo' => $equipo])
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
