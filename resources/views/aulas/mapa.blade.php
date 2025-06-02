@extends('layouts.app')

@section('head')
  <link rel="stylesheet" href="{{ asset('css/mapas.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>Mapa de Aulas</h1>

    <label for="selectPlanta">Selecciona planta:</label>
    <select id="selectPlanta" class="form-control planta-selector" style="max-width: 200px;">
        @foreach($plantas as $planta)
            <option value="{{ $planta }}">Planta {{ $planta }}</option>
        @endforeach
    </select>

    <div id="mapaContainer" class="mapa-container">
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
            <img src="{{ asset('images/ojo.png') }}" alt="Ver equipos" class="toggle-equipos" title="Ver equipos">
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
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const plantaSelect = document.getElementById('selectPlanta');
    const mapas = @json($plantas);
    const aulaMarkers = document.querySelectorAll('.aula-marker');

    function updateMapa() {
        const planta = parseInt(plantaSelect.value);

        mapas.forEach(p => {
            const img = document.getElementById(`mapaPlanta${p}`);
            if (img) {
                img.classList.toggle('visible', p === planta);
            }
        });

        aulaMarkers.forEach(marker => {
            const visible = parseInt(marker.dataset.planta) === planta;
            marker.style.display = visible ? 'flex' : 'none';

            const equipos = marker.querySelector('.equipos-list');
            if (equipos) equipos.style.display = 'none';
        });
    }

    plantaSelect.addEventListener('change', updateMapa);

    aulaMarkers.forEach(marker => {
        const toggleBtn = marker.querySelector('.toggle-equipos');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const equipos = marker.querySelector('.equipos-list');
                if (equipos) {
                    equipos.style.display = (equipos.style.display === 'block') ? 'none' : 'block';
                }
            });
        }
    });

    updateMapa();
});
</script>
@endsection
