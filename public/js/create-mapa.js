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
        const clickX = e.clientX - rect.left;
        const clickY = e.clientY - rect.top;

        const renderWidth = mapa.clientWidth;
        const renderHeight = mapa.clientHeight;

        // Tamaño real del plano
        const mapWidth = 2182;
        const mapHeight = 3086;

        const porcentajeX = clickX / renderWidth;
        const porcentajeY = clickY / renderHeight;

        // Guardamos coordenadas relativas al mapa original
        inputX.value = Math.round(porcentajeX * mapWidth);
        inputY.value = Math.round(porcentajeY * mapHeight);

            });
});