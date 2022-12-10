<?php
include_once("../../model_class/representante.php");
$objr=new representante();
if(trim($_REQUEST["ruc"])==""){
echo "false";
die();
}
$objr->nro_documento=$_REQUEST["ruc"];
$objr->consultar_datos_nro_documento();
$datos=$objr->nombre." ".$objr->apellidopaterno." ".$objr->apellidomaterno;
if(trim($datos)==""){
echo "false";
die();
}
echo $datos;
die();
?>