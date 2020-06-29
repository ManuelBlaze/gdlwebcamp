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
        <h1 class ="text-center">Listado de Registrados</h1>
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maneja los usuarios registrados en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha Registro</th>
                    <th>Articulos</th>
                    <th>Talleres</th>
                    <th>Regalo</th>
                    <th>Compra</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                      try {
                        $sql = "SELECT registrados.*, regalos.nombre_regalo FROM registrados ";
                        $sql .= " JOIN regalos ";
                        $sql .= " ON registrados.regalo = regalos.id_regalo";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }

                      while($registrado = $resultado->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $registrado['nombre_registrado'] ." ". $registrado['apellido_registrado'] ; ?></td>
                          <td><?php echo $registrado['email_registrado']; ?></td>
                          <td><?php echo $registrado['fecha_registro']; ?></td>
                          <td>
                            <?php  
                              
                              $articulos = json_decode($registrado['pases_articulos'], true);
                              $arr_articulos = array (
                                'un_dia' => 'Pase 1 día',
                                'pase_2dias' => 'Pase 2 días',
                                'pase_completo' => 'Pase Completo',
                                'camisas' => 'Camisa(s)',
                                'etiquetas' => 'Etiquetas',
                              );
                              foreach ($articulos as $llave => $articulo) {
                                echo $articulo." ". $arr_articulos[$llave] ."<br>";
                              }
                            ?>
                          </td>
                          <td>
                            <?php 
                            
                              $eventos_resultado = $registrado['talleres_registrados'];
                              $talleres = json_decode($eventos_resultado, true);
                              $talleres = implode("', '", $talleres['eventos']);
                              $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM evento WHERE evento_id IN ('$talleres')";
                              
                              // echo"<pre>";
                              //   var_dump($sql_talleres);
                              // echo"</pre>";
                              $result = $conn->query($sql_talleres);

                              while ($eventos = $result->fetch_assoc()) {
                                echo $eventos['nombre_evento']. " ". $eventos['fecha_evento']. " ". $eventos['hora_evento']. "<br>";
                              }

                            ?>
                          </td>
                          <td><?php echo $registrado['nombre_regalo']; ?></td>
                          <td>$ <?php echo $registrado['total_pagado']; ?></td>
                          <td>
                            <a data-id="<?php echo $registrado['id_registrado'] ?>" data-tipo="registrado" class=" btn-outline-danger btn margin borrar_registro" href="#" >
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
                    <th>Email</th>
                    <th>Fecha Registro</th>
                    <th>Articulos</th>
                    <th>Talleres</th>
                    <th>Regalo</th>
                    <th>Compra</th>
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