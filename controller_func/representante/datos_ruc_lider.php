<?php
include_once("../../model_class/representante.php");
$objr=new representante();
if(trim($_REQUEST["ruc"])==""){
echo "false";
die();
}
$objr->nro_documento=$_REQUEST["ruc"];
$objr->consultar_nro_documento_lider();
$datos=$objr->nro_documento;
if(trim($datos)=="0"){
echo $_REQUEST["ruc"];
die();
}

if(trim($datos)==""){
echo "false";
die();
}
echo $datos;
die();
?>