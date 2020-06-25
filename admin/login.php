<?php 
  session_start();
  if (isset($_GET['cerrar_sesion'])) {
    $cerrar_sesion = $_GET['cerrar_sesion'];
    if ($cerrar_sesion) {
      session_destroy();
    }
  } else {
    if (isset($_SESSION['nombre'])) {
      header('Location:admin-area.php');
    }
  } 
  include_once 'functions/funciones.php';
  include_once 'templates/header.php';

?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../index.php" class="logo"><img src="../img/glowebcamp.svg" alt="logo"></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia Sesión</p>

      <form  method="post" action="insertar-admin.php" name="login-admin-form" id="login-admin">
        <div class="input-group mb-3">
          <input name="usuario" type="text" class="form-control" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-secret"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="pass" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <input type="hidden" name="login-admin" value="1">
            <button type="submit" class="btn btn-dark btn-block">Iniciar Sesión</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

    <?php 
      include_once 'templates/footer.php'; 
    ?>