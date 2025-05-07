@extends('layouts.app')

@section('title', 'Listado de Equipos')

@section('content')
    <h1 class="mb-4">Listado de Equipos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('equipo.create') }}" class="btn btn-success mb-3">Crear nuevo equipo</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Estado</th>
                <th>Aula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->marca }}</td>
                    <td>{{ $equipo->modelo }}</td>
                    <td>{{ $equipo->estado }}</td>
                    <td>{{ $equipo->aula->nombre ?? 'Sin aula' }}</td>
                    <td>
                        <a href="{{ route('equipo.show', $equipo->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('equipo.edit', $equipo->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('equipo.destroy', $equipo->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('¿Estás seguro de eliminar este equipo?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
