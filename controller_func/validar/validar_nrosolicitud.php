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
include_once("../../model_class/registro_ventas_oncosalud.php");
$objr=new registro_ventas_oncosalud();
$objr->nro_solicitud=$_REQUEST["txtnrosolicitud"];
$objr->id_registro_ventas_oncosalud=$_REQUEST["hdnid"];
if($objr->id_registro_ventas_oncosalud==0){
    $rsr=(integer)$objr->validar_nrosolicitud();
}else{
    $rsr=(integer)$objr->validar_nrosolicitud_edit();
}

if($rsr>0){
echo "true";
die();
}else{
echo "false";
die();
}
?>