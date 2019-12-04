<script src="<?php echo e(asset('js/app.js')); ?>"></script>  
  
<!-- jQuery 2.2.3 -->
<script src="<?php echo e(asset('modules/master/plugins/jQuery/jquery-2.2.3.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->

<script src="<?php echo e(asset('modules/master/plugins/jQueryUI/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>

<script src="<?php echo e(asset('modules/master/js/toastr.min.js')); ?>"></script>

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo e(asset('modules/master/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo e(asset('modules/master/js/raphael.min.js')); ?>"></script>
<script src="<?php echo e(asset('modules/master/plugins/morris/morris.min.js')); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(asset('modules/master/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo e(asset('modules/master/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
<script src="<?php echo e(asset('modules/master/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<!-- Timepicker -->
<script src="<?php echo e(asset('modules/master/plugins/timepicker/bootstrap-timepicker.min.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset('modules/master/plugins/knob/jquery.knob.js')); ?>"></script>
<!-- daterangepicker -->

<script src="<?php echo e(asset('modules/master/js/moment.js')); ?>"></script>

<script src="<?php echo e(asset('modules/master/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<!-- datepicker -->
<script src="<?php echo e(asset('modules/master/plugins/datepicker/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('modules/master/plugins/datepicker/bootstrap-datepicker.ar.js')); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo e(asset('modules/master/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo e(asset('modules/master/plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('modules/master/plugins/fastclick/fastclick.js')); ?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo e(asset('modules/master/plugins/chartjs/Chart.min.js')); ?>"></script>

<script src="<?php echo e(asset('modules/master/plugins/echart/echarts.min.js')); ?>"></script>
<script src="<?php echo e(asset('modules/master/plugins/echart/world.js')); ?>"></script>


<script src="<?php echo e(asset('modules/master/plugins/jquery.nicescroll.min.js')); ?>"></script>
<!-- Select2 -->
<script src="<?php echo e(asset('modules/master/plugins/select2/select2.full.min.js')); ?>"></script>
<!-- InputMask -->
<script src="<?php echo e(asset('modules/master/plugins/input-mask/jquery.inputmask.js')); ?>"></script>
<script src="<?php echo e(asset('modules/master/plugins/input-mask/jquery.inputmask.date.extensions.js')); ?>"></script>
<script src="<?php echo e(asset('modules/master/plugins/input-mask/jquery.inputmask.extensions.js')); ?>"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo e(asset('modules/master/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo e(asset('modules/master/plugins/colorpicker/bootstrap-colorpicker.min.js')); ?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo e(asset('modules/master/plugins/timepicker/bootstrap-timepicker.min.js')); ?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo e(asset('modules/master/plugins/iCheck/icheck.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('modules/master/js/app.min.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('modules/master/js/demo.js')); ?>"></script>
<script src="<?php echo e(asset('modules/master/js/backend.js')); ?>"></script>


<script src="<?php echo e(asset('modules/master/js/sweetalert.min.js')); ?>"></script>

<?php echo Html::script(asset('modules/master/plugins/datatables/jquery.dataTables.min.js')); ?>

<?php echo Html::script(asset('modules/master/plugins/datatables/dataTables.bootstrap.min.js')); ?>


<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
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





<?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/resources/views/adminCpanel/partials/scripts.blade.php ENDPATH**/ ?>