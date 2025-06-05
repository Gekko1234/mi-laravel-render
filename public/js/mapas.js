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

        // Paginación para cada lista de equipos
        const equiposList = marker.querySelector('.equipos-list');
        if (equiposList) {
            const ul = equiposList.querySelector('ul');
            const items = ul ? ul.querySelectorAll('li') : [];
            const paginacion = document.createElement('div');
            paginacion.className = 'paginacion mt-2';
            equiposList.appendChild(paginacion);

            const itemsPerPage = 10;
            const totalPages = Math.ceil(items.length / itemsPerPage);
            let currentPage = 1;

            function showPage(page) {
                items.forEach((item, i) => {
                    item.style.display = (i >= (page - 1) * itemsPerPage && i < page * itemsPerPage) ? 'list-item' : 'none';
                });

                paginacion.innerHTML = '';
                for (let i = 1; i <= totalPages; i++) {
                    const btn = document.createElement('button');
                    btn.textContent = i;
                    btn.className = 'btn btn-sm btn-outline-primary me-1';
                    if (i === page) btn.classList.add('active');

                    btn.addEventListener('click', () => {
                        currentPage = i;
                        showPage(currentPage);
                    });

                    paginacion.appendChild(btn);
                }
            }

            if (items.length > itemsPerPage) {
                showPage(currentPage);
            }
        }
    });

    updateMapa();
});
