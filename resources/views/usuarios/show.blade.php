@extends('layouts.app')

@section('title', 'Ficha de Usuario')

@section('content')
<div class="container mt-4">
    <h2>Ficha de {{ $usuario->name }}</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{ $usuario->name }}</li>
        <li class="list-group-item"><strong>Apellidos:</strong> {{ $usuario->apellidos }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $usuario->email }}</li>
        <li class="list-group-item"><strong>Teléfono:</strong> {{ $usuario->telefono }}</li>
        <li class="list-group-item"><strong>Cargo:</strong> {{ $usuario->cargo }}</li>
        <li class="list-group-item"><strong>Departamento:</strong> {{ $usuario->departamento ?? 'N/A' }}</li>
    </ul>

    <div class="mt-3">
        @if(Auth::user()->es_admin)
        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">
            <img src="{{ asset('images/editar.png') }}" alt="Editar" style="width: 20px; height: 20px; margin-right: 5px;">Editar
        </a>

        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline"
                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <img src="{{ asset('images/marca-x.png') }}" alt="Editar" style="width: 20px; height: 20px; margin-right: 5px;">Borrar
            </button>
        </form>
        @endif
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
            <img src="{{ asset('images/volver.png') }}" alt="Editar" style="width: 15px; height: 15px; margin-right: 5px;">Volver
        </a>

    </div>
</div>
@endsection
