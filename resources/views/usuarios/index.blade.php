@extends('layouts.app')

@section('title', 'Listado de Usuarios')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Usuarios Registrados</h2>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th class="text-center">Ficha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-info btn-sm">
                                Ficha de usuario
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.panel') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection
