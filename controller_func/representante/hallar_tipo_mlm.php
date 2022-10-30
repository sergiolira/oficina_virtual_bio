<?php
include_once("../../model_class/representante.php");
$objr=new representante();
if(trim($_REQUEST["ruc"])==""){
echo "false";
die();
}
$objr->ruc=$_REQUEST["ruc"];
$objr->consultar_tipo_mlm();
$tipp_mlm=$objr->id_tipo_red_mlm;
echo $tipp_mlm;
die();
?>