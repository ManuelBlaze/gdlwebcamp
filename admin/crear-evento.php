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
        <h1 class ="text-center">Crear Evento <small>Llena el formulario para crear un Evento</small></h1>
      </section>

      <div>
        <!-- Main content -->
        <section class="content col-md-8 mx-auto">

          <!-- Default box -->
          <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title">Crear Evento</h3>
            </div>
            <div class="card-body">
              <!-- form start -->
                <form class="form-horizontal" method="post" action="modelo-evento.php" name="guardar-registro" id="guardar-registro">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="nombre_evento" class="col-sm-3 col-form-label">Nombre Evento</label>
                      <div class="col-sm-9">
                        <input name="nombre_evento" type="text" class="form-control" id="nombre_evento" placeholder="Nombre del Evento">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="categoria_evento" class="col-sm-3 col-form-label">Categoría</label>
                      <div class="col-sm-9">
                        <select name="categoria_evento" class="form-control select2">
                          <option selected disabled>- Seleccione -</option>
                          <?php
                            try {
                              $sql = "SELECT * FROM categoria_evento";
                              $resultado = $conn->query($sql);
                              while ($cat = $resultado->fetch_assoc()) { ?>
                                
                                <option value="<?php echo $cat['id_categoria']?>"> 
                                  <?php echo$cat['cat_evento'] ?> 
                                </option>
                                
                            <?php } 
                      
                            } catch (Exception $e) {
                              echo "Error: " . $e->getMessage();
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Fecha</label>
                        <div class="input-group date col-sm-9" id="reservationdate" data-target-input="nearest">
                            <input type="text" name="fecha_evento" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Hora</label>
                      <div class="input-group date col-sm-9" id="timepicker" data-target-input="nearest">
                        <input name="hora_evento" type="text" class="form-control datetimepicker-input" data-target="#timepicker" />
                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group row">
                      <label for="invitado" class="col-sm-3 col-form-label">Invitado</label>
                      <div class="col-sm-9">
                        <select name="invitado" class="form-control select2">
                          <option selected disabled>- Seleccione -</option>
                          <?php
                            try {
                              $sql = "SELECT invitado_id, nombre_invitado, apellido_invitado FROM invitados";
                              $resultado = $conn->query($sql);
                              while ($invitado = $resultado->fetch_assoc()) { ?>
                                
                                <option value="<?php echo $invitado['invitado_id']?>"> 
                                  <?php echo$invitado['nombre_invitado']. " ".$invitado['apellido_invitado']?> 
                                </option>
                                
                            <?php } 
                      
                            } catch (Exception $e) {
                              echo "Error: " . $e->getMessage();
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer bg-white">
                    <input type="hidden" name="registro" value="nuevo">
                    <button type="submit" class="btn btn-success">Añadir</button>
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