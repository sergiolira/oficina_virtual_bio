<?php
session_start();
if(!isset($_SESSION['correo']) || empty($_SESSION['login'])){
  if($_SERVER['HTTP_HOST']=='localhost'){
    header('Location: https://localhost/login-admin.php');
  }
  elseif($_SERVER['HTTP_HOST']=='admin.prolife.pe'){
    header('Location: https://admin.prolife.pe/login-admin');
  }
  elseif($_SERVER['HTTP_HOST']=='intranet.prolife.pe'){
    header('Location: https://intranet.prolife.pe/login-lider');
  }
  exit();
}
include_once("model_class/permiso.php");
include_once("model_class/sub_modulo.php");
$obj_s_m= new sub_modulo();
$obj_p= new permiso();
$obj_p->id_rol=$_SESSION['id_rol'];

/**Hallamos el id_modulo atravez del enlace */
$obj_s_m->enlace=basename($_SERVER['PHP_SELF']);
$obj_s_m->id_rol=$_SESSION['id_rol'];
$id_modulo=$obj_s_m->consultar_id_modulo_x_enlace();
if($id_modulo==0){
    header('Location: index.php');
} else {
  $obj_p->id_modulo= $id_modulo;
  $obj_p->consult_crud_x_rol_modulo();
}
$id_sub_modulo=$obj_s_m->consultar_id_sub_modulo_x_enlace();
$id_sub_x_nivel=$obj_s_m->consultar_sub_x_nivel_x_enlace();
/**Sessiones para la clase activate */
$_SESSION["p_id_modulo"]=$id_modulo;
$_SESSION["p_id_sub_modulo"]=$id_sub_modulo;
$_SESSION["p_id_sub_x_nivel"]=$id_sub_x_nivel;

$_SESSION['ver'] = $obj_p->ver;
$_SESSION['crear'] = $obj_p->crear;
$_SESSION['actualizar'] = $obj_p->actualizar;
$_SESSION['eliminar'] = $obj_p->eliminar;
if ($_SESSION['ver']=="1") {
?>
<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/Plantilla090919.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ProLife | Backups de Redes</title>
<!-- InstanceEndEditable -->

<!-- InstanceBeginEditable name="head" -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
   <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!--ionicons-->
  <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>

  <link href="fontawesome-free-5.10.2-web/css/all.css" rel="stylesheet">

  <script defer src="fontawesome-free-5.10.2-web/js/all.js"></script>
  <!-- InstanceEndEditable -->
  <style type="text/css">

  @media only screen and (max-width: 800px) {

    /* Force table to not be like tables anymore */
  #no-more-tables table,
  #no-more-tables thead,
  #no-more-tables tbody,
  #no-more-tables th,
  #no-more-tables td,
  #no-more-tables tr {
    display: block;
  }

  /* Hide table headers (but not display: none;, for accessibility) */
  #no-more-tables thead tr {
    position: absolute;

  }

  #no-more-tables tr { border: 1px solid #ccc; }

  #no-more-tables td {
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 50%;
    white-space: normal;
    text-align:left;
  }

  #no-more-tables td:before {
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%;
    padding-right: 10px;
    white-space: nowrap;
    text-align:left;
    font-weight: bold;
  }

  /*
  Label the data
  */
  #no-more-tables td:before { content: attr(data-title); }
}
  </style>
  <!--SVG Iconos -->
  <link rel="stylesheet" href="iconsvg/style.css">
</head>

<body class="sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
       <li class="nav-item d-none d-sm-inline-block">
        <a href="oficina.php" class="nav-link"><i class="nav-icon fas fa-user"></i> Mi perfil</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <?php if($_SESSION["id_rol"]=="4" || $_SESSION["id_rol"]=="representante" ){?>
        <a href="https://intranet.prolife.pe/login.php" class="nav-link"> <i class="nav-icon fas fa-user-lock"></i> Cerrar Sesión</a>
        <?php }else{?>
        <a href="login.php" class="nav-link">Cerrar Sesión</a>
        <?php }?>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php require_once 'helpers/menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header"><!-- InstanceBeginEditable name="region_content_header" -->
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Backups de Redes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="oficina">Oficina</a></li>
              <li class="breadcrumb-item active">Backups de Redes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    <!-- InstanceEndEditable --></div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content"><!-- InstanceBeginEditable name="region_content_section" -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="mailbox-controls">
                  <?php if($_SESSION["id_rol"]=="1"){?>
                  <button type="button" class="btn btn-primary btn-sm checkbox-toggle generate-backups-redes" title="Generar Backups de Redes"  data-id="0" >Generar Backups de Redes <i class="fas fa-user-plus"></i>
                  </button>
                  <?php }?>
                  <button  class="btn btn-success btn-sm report-excel-backups-redes" title="Exportar Excel" id="report-excel-backups-redes" >Excel <i class="fas fa-file-excel"></i></button>
                  <!--<button type="button" class="btn btn-danger btn-sm report-pdf-perfilusuario" title="Exportar PDF" id="report-pdf-perfilusuario">PDF <i class="fas fa-file-pdf"></i></button>-->
                  <button type="button" class="btn btn-danger btn-sm" title="Actualizar Data" id="load-backups-redes">  <i class="fas fa-sync-alt"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body tbody_list">

              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
  	<!-- InstanceEndEditable -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="http://wisbac.com/" target="blanck">WISBAC</a>.</strong>
    Todos los derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- InstanceBeginEditable name="region_js" -->

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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Js CRUD -->
<script src="js/js_multinivel.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- page script -->
<script>
list_backups_redes();
</script>

</body>
<!-- InstanceEnd --></html>
<?php } else {
  header('Location: index.php');
} ?>