$(document).ready(function() {
    var tabla = $('#tablaPrestamos').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            },
            lengthMenu: 'Mostrar <select>'+
                '<option value="10">10</option>'+
                '<option value="25">25</option>'+
                '<option value="50">50</option>'+
                '<option value="100">100</option>'+
                '</select> registros',
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            infoFiltered: "(filtrado de _MAX_ registros totales)",
            search: "Buscar:",
            zeroRecords: "No se encontraron registros",
            loadingRecords: "Cargando...",
            processing: "Procesando..."
        }
    });

    // Filtro personalizado para filtrar por fecha
    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
        var diasFiltro = parseInt($('#filtroTiempo').val());
        var fechaTexto = data[1]; // índice 1 = "Fecha de Préstamo" en formato d/m/Y

        if (diasFiltro === 0) {
            return true; // Mostrar todos
        }

        var hoy = new Date();
        var fechaLimite = new Date();
        fechaLimite.setDate(hoy.getDate() - diasFiltro);

        // Parsear fecha d/m/Y
        var partes = fechaTexto.split('/');
        var fechaRegistro = new Date(partes[2], partes[1] - 1, partes[0]);

        return fechaRegistro >= fechaLimite;
    });

    // Dibujar tabla inicialmente con filtro activo
    tabla.draw();

    // Reaplicar filtro al cambiar el select
    $('#filtroTiempo').on('change', function() {
        tabla.draw();
    });
});
