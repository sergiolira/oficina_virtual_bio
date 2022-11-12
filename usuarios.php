<?php
session_start();
if (empty($_SESSION['login'])) {
  header('Location: login.php');
}
include_once("model_class/permiso.php");
include_once("model_class/sub_modulo.php");
$obj_s_m= new sub_modulo();
$obj_p= new permiso();
$obj_p->id_rol=$_SESSION['id_rol'];
/**Hallamos el id_modulo atravez del enlace */
$obj_s_m->enlace=basename($_SERVER['PHP_SELF']);
$id_modulo=$obj_s_m->consultar_id_modulo_x_enlace();
$id_sub_modulo=$obj_s_m->consultar_id_sub_modulo_x_enlace();
$id_sub_x_nivel=$obj_s_m->consultar_sub_x_nivel_x_enlace();

if($id_modulo==0){
    header('Location: index.php');
} else {
  $obj_p->id_modulo= $id_modulo;
  $obj_p->consult_crud_x_rol_modulo();
}

/**Sessiones para la clase activate */
$_SESSION["p_id_modulo"]=$id_modulo;
$_SESSION["p_id_sub_modulo"]=$id_sub_modulo;
$_SESSION["p_id_sub_x_nivel"]=$id_sub_x_nivel;

$_SESSION['ver'] = $obj_p->ver;
$_SESSION['crear'] = $obj_p->crear;
$_SESSION['actualizar'] = $obj_p->actualizar;
$_SESSION['eliminar'] = $obj_p->eliminar;

if ($_SESSION['ver']=="1" || $_SESSION['idUser']==1) {
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Usuarios</title>
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
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Usuarios</a>
      </li>
      
    </ul>
   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php
  require_once 'helpers/menu.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <?php if ($_SESSION['crear']==1 || $_SESSION['idUser']==1) { ?>
                    <button class="btn btn-info new-modal-usuario" data-id="0">Nuevo usuario</button>
                    <button type="button" class="btn btn-success exportar-excel-usuario" title="Exportar Excel" id="exportable">
                    Exportar Datos <i class="fas fa-file-excel"></i></button>
                <?php }?>
                </div>
                <div class="card-body table-usuarios">
                <!-- /.cargar lista -->
                </div>
                <!-- /.card-body -->
            </div>
            </div>
        </div>
        
        <!-- INICIA MODAL TIPO usuario -->
        <div class="modal fade" id="modal-form-usuario">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form class="form_usuario" id="form_usuario" role="form" enctype="multipart/form-data">
                        
                    </form>

                    </div>
                    <div class="modal-footer " style="justify-content: center;">
                    <button type="button" class="btn btn-success"  id="btn_save">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- FIN MODAL TIPO usuario -->
        <!-- INICIA MODAL TIPO SHOW -->
        <div class="modal fade" id="modal-form-show-usuario">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Detalle tipo de usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form class="form_show_usuario" id="form_show_usuario">
                        
                    </form>

                    </div>
                    <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
<!-- js_archivo -->
<script src="js/js_usuarios.js"></script>
<!-- page script -->
<script>
  list_usuarios();
  
</script>
</body>
</html>
<?php } else {
  header('Location: index.php');

  
} ?>
