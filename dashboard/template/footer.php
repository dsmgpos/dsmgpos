<footer class="main-footer">
    <strong>Copyright &copy; 2020-<?php echo date("Y");?> <a href="https://dsmg.my.id">DSMG POS</a>.</strong> All rights reserved. Created by: <a href="https://github.com/dsmgpos/dsmgpos">Salvatore Cahyo</a>
    <div class="float-right">
        <?php
        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            // SSL connection
            echo '<span><i class="fas fa-lock"></i> Session Secure! | </span>';
        }else{
            echo '<span style="color: red;"><i class="fas fa-lock-open"></i> Session Unsecure!</span><span> | </span>';
        }
        ?>
        <b>Version</b>
        <?php echo $_ENV["VERSION"]; ?>
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- Pace -->
<script src="plugins/pace-progress/pace.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!--  Parsley -->
<script src="plugins/parsleyjs/parsley.min.js"></script>

<script src="plugins/sweetalert/sweetalert.min.js"></script>
<!-- alertify -->
<script src="plugins/alertify/js/alertify.js"></script>
</body>

</html>