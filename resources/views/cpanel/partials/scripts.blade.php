<script src="{{ asset('js/app.js') }}"></script>  
  
<!-- jQuery 2.2.3 -->
<script src="{{ asset('modules/master/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
{{-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> --}}
<script src="{{ asset('modules/master/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>

<script src="{{ asset('modules/master/js/toastr.min.js') }}"></script>

<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('modules/master/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('modules/master/js/raphael.min.js') }}"></script>
<script src="{{ asset('modules/master/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('modules/master/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('modules/master/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('modules/master/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- Timepicker -->
<script src="{{ asset('modules/master/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('modules/master/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
{{-- <script src="{{ asset('modules/master/js/script.js') }}"></script> --}}
<script src="{{ asset('modules/master/js/moment.js') }}"></script>
<script src="{{ asset('modules/master/js/datatables-ar.js') }}"></script>
<script src="{{ asset('modules/master/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('modules/master/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('modules/master/plugins/datepicker/bootstrap-datepicker.ar.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('modules/master/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('modules/master/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('modules/master/plugins/fastclick/fastclick.js') }}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('modules/master/plugins/chartjs/Chart.min.js') }}"></script>

<script src="{{ asset('modules/master/plugins/echart/echarts.min.js') }}"></script>
<script src="{{ asset('modules/master/plugins/echart/world.js') }}"></script>


<script src="{{ asset('modules/master/plugins/jquery.nicescroll.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('modules/master/plugins/select2/select2.full.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('modules/master/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('modules/master/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('modules/master/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('modules/master/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- DataTable -->
{{-- <script src="{{ asset('modules/master/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('modules/master/plugins/datatables/dataTables.bootstrap.min.js') }}"></script> --}}
<!-- bootstrap color picker -->
<script src="{{ asset('modules/master/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('modules/master/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('modules/master/plugins/iCheck/icheck.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('modules/master/js/app.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('modules/master/js/pages/dashboard2.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('modules/master/js/demo.js') }}"></script>
<script src="{{ asset('modules/master/js/backend.js') }}"></script>


<script src="{{ asset('modules/master/js/sweetalert.min.js') }}"></script>

{!! Html::script(asset('modules/master/plugins/datatables/jquery.dataTables.min.js')) !!}
{!! Html::script(asset('modules/master/plugins/datatables/dataTables.bootstrap.min.js')) !!}
<script>

 
    $('#table_id').DataTable({
        // processing: true,
        // serverSide: true,
        // "columnDefs":[
        //   {
        //     "targets":[1, 3, 7],
        //     "orderable":false,
        //   },
        // ],
        "columnDefs": [{
            "defaultContent": "-",
            "targets": "_all"
        }],
        "stateSave": false,
        "responsive": true,
        "order": [
            [0, 'desc']
        ],
        "pagingType": "full_numbers",
        aLengthMenu: [
            [10, 25, 50, 100, 200, -1],
            [10, 25, 50, 100, 200, "All"]
        ],
        iDisplayLength: 25,
        fixedHeader: true,
    });

    $(function () {
      $('#start_data').datepicker({
      autoclose: true
    });
    $(".select2").select2();
      // $("#example1").DataTable();
      // $('#example2').DataTable({
      //   "paging": true,
      //   "lengthChange": false,
      //   "searching": false,
      //   "ordering": true,
      //   "info": true,
      //   "autoWidth": false
      // });
    });
  </script>

<!-- Page script -->
{{-- <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#identifcation_expire').datepicker({
      autoclose: true
    });
    $('#birthday').datepicker({
      autoclose: true
    });
    $('#start_data').datepicker({
      autoclose: true
    });
    
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
  
</script>
<!-- page script -->
<script type="text/javascript">
  // To make Pace works on Ajax calls
  $(document).ajaxStart(function () {
    Pace.restart()
  })
  $('.ajax').click(function () {
    $.ajax({
      url: '#', success: function (result) {
        $('.ajax-content').html('<hr>Ajax Request Completed !')
      }
    })
  })
</script> --}}




{{-- 
  <script>
    $('#table_id').DataTable({
        //processing: true,
        //serverSide: true,
        // "columnDefs":[
        //     {
        //         "targets":[1, 3, 7],
        //         "orderable":false,
        //     },
        // ],
        "stateSave": false,
        "responsive": true,
        "order": [
            [0, 'desc']
        ],
        "pagingType": "full_numbers",
        aLengthMenu: [
            [10, 25, 50, 100, 200, -1],
            [10, 25, 50, 100, 200, "All"]
        ],
        iDisplayLength: 25,
        fixedHeader: true,

    });
</script> --}}