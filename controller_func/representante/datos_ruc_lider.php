<?php
include_once("../../model_class/representante.php");
$objr=new representante();
if(trim($_REQUEST["ruc"])==""){
echo "false";
die();
}
$objr->ruc=$_REQUEST["ruc"];
$objr->consultar_ruc_lider();
$datos=$objr->ruc;
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