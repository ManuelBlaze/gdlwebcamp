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
        <h1 class ="text-center">Editar Categoría <small>Llena el formulario para editar un Categoría</small></h1>
      </section>

      <div>
        <!-- Main content -->
        <section class="content col-md-8 mx-auto">

          <!-- Default box -->
          <div class="card">
            <div class="card-header bg-cyan">
              <h3 class="card-title">Editar Categoría</h3>
            </div>
            <div class="card-body">

              <?php
                $sql = ("SELECT * FROM categoria_evento WHERE id_categoria = $id");
                $resultado = $conn->query($sql);
                $categ = $resultado->fetch_assoc();

              ?>
              <!-- form start -->
                <form class="form-horizontal" method="post" action="modelo-categoria.php" name="guardar-registro" id="guardar-registro">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="nombre_categoria" class="col-sm-3 col-form-label">Nombre Categoría</label>
                      <div class="col-sm-9">
                        <input value="<?=$categ["cat_evento"]?>" name="nombre_categoria" type="text" class="form-control" id="nombre_categoria" placeholder="Nombre de la categoría">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="icono_categoria" class="col-sm-3 col-form-label">Icono Categoría</label>
                      <div class="col-sm-9">
                        <input value="<?=$categ["icono"]?>" name="icono_categoria" type="text" class="form-control" id="icono_categoria" placeholder="fa-ejemplo-icono">
                      </div>
                    </div>
                    <a href="https://fontawesome.com/icons?d=gallery" target="_blank">Font Awesome</a>                   
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer bg-white">
                    <input type="hidden" name="registro" value="actualizar">
                    <input type="hidden" name="id_registro" value="<?=$id?>">
                    <button type="submit" class="btn btn-primary">Editar</button>
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