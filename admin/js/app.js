$(function () {
  $("#registros").DataTable({
    "responsive": true,
    "autoWidth": false,
    "pageLength": 10,
    "searching": true,
    "ordering": true,
    "lengthChange": true,
    "language": {
      paginate: {
        next: 'Siguiente',
        previous: 'Anterior'
      },
      info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
      emptyTable: 'No hay registros',
      infoEmpty: '0 Registros',
      search: 'Buscar'
    }
  });
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});
