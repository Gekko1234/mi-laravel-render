@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<h1 class="text-center mt-4">Lista de Usuarios</h1>

<div class="container mt-5">

    @if(Auth::user()->es_admin)
        <div class="d-flex mb-3">
            <a href="{{ route('usuarios.create') }}" class="btn btn-success">Agregar Nuevo Usuario</a>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle datatable">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-sm btn-info">
                                Ficha de usuario
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.panel') }}" class="btn btn-secondary mb-3">
            <img src="{{ asset('images/volver.png') }}" alt="Editar" style="width: 15px; height: 15px; margin-right: 5px;">Volver
        </a>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/datatables-config.js') }}"></script>
@endpush
