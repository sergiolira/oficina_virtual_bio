<?php
include_once("../../model_class/representante_conectado.php");
$objr=new representante_conectado();
$objr->ruc=$_REQUEST["ruc"];
$objr->id_representante_conectado=$_REQUEST["id"];
$rsr=(integer)$objr->validar_ruc_r();
	if($rsr>0){
	echo "false";
	die();
	}else{
		echo "true";
		die();
	}
?>