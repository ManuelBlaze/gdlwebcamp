<?php 
  
  include_once 'functions/sesiones.php';
  include_once 'functions/funciones.php';
  include_once 'templates/header.php';
  include_once 'templates/navbar.php'; 
  include_once 'templates/aside.php'; 

?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 class ="text-center">Listado de Categorías</h1>
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edita o borra las categorías</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Icono</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                      try {
                        $sql = "SELECT * FROM categoria_evento ";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }

                      while($categoria = $resultado->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $categoria['cat_evento']; ?></td>
                          <td><i class="fas <?php echo $categoria['icono']; ?>"></i></td>
                          <td>
                            <a href="editar-categoria.php?id=<?php echo $categoria['id_categoria'] ?>" class="mr-2 btn-outline-warning btn margin">
                              <i class="fas fa-pen editar"></i>
                            </a>
                            <a data-id="<?php echo $categoria['id_categoria'] ?>" data-tipo="categoria" class="ml-2 btn-outline-danger btn margin borrar_registro" href="#" >
                              <i class="fas fa-trash borrar"></i>
                            </a>
                          </td>
                        </tr>
                      <?php }
                    ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Icono</th>
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