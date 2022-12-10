<?php
include_once("../../model_class/representante.php");
$objr=new representante();
$objr->nro_documento=$_REQUEST["ruc"];
$rsr=(integer)$objr->validar_nro_documento_r();
	if($rsr>0){
	echo "false";
	die();
	}else{
		echo "true";
		die();
	}
?>