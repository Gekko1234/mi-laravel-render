@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/mapas.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>Crear Aula</h1>

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
            <div id="mapaClick" class="mapa-container">
                <img src="{{ asset('images/plano-planta0.jpg') }}" class="mapa-planta visible" alt="Mapa planta 0" id="mapaImagen">
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

        <button type="submit" class="btn btn-primary">Guardar Aula</button>
        <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const plantaSelect = document.getElementById('planta');
    const mapaImagen = document.getElementById('mapaImagen');
    const mapa = document.getElementById('mapaClick');
    const inputX = document.getElementById('pos_x');
    const inputY = document.getElementById('pos_y');

    // Cambia la imagen al cambiar planta
    plantaSelect.addEventListener('change', function () {
        const planta = this.value;
        mapaImagen.src = `{{ asset('images/plano-planta') }}` + planta + '.jpg';

        // Limpia coordenadas porque cambias de mapa
        inputX.value = '';
        inputY.value = '';
    });

    mapa.addEventListener('click', function (e) {
        const rect = mapa.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        // Limita para que no pase del contenedor
        const maxX = mapa.clientWidth;
        const maxY = mapa.clientHeight;

        inputX.value = Math.min(Math.max(0, Math.round(x)), maxX);
        inputY.value = Math.min(Math.max(0, Math.round(y)), maxY);
    });
});
</script>
@endsection
