<?php
session_start();
if (isset($_SESSION['login'])) {
    session_destroy();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bio Tree Life | Recuperar cuenta</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition login-page" style="background-image:url('imas/oficina/fondo_1.jpg');">
<div class="login-box">
<div class="login-logo">
    <a href="biotreelife.com" target="black"><img src="imas/logo/logo360x200.png" class="img-fluid" width="80%"/></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><strong>Recupera tu cuenta</strong></p>
      <p class="login-box-msg">Ingresa tu correo electrónico asociado para buscar tu cuenta.</p>
        <div class="input-group mb-3">
          <input type="email" id="user" name="user" class="form-control" placeholder="Correo electronico">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-4">
            <button  class="btn btn-secondary btn-block btn-flat" id="cancel-recover-account-rep">Volver</button> 
          </div>
          <!-- /.col -->

          <div class="col-8">
            <button  class="btn btn-primary btn-block btn-flat" id="recover-account">Buscar y Restablecer</button>
          </div>
          <!-- /.col -->
        </div>

        <div class="modal fade " id="modal-mensaje-check">
          <div class="modal-dialog">
            <div class="modal-content bg-success" >
              <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-check-circle"></i> Restableciendo contraseña</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Genial, se envió un mensaje a su correo electrónico (Recibidos o Spam), para el ingreso a su cuenta.</p>
              </div>
              <div class="modal-footer " style="justify-content:center;">
                <button type="button" class="btn btn-outline-light" id="cancel-recover-account-rep">Aceptar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


    </div>
    <!-- /.login-card-body -->


  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- js_session -->
<script src="js/js_login_asesor.js"></script>
</body>
</html>
