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
        <h1 class ="text-center">Listado de Invitados</h1>
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maneja los invitados en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Biografía</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                      try {
                        $sql = "SELECT * FROM invitados";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }

                      while($inv = $resultado->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $inv['nombre_invitado']." ". $inv['apellido_invitado'] ?></td>
                          <td><?php echo $inv['descripcion']; ?></td>
                          <td><img src="../img/invitados/<?=$inv['url_imagen']?>" alt="Invitado" width="100"> <?php echo $inv['url_imagen']; ?></td>
                          <td>
                            <a href="editar-invitado.php?id=<?php echo $inv['invitado_id'] ?>" class=" mb-2 btn-outline-warning btn margin">
                              <i class="fas fa-pen editar"></i>
                            </a>
                            <a data-id="<?php echo $inv['invitado_id'] ?>" data-tipo="invitado" class=" btn-outline-danger btn margin borrar_registro" href="#" >
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
                    <th>Biografía</th>
                    <th>Imagen</th>
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