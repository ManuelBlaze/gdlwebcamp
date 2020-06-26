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
        <h1 class ="text-center">Añadir Invitado <small>Llena el formulario para añadir un Invitado</small></h1>
      </section>

      <div>
        <!-- Main content -->
        <section class="content col-md-8 mx-auto">

          <!-- Default box -->
          <div class="card">
            <div class="card-header bg-cyan">
              <h3 class="card-title">Añadir Invitado</h3>
            </div>
            <div class="card-body">
              <!-- form start -->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="modelo-invitado.php" name="guardar-registro" id="guardar-registro-archivo">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="nombre_inv" class="col-sm-2 col-form-label">Nombre</label>
                      <div class="col-sm-10">
                        <input name="nombre_inv" type="text" class="form-control" id="nombre_inv" placeholder="Nombre del invitado">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="apellido_inv" class="col-sm-2 col-form-label">Apellido</label>
                      <div class="col-sm-10">
                        <input name="apellido_inv" type="text" class="form-control" id="apellido_inv" placeholder="Apellido del invitado">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="bio_inv" class="col-sm-2 col-form-label">Descripción (biografía)</label>
                      <div class="col-sm-10">
                        <textarea rows= 8 name="bio_inv" class="form-control" id="bio_inv" placeholder="Descripción del invitado"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="img_inv" class="col-sm-2 col-form-label">Imagen</label>
                      <div class="input-group col-sm-10">
                        <div class="custom-file">
                          <input name ="archivo_imagen" type="file" class="custom-file-input" id="img_inv">
                          <label class="custom-file-label" for="img_inv">Elegir Archivo</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer bg-white">
                    <input type="hidden" name="registro" value="nuevo">
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