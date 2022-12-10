<?php
include_once("../../model_class/representante.php");
$objr=new representante();
if(trim($_REQUEST["ruc"])==""){
echo "false";
die();
}
$objr->nro_documento=$_REQUEST["ruc"];
$objr->consultar_datos_sponsor_padre();
if($objr->patrocinador_directo=="Lider de Red"){
	$datos=$objr->patrocinador_directo;
}else{
	$objr->nro_documento=$objr->patrocinador_directo;
	$objr->consultar_datos_sponsor_padre();
	$datos=$objr->nombre." ".$objr->apellidopaterno." ".$objr->apellidomaterno;
}
if(trim($datos)==""){
echo "false";
die();
}
echo $datos;
die();
?>