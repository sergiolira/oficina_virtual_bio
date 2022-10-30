<?php
include_once("../../model_class/candidato.php");
$obj=new candidato();
$obj->dni=$_REQUEST["txtnro_doc"];
$obj->id_candidato=$_REQUEST["hdnid"];

if($_REQUEST["hdnid"]==0){
    $rsr=(integer)$obj->validar_nro_doc();
}else{
    $rsr=(integer)$obj->validar_nro_doc_edit();
}

if($rsr>0){
echo "true";
die();
}else{
echo "false";
die();
}
?>