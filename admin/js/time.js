$(function () {
  //Timepicker
  $('#timepicker').datetimepicker({
    format: 'LT'
  });
  //Date range picker
  $('#reservationdate').datetimepicker({
    format: 'L'
  });

  //Initialize Select2 Elements
  $('.select2').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
});
