$(document).ready(function () {
    $('.datatable').DataTable({
        language: {
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros por página",
            zeroRecords: "No se encontraron resultados",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "No hay registros disponibles",
            infoFiltered: "(filtrado de _MAX_ registros totales)",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            },
        },
            dom: '<"row mb-3"<"col-md-6"l><"col-md-6 text-end"f>>' +
             '<"row"<"col-12"tr>>' +
             '<"row mt-3"<"col-md-6"i><"col-md-6 text-end"p>>',
    });
});
