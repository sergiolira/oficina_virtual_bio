<?php
session_start();
include_once("../../model_class/cabecera_comisiones_venta.php");
$obj_cabecera_comisiones_venta= new cabecera_comisiones_venta();
$filtro="";
if($_SESSION["id_rol"]=="3"){
    $filtro.=" AND nro_documento='".$_SESSION["nro_documento"]."' ";
}
$total=$obj_cabecera_comisiones_venta->total_comisiones_filtro($filtro);
echo $total;
die();
?>