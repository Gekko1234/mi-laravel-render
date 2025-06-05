$(document).ready(function() {
    var tabla = $('#tablaAverias').DataTable({
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

    function filtroFechas(settings, data, dataIndex) {
        var diasFiltro = parseInt($('#filtroTiempo').val());
        var fechaRegistro = data[0]; // columna fecha en formato 'YYYY-MM-DD'

        if (diasFiltro === 0) {
            return true; // mostrar todos
        }

        var fechaHoy = new Date();
        var fechaLimite = new Date();
        fechaLimite.setDate(fechaHoy.getDate() - diasFiltro);

        var fechaData = new Date(fechaRegistro);

        return fechaData >= fechaLimite;
    }

    $.fn.dataTable.ext.search.push(filtroFechas);

    // Ejecutar filtro inicial
    tabla.draw();

    // Refrescar filtro al cambiar selección
    $('#filtroTiempo').on('change', function() {
        tabla.draw();
    });
});