<?php
session_start();
if(!isset($_SESSION['correo']) || $_SESSION["correo"]==""){
    include_once("../funciones.php");
    $obj= new funciones();
    $obj->delete_session_usuario();
    $obj->delete_session_post();
    echo "session_expired";
    die();
}
setlocale(LC_ALL,"es_ES@euro","es_PE","esp");
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, 'es_PE.utf8');
$fecha_ini=$_REQUEST["fecha_ini"];
$fecha_fin=$_REQUEST["fecha_fin"];
$entidad=$_REQUEST["entidad"];
include_once("../../model_class/registro_ventas_oncosalud.php");
include_once("../../model_class/hc_backup_x_fecha_corte.php");
include_once("../../model_class/fecha_corte_ventas.php");
$objr=new registro_ventas_oncosalud();
$obj_hc=new hc_backup_x_fecha_corte();
$obj_fc=new fecha_corte_ventas();

$fecha_inicial = date("Y-m", strtotime($fecha_ini));
$anio=strftime("%Y",strtotime($fecha_inicial));
$mes=strftime("%m",strtotime($fecha_inicial));

$obj_fc->anio=$anio;
$obj_fc->mes=$mes;
if($entidad=="prolife"){$obj_fc->id_entidad=1;}
if($entidad=="oncosalud"){$obj_fc->id_entidad=2;}
$rs_cod=$obj_fc->obtener_cod_fecha_corte_ventas();
if($rs_cod!="0"){
    $obj_hc->cod_fecha_corte_ventas=$rs_cod;
    $rs_=$obj_hc->validar_cod_fecha_corte_ventas();
    if($rs_>=1){
        echo "true";
        die();
    }
}

echo "false";
die();
?>