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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mis compras</title>
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
        <a href="index3.html" class="nav-link">Registro de compras</a>
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
            <h1 class="m-0 text-dark">Registro de ventas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Registro de ventas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card-header">                
          <div class="row" style="font-size: 12px;">
          
            <div class="col-4" >
              <!-- Date range -->
              <div class="form-group">
                <label>Rango de fecha de pedido</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control float-right" id="fecha_pedido_c" autocomplete="off" value="">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>

            <div class="col-4" >
              <!-- Date range -->
              <div class="form-group">
                <label>Rango de fecha de entrega</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    <input type="checkbox" id="check_fec_ent">
                    </span>
                  </div>
                  <input type="text" class="form-control float-right" disabled id="fecha_entrega_c" autocomplete="off" value="">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>

            <div class="col-4" >
              <label for="slt_estado_pedido_c">Estado de pedido</label>
              <div class="input-group mb-3" style="font-size: 14px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file-alt text-info"></i></span>
                  </div>
                  <select class="form-control" data-placeholder="Seleccione uno o varios estados" multiple="multiple" 
                  style="width: 80%;" id="slt_estado_pedido_c">
                  </select>
              </div>
            </div>                 

            <div class="col-4" >
              <label for="slt_tipo_venta_c">Tipo de venta</label>
              <div class="input-group mb-3" style="font-size: 14px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file-alt text-info"></i></span>
                  </div>
                  <select class="form-control" data-placeholder="Seleccione uno o varios tipos" multiple="multiple" 
                  style="width: 80%;" id="slt_tipo_venta_c">
                  </select>
              </div>
            </div>   

            <div class="col-4">
              <label for="txt_nro_sol_c">N° de solicitud</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i>#</i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter" id="txt_nro_sol_c" >
              </div>
            </div>

            <div class="col-4">
              <label for="txt_nro_doc_c">N° de documento</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i>#</i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter" id="txt_nro_doc_c">
              </div>
            </div>
          </div>
        </div>

        <div class="row">          
          <div class="col-12">
             <div class="card">
                <?php if ($_SESSION['crear']==1) { ?>
                <div class="card-header"  align="center">
                    <button class="btn btn-warning btn-sm consult_resgistro_ventas" data-id="0">Consultar</button>
                    <button class="btn btn-info btn-sm nuevo_detalle_venta_modal_asesor" data-id="0">Nueva pedido</button>
                    <button type="buttom" class="btn btn-success btn-sm exportar-excel-categoria-agente-bmi" id="exportable">Exportar datos <i class="fas fa-file-excel"></i></button>
                </div>
                <?php }?>                
             </div>
             <!-- /.card-header -->
             <div class="card-body tbl_reg_ventas"></div>
          </div>
        </div>


        <div class="modal fade" id="modal-form-detalle-venta">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Registro de compras</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <div class="modal-body">
                <form id="form_detalle_venta">
               
                </form>
               <div class="modal-footer" style="justify-content: center;">
                  <button type="button" class="btn btn-success" id="btn_save">Guardar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              
               </div>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <!-- /.modal -->
      <div class="modal fade" id="modal-show-detalle-venta">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title ">Detalle compras</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="form_show_detalle_venta">
               
                </form>
               <div class="modal-footer" style="justify-content: center;">
              
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
             </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-rc.1
    </div>
  </footer>

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
<!-- js herramienta -->
<script src="js/js_registro_venta.js"> </script>

<script>
    moment.locale('es');
    combo_estado_pedido();
    combo_tipo_venta();    

    $('#slt_estado_pedido_c').select2({
      theme: 'bootstrap4'
    });
    $('#slt_tipo_venta_c').select2({
      theme: 'bootstrap4'
    });

    $('#fecha_pedido_c').daterangepicker(      
      {
        ranges   : {
          'Hoy'       : [moment(), moment()],
          'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Los últimos 7 días' : [moment().subtract(6, 'days'), moment()],
          'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
          'Este mes'  : [moment().startOf('month'), moment().endOf('month')],          
          'El mes pasado a la actualidad'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
          'El mes pasado'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
          'Desde los inicios'  : ['01/01/2021', moment(), moment()]         
        },
        //startDate: moment().subtract(1, 'month').startOf('month'),
        startDate:moment().startOf('month'),
        endDate :moment(),
        maxDate :moment(),
        minDate :'01/01/2022'
        
      },
      function (start, end) {   
        $('#fecha_pedido_c').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));      
      }
    );
     
     $('#fecha_entrega_c').daterangepicker(      
      {
        ranges   : {
          'Hoy'       : [moment(), moment()],
          'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Los últimos 7 días' : [moment().subtract(6, 'days'), moment()],
          'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
          'Este mes'  : [moment().startOf('month'), moment().endOf('month')],          
          'El mes pasado a la actualidad'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
          'El mes pasado'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
          'Desde los inicios'  : ['01/01/2021', moment(), moment()]         
        },
        //startDate: moment().subtract(1, 'month').startOf('month'),
        startDate:moment().startOf('month'),
        endDate  :moment(),
        maxDate :moment(),
        minDate :'01/01/2022'
      },
      function (start, end){   
        $('#fecha_entrega_c').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));      
      }
    ); 
    
    list_registros_ventas();   
    
    
</script>
</body>
</html>
<?php } else {
  header('Location: index.php');
} 
?>