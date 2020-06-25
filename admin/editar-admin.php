<?php 
  
  include_once 'functions/sesiones.php';
  include_once 'functions/funciones.php';
  
  $id = $_GET['id'];
  if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die('Error!');
  }

  include_once 'templates/header.php';
  include_once 'templates/navbar.php'; 
  include_once 'templates/aside.php'; 

?>
    <!-- Main Sidebar Container -->
    

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 class ="text-center">Editar Administrador <small>Llena el formulario para editar un Administrador</small></h1>
      </section>

      <div>
        <!-- Main content -->
        <section class="content col-md-8 mx-auto">

          <!-- Default box -->
          <div class="card">
            <div class="card-header bg-cyan">
              <h3 class="card-title">Editar Admin</h3>
            </div>
            <div class="card-body">

              <?php
                $sql = ("SELECT * FROM `admins` WHERE id_admin = $id");
                $resultado = $conn->query($sql);
                $admin = $resultado->fetch_assoc();

              ?>
              <!-- form start -->
                <form class="form-horizontal" method="post" action="modelo-admin.php" name="guardar-registro" id="guardar-registro">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
                      <div class="col-sm-10">
                        <input name="usuario" value="<?=$admin["usuario"] ?>" type="text" class="form-control" id="usuario" placeholder="Tu nombre de Usuario">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                      <div class="col-sm-10">
                        <input name="nombre" value="<?=$admin["nombre"] ?>" type="text" class="form-control" id="nombre" placeholder="Tu Nombre">
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
                    <input type="hidden" name="registro" value="actualizar">
                    <input type="hidden" name="id_registro" value="<?=$id?>">
                    <button type="submit" class="btn btn-info">Actualizar</button>
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