
document.addEventListener('DOMContentLoaded', function () {
    const plantaSelect = document.getElementById('planta');
    const mapa = document.getElementById('mapaClick');
    const mapaImagenes = mapa.querySelectorAll('.mapa-planta');
    const inputX = document.getElementById('pos_x');
    const inputY = document.getElementById('pos_y');

    // Mostrar solo la imagen correspondiente a la planta seleccionada
    plantaSelect.addEventListener('change', function () {
        const planta = this.value;

        mapaImagenes.forEach(img => {
            img.classList.toggle('visible', img.dataset.planta === planta);
        });

        // Limpia coordenadas
        inputX.value = '';
        inputY.value = '';
    });

    // Capturar clic en mapa y calcular coordenadas relativas
    mapa.addEventListener('click', function (e) {
        const visibleImg = mapa.querySelector('.mapa-planta.visible');
        const rect = visibleImg.getBoundingClientRect();
        const clickX = e.clientX - rect.left;
        const clickY = e.clientY - rect.top;

        const renderWidth = visibleImg.clientWidth;
        const renderHeight = visibleImg.clientHeight;

        const mapWidth = 2182;
        const mapHeight = 3086;

        const porcentajeX = clickX / renderWidth;
        const porcentajeY = clickY / renderHeight;

        inputX.value = Math.round(porcentajeX * mapWidth);
        inputY.value = Math.round(porcentajeY * mapHeight);
    });

    // Disparar evento al cargar por si tiene valor viejo
    plantaSelect.dispatchEvent(new Event('change'));
});

