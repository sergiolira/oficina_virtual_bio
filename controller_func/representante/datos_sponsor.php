<?php
include_once("../../model_class/representante.php");
$objr=new representante();
if(trim($_REQUEST["ruc"])==""){
echo "false";
die();
}
$objr->ruc=$_REQUEST["ruc"];
$objr->consultar_datos_ruc();
$datos=$objr->nombre." ".$objr->apellidopaterno." ".$objr->apellidomaterno;
if(trim($datos)==""){
echo "false";
die();
}
echo $datos;
die();
?>