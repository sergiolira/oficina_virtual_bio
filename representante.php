<?php
session_start();
if(!isset($_SESSION['correo']) || empty($_SESSION['login'])){
  if($_SERVER['HTTP_HOST']=='localhost'){
    header('Location: https://localhost/login-admin.php');
  }
  elseif($_SERVER['HTTP_HOST']=='admin.bio.pe'){
    header('Location: https://admin.bio.pe/login-admin');
  }
  elseif($_SERVER['HTTP_HOST']=='mioficina.bio.pe'){
    header('Location: https://mioficina.bio.pe/login-lider');
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
<title>ProLife | Representante</title>
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
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--ionicons-->
  <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">

  <link href="fontawesome-free-5.10.2-web/css/all.css" rel="stylesheet">

  <script defer src="fontawesome-free-5.10.2-web/js/all.js"></script>
  <!-- InstanceEndEditable -->
</head>

<body class="sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-info ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a href="javascript:void(0)" data-target="#modal-default" data-toggle="modal" class="nav-link"
        ><i class="nav-icon far fa-credit-card text-"></i> Consultar Diners Club</a>
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
            <h1>Representantes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="oficina">Oficina</a></li>
              <li class="breadcrumb-item active">Representantes</li>
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
                <?php
                  /**Administracion */
                  if($_SESSION["id_rol"]=="1" || $_SESSION["id_rol"]=="2") {?>
                  <button type="button" class="btn btn-info btn-sm checkbox-toggle add-modal-representante" title="Nuevo representante"  data-id="0" >Nuevo Representante <i class="fas fa-user-plus"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm checkbox-toggle add-modal-representante-lider" title="Nuevo representante lider"  data-id="0" >Nuevo representante lider <i class="fas fa-user-plus"></i>
                  </button>
                  <?php }?>
                  <button type="button" class="btn btn-success btn-sm report-excel-representantes" title="Exportar Excel" id="report-excel-representantes">Excel <i class="fas fa-file-excel"></i></button>

                  <button type="button" class="btn btn-danger btn-sm" title="Actualizar Data" id="load-representantes">  <i class="fas fa-sync-alt"></i></button>
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

<!-- Modal Formulario Usuario  -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title float-"><i class="far fa-user"></i> Nuevo representante</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" id="formadd" role="form">

       </form>
       <div class="modal-footer" style="justify-content:center;">
        <button type="button" class="btn btn-success add-representante">
          <span class='glyphicon glyphicon-check'></span><i class="fas fa-save"></i> Guardar
        </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class='glyphicon glyphicon-remove'></span><i class="fas fa-times-circle"></i> Cerrar
        </button>
       </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Formulario Usuario  -->
<div id="showModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title float-"><i class="far fa-user"></i> Detalle de Representante</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" id="formshow" role="form">
       </form>
       <div class="modal-footer"style="justify-content:center;">
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class='glyphicon glyphicon-remove'></span><i class="fas fa-times-circle"></i> Cerrar
        </button>
       </div>
      </div>
    </div>
  </div>
</div>

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
<script src="js/js_representante.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- page script -->
<script>
list_representantes();
</script>
</body>
<!-- InstanceEnd --></html>
<?php } else {
  header('Location: index.php');
} ?>