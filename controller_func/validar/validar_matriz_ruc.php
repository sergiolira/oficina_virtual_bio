<?php
include_once("../../model_class/representante_conectado.php");
$objr=new representante_conectado();
$objr->ruc=$_REQUEST["ruc"];
$rsr=(integer)$objr->validar_solo_ruc();
	if($rsr>0){
	echo "true";
	die();
	}else{
		echo "false";
		die();
	}
?>