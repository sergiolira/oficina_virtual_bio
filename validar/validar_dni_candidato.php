<?php
session_start();
include_once("../../model_class/candidato.php");
include_once("../../model_class/dni_observado_prolife.php");
$obj=new candidato();
$obj_dni_obs=new dni_observado_prolife();
$obj->dni=$_REQUEST["txtdni"];
$obj->id_candidato=$_REQUEST["hdnid"];
/** Validacion de Lista negra */
$obj_dni_obs->nro_documento=$_REQUEST["txtdni"];
$rsr=(integer)$obj_dni_obs->validar_dni();

if($_SESSION["id_rol"]>=1 && $_SESSION["id_rol"]<=6){
if($rsr>0){
echo "true_observado";
die();
}
}else{
if($rsr>0){
echo "true";
die();
}
}

if($_REQUEST["hdnid"]==0){
    $rsr=(integer)$obj->validar_dni();
}else{
    $rsr=(integer)$obj->validar_dni_edit();
}

if($rsr>0){
echo "true";
die();
}else{
echo "false";
die();
}
?>