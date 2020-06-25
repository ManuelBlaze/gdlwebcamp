    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.5
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
      reserved.
    </footer>
    
  </div>
  <!-- ./wrapper -->

    <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="js/sweetalert2.all.min.js"></script>
  <?php 
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);

    //Usar estilos dependiendo de la pagina
    if ($pagina == 'lista-admin') {
      echo '<script src="plugins/datatables/jquery.dataTables.min.js"></script>';
      echo '<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>';
      echo '<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>';
      echo '<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>';
      echo '<script src="js/app.js"></script>';
    }
  ?>   
  <script src="js/admin-ajax.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</body>

</html>