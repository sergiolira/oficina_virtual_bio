<?php
session_start();
include_once("../../model_class/cabecera_registro_venta.php");
$obj_cabecera_registro_venta= new cabecera_registro_venta();
$filtro="";
if($_SESSION["id_rol"]=="3"){
    $filtro.=" AND nro_documento='".$_SESSION["nro_documento"]."' AND tipo_cliente='ASESOR' ";
}
$cant=$obj_cabecera_registro_venta->cant_ventas_filtro($filtro);
echo $cant;
die();
?>