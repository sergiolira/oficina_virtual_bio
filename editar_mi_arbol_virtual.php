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
$obj_s_m->enlace="miarbolvirtual.php";
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

if(trim($_REQUEST["txtruc_buscar"])!=""){
  $txtpatrocinador=$_REQUEST["txtruc_buscar"];
}


if(trim($_REQUEST["sltruc_buscar"])!=0){
  $txtpatrocinador=$_REQUEST["sltruc_buscar"];
}

if ($_SESSION['ver']=="1") {
  setlocale(LC_ALL,"es_ES@euro","es_PE","esp");
  date_default_timezone_set('America/Lima');
  setlocale(LC_TIME, 'es_PE.utf8');
  $nro_solicitud=date('dmYHis').rand(100, 999);
?>
<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/Plantilla090919.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ProLife | Editar Arbol virtual</title>
<!-- InstanceEndEditable -->

<!-- InstanceBeginEditable name="head" -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

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


  <style id="myStyles">  

        #tree {
            width: 100%;
            height: 100%;
        }

        /*Condicional Venta*/
        .node.Lider rect {
            fill: #28A745;

        }

        .node.Mired rect {
            fill: #197AB6;
        }

        

        #undo{
            font-size: 14px;
            z-index: 5000000;
        }

        

        #tree>svg {
            /*background-color: #2E2E2E;*/
            border-color:#2E2E2E;
        }

        .path {
            animation: dash 5s linear alternate infinite;
          
          }
          
          @keyframes dash {
            from {
              stroke-dashoffset: 100;
              opacity: 1;
            }
            to {
              stroke-dashoffset: 0;
              opacity: 0;
            }
          }
          
          
          .path1 {
            animation: dash1 5s linear alternate infinite;
          
          }
          
          @keyframes dash1 {
            from {
              stroke-dashoffset: 100;
            }
            to {
              stroke-dashoffset: 0;
            }
          }

    
    </style>

    <script src="js/OrgChart.js"></script>
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
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header" style='padding: 2px .5rem;'><!-- InstanceBeginEditable name="region_content_header" -->
     <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h4>Editar arbol virtual - Representante</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="oficina">Oficina</a></li>
              <li class="breadcrumb-item active">Editar arbol virtual - Representantes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    <!-- InstanceEndEditable --></div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" ><!-- InstanceBeginEditable name="region_content_section" -->
        <div class="row" >
          <div class="col-12">
            <div class="card">
              <div class="card-header" >
              <form action="editar_mi_arbol_virtual_dibujar.php" method="POST" id="frmedit_con_arbol_virtual_redibujar">
                    <div class="row">
                      <div class="col-4">
                        <label for="lbldr" style="font-size:px">Representante</label>
                        <input type="hidden" id="txtruc_buscar" name="txtruc_buscar" value="<?php echo $txtpatrocinador;?>">
                        <input type="hidden" id="txtnrosoli" name="txtnrosoli" value="<?php echo $nro_solicitud;?>">
                        <input type="hidden" value="<?php echo $_REQUEST["hnombres"];?>" name="hnombres" id="hnombres">
                        <input type="hidden" id="txtruc_re_dibujar" name="txtruc_re_dibujar" value="">   
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-arrow-left"></i></span>
                            </div>
                            <label type="text" class="form-control" id="lbldr" name="lbldr"><?php echo $_REQUEST["hnombres"];?></label>
                        </div>                        
                      </div>
                      <div class="col-2">
                        <label for="lbldr" style="font-size:9px">RUC</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-arrow-left"></i></span>
                            </div>
                            <label type="text" class="form-control" id="lbldr" name="lbldr"><?php echo $txtpatrocinador;;?></label>
                        </div>                        
                      </div>
                     
                      <div class="col-3">
                        <center>
                          <label for="lbldr" style="font-size:9px;">-</label>
                          <div class="input-group mb-3" style="display: grid;">
                            <button disabled type="button" class="btn btn-warning float-right checkbox-toggle reiniciar-arbol-virtual-edicion" >Cancelar e Reinciar Edicion <i class="fas fa-broom nav-icon"></i></button>
                          </div>   
                        </center>                   
                      </div>

                      <div class="col-3">
                        <center>
                          <label for="lbldr" style="font-size:9px;">-</label>
                          <div class="input-group" style="display: grid;">                          
                            <a type="button"  class="btn btn-info float-right checkbox-toggle" href="miarbolvirtual.php">Regresar <i class="fas fa-broom   nav-icon"></i>
                            </a> 
                          </div> 
                        </center>                     
                      </div>                    
                      
                    </div>
                  </form>

                  <br>
                  <div class="row d-flex justify-content-end" style="border-style: groove;border: #1F7AB6;border: groove;border-radius: 15px;">

                      <div class="col-3">
                        <label for="lbldr" style="font-size:9px">-</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-arrow-left"></i></span>
                              </div>
                              <select class="form-control select2"  id="sltruc1" name="sltruc1">
                              </select>
                          </div>  
                      </div>

                      <div class="col-3">
                        <label for="lbldr" style="font-size:9px">Intercambiar Representantes</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-arrow-left"></i></span>
                              </div>
                              <select class="form-control select3" id="sltruc2" name="sltruc2">
                              </select>
                          </div>  
                      </div>

                      <div class="col-2">
                        <label for="lbldr" style="font-size:9px">-</label>
                          <div class="input-group mb-3">                              
                               <button style="right: 3%;" class="btn btn-success float-right checkbox-toggle" id="swap"> Aplicar Intercambio <i class="fas fa-sync nav-icon"></i></button>
                          </div>  
                      </div>
                  </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-tree">
                <div id="tree"></div>                
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
              <div class="col-sm-6 text-danger">
                <h4>Lista de removidos</h4>
              </div>
              <div class="card card-danger card-outline">                
                  <div class="card-body tbody_list_elim" >                    
                  </div>                
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
<script src="plugins/datatables/jquery.dataTables_multinivel.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- Js CRUD -->
<?php if($_SESSION["id_tipo_red_mlm"]=="3"){?>
  <script src="js/js_arbol_virtual_rep.js"></script>
<?php }else if($_SESSION["id_tipo_red_mlm"]=="5"){?>
  <script src="js/js_arbol_virtual_rep_tri_hibrido.js"></script>
<?php }else if($_SESSION["id_tipo_red_mlm"]=="6"){?>
  <script src="js/js_arbol_virtual_rep_6_4.js"></script>
<?php }?>
<!-- page script -->
<script src="plugins/bootbox/bootbox.all.min.js"></script>
<!-- Page specific script -->
<script>
editararbolvirtual_rep();
combo_representantes_opcion_1();

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    });

    $('.select3').select2({
      theme: 'bootstrap4'
    });
  });
</script>
</body>
<!-- InstanceEnd --></html>
<?php } else {
  header('Location: index.php');
} ?>