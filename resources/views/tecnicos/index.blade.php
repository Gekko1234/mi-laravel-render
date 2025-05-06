@extends('layouts.app')

@section('title', 'Técnicos')

@section('content')
    <h1 class="text-center mt-4">Lista de Técnicos</h1>

    <div class="container mt-5">
        <a href="{{ route('tecnicos.create') }}" class="btn btn-success mb-3">Agregar Nuevo Técnico</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Contacto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tecnicos as $tecnico)
                    <tr>
                        <td>{{ $tecnico->nombre }}</td>
                        <td>{{ $tecnico->especialidad }}</td>
                        <td>{{ $tecnico->contacto }}</td>
                        <td>
                            <a href="{{ route('tecnicos.edit', $tecnico->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('tecnicos.destroy', $tecnico->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este técnico?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
