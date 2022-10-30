<?php
session_start();
if (empty($_SESSION['login'])) {
  header('Location: login.php');
}

$id_usuario=$_SESSION['idUser'];
$id_rol=$_SESSION['id_rol'];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perfil</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">

  <link href="fontawesome-free-5.10.2-web/css/all.css" rel="stylesheet">
   <!--kartik-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
  <link href="kartik2/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
  <link href="kartik2/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">perfil</a>
      </li>
      
    </ul>
   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">INICIO</span>
    </a>

    <!-- Sidebar -->
    <?php
        require_once 'helpers/menu.php';
      ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Perfil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Perfil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

    <section class="content">
      <div class="container-fluid">
        <div class="row list_perfil_user">
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>




        <!-- <div class="row">
          <div class="col-md-12 list_preguntas_frecuente">
            
          </div>
        </div> -->

        <!-- INICIA MODAL  -->
        <div id="modal-form-perfil" class="modal fade" role="dialog">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title float title_hneg"></h4>         
              </div>

              <div class="modal-body">
                <form class="form-horizontal" id="form_perfil" >
                  
                </form>
                <div class="modal-footer" style="justify-content:center;">
                  <button type="button" class="btn btn-success" id="btn_save">
                    <span class="glyphicon glyphicon-check"></span><i class="fas fa-save"></i> Guardar
                  </button>
                  <button type="button" class="btn btn-warning" data-bs-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span><i class="fas fa-times-circle"></i> Cerrar
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- FIN MODAL  -->
        
        <!-- INICIA MODAL TIPO SHOW -->
        <div class="modal fade" id="modal-form-perfil-foto">
            <div class="modal-dialog modal-x">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Detalle de estilo ancho</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form id="form_perfil_foto">
                        
                    </form>

                    </div>
                    <div class="modal-footer ">
                    <button type="button" class="btn btn-success" id="fa-save-foto">
                    <span class="glyphicon glyphicon-check"></span><i class="fas fa-save-foto"></i> Guardar
                  </button>
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">
                      <span class="glyphicon glyphicon-remove"></span><i class="fas fa-times-circle"></i> Cerrar
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- FIN MODAL TIPO SHOW -->



      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-rc.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/inputmask/jquery.inputmask.bundle.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<!-- page script -->
<script type="text/javascript" src="plugins/moment/moment-with-locales.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>

<!--Karkit -->
<script src="kartik2/js/plugins/piexif.js" type="text/javascript"></script>
<script src="kartik2/js/plugins/sortable.js" type="text/javascript"></script>
<script src="kartik2/js/fileinput-prolife.js" type="text/javascript"></script>
<script src="kartik2/js/locales/es-prolife.js" type="text/javascript"></script>
<script src="kartik2/themes/gly/theme.js" type="text/javascript"></script>
<script src="kartik2/themes/fas/theme.js" type="text/javascript"></script>
<script src="kartik2/themes/explorer-fas/theme.js" type="text/javascript"></script>

<!-- js_preguntas frecuentes-->
<script src="js/js_perfil.js"></script>
<!-- Summernote --> 
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="plugins/codemirror/codemirror.js"></script>
<script src="plugins/codemirror/mode/css/css.js"></script>
<script src="plugins/codemirror/mode/xml/xml.js"></script>
<script src="plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>

<!-- page script -->
<script>

 list_perfilUsuario();

</script>
</body>
</html>