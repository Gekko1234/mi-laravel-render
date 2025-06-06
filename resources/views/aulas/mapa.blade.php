@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/mapas.css') }}">
@endsection

@section('title', 'Mapa de Aulas')

@section('content')
<div class="container">
    <h1 class="mb-4">Mapa de Aulas</h1>

    <label for="selectPlanta" class="form-label">Selecciona planta:</label>
    <select id="selectPlanta" class="form-select planta-selector mb-4" style="max-width: 200px;">
        @foreach($plantas as $planta)
            <option value="{{ $planta }}">Planta {{ $planta }}</option>
        @endforeach
    </select>

    <div id="mapaContainer" class="mapa-container position-relative" data-plantas='@json($plantas)'>
        @foreach($plantas as $planta)
            <img
                src="{{ asset("images/plano-planta{$planta}.jpg") }}"
                id="mapaPlanta{{ $planta }}"
                class="mapa-planta {{ $planta === 0 ? 'visible' : '' }}"
                alt="Plano planta {{ $planta }}"
            >
        @endforeach

        @foreach($aulas as $aula)
            @php
                $mapWidth = 2182;
                $mapHeight = 3086;
                $pos_x_percent = ($aula->pos_x / $mapWidth) * 100;
                $pos_y_percent = ($aula->pos_y / $mapHeight) * 100;
            @endphp

            <div
                class="aula-marker"
                data-planta="{{ $aula->planta }}"
                style="top: {{ $pos_y_percent }}%; left: {{ $pos_x_percent }}%;"
                title="{{ $aula->nombre }}"
            >
                <img src="{{ asset('images/marcador.png') }}" alt="Ver equipos" class="toggle-equipos" title="Ver equipos">
                <div class="equipos-list">
                    <ul>
                        @foreach($aula->equipos as $equipo)
                            <li>
                                <a href="{{ route('equipo.show', $equipo->id) }}">
                                    {{ $equipo->nombre }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="paginacion"></div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ route('admin.panel') }}" class="btn btn-secondary mb-3">
        <img src="{{ asset('images/volver.png') }}" alt="Editar" style="width: 15px; height: 15px; margin-right: 5px;">Volver
    </a>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/mapas.js') }}"></script>
@endpush