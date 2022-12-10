<?php
session_start();
include_once("../../model_class/representante.php");
$obj_representante= new representante();
$filtro="";
if($_SESSION["id_rol"]=="3" && $_SESSION["patrocinador"]=="Cabeza de red"){
    $filtro.=" AND patrocinador='".$_SESSION["nro_documento"]."' ";
}

if($_SESSION["id_rol"]=="3" && $_SESSION["patrocinador"]!="Cabeza de red"){
    $filtro.=" AND patrocinador_directo='".$_SESSION["nro_documento"]."' ";
}

$cant=$obj_representante->cant_representantes_filtro($filtro);
echo $cant;
die();
?>