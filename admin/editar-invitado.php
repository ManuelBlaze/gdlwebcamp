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
        <h1 class ="text-center">Editar Invitado <small>Llena el formulario para editar un Invitado</small></h1>
      </section>

      <div>
        <!-- Main content -->
        <section class="content col-md-8 mx-auto">

          <!-- Default box -->
          <div class="card">
            <div class="card-header bg-cyan">
              <h3 class="card-title">Editar Invitado</h3>
            </div>
            <div class="card-body">

              <?php
                $sql = ("SELECT * FROM `invitados` WHERE invitado_id = $id");
                $resultado = $conn->query($sql);
                $invitado = $resultado->fetch_assoc();

              ?>
              <!-- form start -->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="modelo-invitado.php" name="guardar-registro" id="guardar-registro-archivo">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="nombre_inv" class="col-sm-2 col-form-label">Nombre</label>
                      <div class="col-sm-10">
                        <input value="<?=$invitado['nombre_invitado']?>" name="nombre_inv" type="text" class="form-control" id="nombre_inv" placeholder="Nombre del invitado">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="apellido_inv" class="col-sm-2 col-form-label">Apellido</label>
                      <div class="col-sm-10">
                        <input value="<?=$invitado['apellido_invitado']?>" name="apellido_inv" type="text" class="form-control" id="apellido_inv" placeholder="Apellido del invitado">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="bio_inv" class="col-sm-2 col-form-label">Descripción (biografía)</label>
                      <div class="col-sm-10">
                        <textarea rows= 8 name="bio_inv" class="form-control" id="bio_inv" placeholder="Descripción del invitado"> <?=$invitado["descripcion"]?> </textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label" for="imagen_actual">Imagen Actual</label>
                      <br>
                      <img class="col-sm-5" src="../img/invitados/<?=$invitado['url_imagen']?>" alt="Invitado">
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
                    <input type="hidden" name="registro" value="actualizar">
                    <input type="hidden" name="id_registro" value="<?=$id?>">
                    <button type="submit" class="btn btn-info">Editar</button>
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