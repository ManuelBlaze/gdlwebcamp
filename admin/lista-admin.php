<?php 
  
  include_once 'functions/sesiones.php';
  include_once 'functions/funciones.php';
  include_once 'templates/header.php';
  include_once 'templates/navbar.php'; 
  include_once 'templates/aside.php'; 

?>
    <!-- Main Sidebar Container -->
    

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 class ="text-center">Administradores</h1>
      </section>

      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php 
      include_once 'templates/footer.php'; 
    ?>