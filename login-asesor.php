<?php
session_start();
if (isset($_SESSION['login'])) {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bio | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
            <p class="login-box-msg">Iniciar sesión</p>

            <form id="form_login">
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" id="user" name="user" placeholder="Codigo de asesor">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    
                    <div class="col-12 text-center">
                        <button type="button" id="btn_login_asesor" class="btn btn-success btn-block">Ingresar</button>
                    </div>
                    <!-- /.col -->
                    </div>
            </form>
            <!-- /.col -->
            <p class="mb-1">
                <!--<a href="forgot-password.html">Olvide mi contraseña</a>-->
            </p>
        </div>
        <!-- /.login-card-body -->


        <!-- /.login-card-body -->
        <div class="modal fade " id="modal-mensaje">
            <div class="modal-dialog">
                <div class="modal-content bg-danger" >
                    <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Mensaje</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>usuario o contraseña incorrectos&hellip;</p>
                    </div>
                    <div class="modal-footer " style="justify-content:center;">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                 <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script src="js/js_login_asesor.js"></script> 
</body>
</html>
