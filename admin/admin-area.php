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
        <h1 class ="text-center">Dashboard <small>Información sobre el evento</small></h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <h2 class="page-header">Resumen de Registros</h2>
        <div class="row justify-content-md-center">
          <div class="col-lg-3 col-6">
            <?php
            
              $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados";
              $resultado = $conn->query($sql);
              $registrados = $resultado->fetch_assoc();
            
            ?>
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?=$registrados['registros']?></h3>

                  <p>Total Registrados</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-plus"></i>
                </div>
                <a href="lista-registrado.php" class="small-box-footer">
                  Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->

          <div class="col-lg-3 col-6">
            <?php
            
              $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados";
              $resultado = $conn->query($sql);
              $registrados = $resultado->fetch_assoc();
            
            ?>
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>$ <?=$registrados['ganancias']?></h3>

                  <p>Ganancias Totales</p>
                </div>
                <div class="icon">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <a href="lista-registrado.php" class="small-box-footer">
                  Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
        </div>

        <h2 class="page-header">Regalos</h2>
        <div class="row">
          <div class="col-lg-3 col-6">
            <?php
            
              $sql = "SELECT COUNT(regalo) AS pulseras FROM registrados WHERE regalo = 1";
              $resultado = $conn->query($sql);
              $regalo = $resultado->fetch_assoc();
            
            ?>
              <!-- small card -->
              <div class="small-box bg-teal">
                <div class="inner">
                  <h3><?=$regalo['pulseras']?></h3>

                  <p>Pulsera(s)</p>
                </div>
                <div class="icon">
                  <i class="fas fa-gift"></i>
                </div>
                <a href="lista-registrado.php" class="small-box-footer">
                  Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
          <div class="col-lg-3 col-6">
            <?php
            
              $sql = "SELECT COUNT(regalo) AS etiquetas FROM registrados WHERE regalo = 2";
              $resultado = $conn->query($sql);
              $regalo = $resultado->fetch_assoc();
            
            ?>
              <!-- small card -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3><?=$regalo['etiquetas']?></h3>

                  <p>Etiquetas</p>
                </div>
                <div class="icon">
                  <i class="fas fa-gift"></i>
                </div>
                <a href="lista-registrado.php" class="small-box-footer">
                  Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
          <div class="col-lg-3 col-6">
            <?php
            
              $sql = "SELECT COUNT(regalo) AS plumas FROM registrados WHERE regalo = 3";
              $resultado = $conn->query($sql);
              $regalo = $resultado->fetch_assoc();
            
            ?>
              <!-- small card -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3><?=$regalo['plumas']?></h3>

                  <p>Pluma(s)</p>
                </div>
                <div class="icon">
                  <i class="fas fa-gift"></i>
                </div>
                <a href="lista-registrado.php" class="small-box-footer">
                  Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
        </div>



      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php 
      include_once 'templates/footer.php'; 
    ?>