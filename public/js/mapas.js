document.addEventListener('DOMContentLoaded', function () {
    const plantaSelect = document.getElementById('selectPlanta');
    const mapas = JSON.parse(document.getElementById('mapaContainer').dataset.plantas);
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
