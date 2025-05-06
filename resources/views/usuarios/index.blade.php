@extends('layouts.app')

@section('title', 'Listado de Usuarios')

@section('content')
<div class="container mt-4">
    <h2>Usuarios Registrados</h2>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Ficha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-info btn-sm">Ficha de usuario</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
