@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/mapas.css') }}">
@endsection

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Crear Aula</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Errores!</strong> Por favor corrige lo siguiente:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('aulas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Aula</label>
            <input type="text" name="nombre" class="form-control" required value="{{ old('nombre') }}">
        </div>

        <div class="mb-3">
            <label for="planta" class="form-label">Planta</label>
            <select name="planta" id="planta" class="form-control" required>
                <option value="0" {{ old('planta') == 0 ? 'selected' : '' }}>Planta 0</option>
                <option value="1" {{ old('planta') == 1 ? 'selected' : '' }}>Planta 1</option>
                <option value="2" {{ old('planta') == 2 ? 'selected' : '' }}>Planta 2</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Haz clic en el mapa para seleccionar la posición del aula:</label>
            {{-- <div id="mapaClick" class="mapa-container">
                <img src="{{ asset('images/plano-planta0.jpg') }}" class="mapa-planta visible" alt="Mapa planta 0" id="mapaImagen">
            </div> --}}
            <div id="mapaClick" class="mapa-container">
                @foreach ([0,1,2] as $planta)
                    <img
                        src="{{ asset("images/plano-planta{$planta}.jpg") }}"
                        alt="Mapa planta {{ $planta }}"
                        class="mapa-planta {{ $planta === 0 ? 'visible' : '' }}"
                        data-planta="{{ $planta }}"
                        style="width: 100%; height: auto;"
                    >
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="pos_x" class="form-label">Posición X</label>
            <input type="number" name="pos_x" id="pos_x" class="form-control" readonly required value="{{ old('pos_x') }}">
        </div>

        <div class="mb-3">
            <label for="pos_y" class="form-label">Posición Y</label>
            <input type="number" name="pos_y" id="pos_y" class="form-control" readonly required value="{{ old('pos_y') }}">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Guardar Aula</button>
            <a href="{{ route('aulas.index') }}" class="btn btn-secondary">
                <img src="{{ asset('images/volver.png') }}" alt="Editar" style="width: 15px; height: 15px; margin-right: 5px;">Volver
            </a>
        </div>
    </form>
</div>




@endsection

@push('scripts')
    <script src="{{ asset('js/create-mapa.js') }}"></script>
@endpush