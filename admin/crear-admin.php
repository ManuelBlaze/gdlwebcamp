<?php 
  
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
        <h1 class ="text-center">Crear Administrador <small>Llena el formulario para crear un Administrador</small></h1>
      </section>

      <div class="row">
        <!-- Main content -->
        <section class="content col-md-8 mx-auto">

          <!-- Default box -->
          <div class="card">
            <div class="card-header bg-cyan">
              <h3 class="card-title">Crear Admin</h3>
            </div>
            <div class="card-body">
              <!-- form start -->
                <form class="form-horizontal" method="post" action="insertar-admin.php" name="crear-admin" id="crear-admin">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
                      <div class="col-sm-10">
                        <input name="usuario" type="text" class="form-control" id="usuario" placeholder="Tu nombre de Usuario">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                      <div class="col-sm-10">
                        <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Tu Nombre">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input name="pass" type="password" class="form-control" id="inputPassword" placeholder="Password">
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer bg-white">
                    <input type="hidden" name="agregar-admin" value="1">
                    <button type="submit" class="btn btn-info">Añadir</button>
                  </div>
                  <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </section>
        <!-- /.content -->
      </div>
    </div>
    <!-- /.content-wrapper -->

    <?php 
      include_once 'templates/footer.php'; 
    ?>