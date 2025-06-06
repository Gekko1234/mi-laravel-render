@extends('layouts.app')

@section('title', 'Técnicos')

@section('content')
<h1 class="text-center mt-4">Lista de Técnicos</h1>

<div class="container mt-5">
    @if(Auth::user()->es_admin)
        <div class="d-flex mb-3">
            <a href="{{ route('tecnicos.create') }}" class="btn btn-success">Agregar Nuevo Técnico</a>
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
                    <th>Especialidad</th>
                    <th>Contacto</th>
                    @if(Auth::user()->es_admin)
                        <th class="text-center">Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($tecnicos as $tecnico)
                    <tr>
                        <td>{{ $tecnico->nombre }}</td>
                        <td>{{ $tecnico->especialidad }}</td>
                        <td>{{ $tecnico->contacto }}</td>
                        @if(Auth::user()->es_admin)
                            <td class="text-center">
                                <a href="{{ route('tecnicos.edit', $tecnico->id) }}" class="btn btn-sm btn-warning me-1">
                                    <img src="{{ asset('images/editar.png') }}" alt="Editar" style="width: 20px; height: 20px; margin-right: 5px;">Editar
                                </a>
                                <form action="{{ route('tecnicos.destroy', $tecnico->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Estás seguro de eliminar este técnico?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <img src="{{ asset('images/marca-x.png') }}" alt="Editar" style="width: 20px; height: 20px; margin-right: 5px;">Borrar
                                    </button>
                                </form>
                            </td>
                        @endif
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