@extends('layouts.app')

@section('title', 'Aulas')

@section('content')
    <h1 class="text-center mt-4">Lista de Aulas</h1>

    <div class="container mt-5">
        <a href="{{ route('aulas.create') }}" class="btn btn-success mb-3">Agregar Nueva Aula</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
        <table class="table table-bordered datatable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Planta</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aulas as $aula)
                    <tr>
                        <td>
                            <a href="{{ route('aulas.show', $aula->id) }}">{{ $aula->nombre }}</a>
                        </td>
                        <td>{{ $aula->planta }}</td>
                        <td class="text-center">
                            <form action="{{ route('aulas.destroy', $aula->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta aula?')">
                                    <img src="{{ asset('images/marca-x.png') }}" alt="Editar" style="width: 15px; height: 15px; margin-right: 5px;">Borrar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <a href="{{ route('admin.panel') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('js/datatables-config.js') }}"></script>
@endpush

