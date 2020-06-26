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
        <h1 class ="text-center">Listado de Eventos</h1>
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edita o borra los eventos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Categoriía</th>
                    <th>Invitado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                      try {
                        $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_invitado, apellido_invitado ";
                        $sql .= " FROM evento ";
                        $sql .= " INNER JOIN categoria_evento ";
                        $sql .= " ON evento.id_cat_evento = categoria_evento.id_categoria ";
                        $sql .= " INNER JOIN invitados ";
                        $sql .= " ON evento.id_inv = invitados.invitado_id ";
                        $sql .= " ORDER BY evento_id ";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }

                      while($evento = $resultado->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $evento['nombre_evento']; ?></td>
                          <td><?php echo $evento['fecha_evento']; ?></td>
                          <td><?php echo $evento['hora_evento']; ?></td>
                          <td><?php echo $evento['cat_evento']; ?></td>
                          <td><?php echo $evento['nombre_invitado']." ".$evento['apellido_invitado']; ?></td>
                          <td>
                            <a href="editar-evento.php?id=<?php echo $evento['evento_id'] ?>" class="mr-2 btn-outline-warning btn margin">
                              <i class="fas fa-pen editar"></i>
                            </a>
                            <a data-id="<?php echo $evento['evento_id'] ?>" data-tipo="evento" class="ml-2 btn-outline-danger btn margin borrar_registro" href="#" >
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
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Categoriía</th>
                    <th>Invitado</th>
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