<?php
include_once("../../model_class/representante_conectado.php");
$objr=new representante_conectado();
$objr->ruc=$_REQUEST["ruc"];
if($_REQUEST["liderdered"]=="0"){
	$objr->patrocinador="Elige";
}else{$objr->patrocinador=$_REQUEST["liderdered"];}

$rsr=(integer)$objr->validar_ruc_r_sponsor();
	if($rsr>0){
	echo "true";
	die();
	}else{
		echo "false";
		die();
	}
?>