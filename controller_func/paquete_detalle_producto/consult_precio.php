<?php
include_once("../../model_class/paquete_detalle_producto.php");
$obj=new paquete_detalle_producto();
$obj->id_paquete_detalle_producto=$_POST["id"];
$obj->consult();
$js_json="";
$js_json='{ "precio_venta":"'.$obj->precio_venta_unitario.'","stock_actual":"'.$obj->stock_actual.'",
    "id_divisa":"'.$obj->id_divisa.'","cantidad":"'.$obj->cantidad.'"}';

$htmlcompleto=$js_json;
$html='['.$htmlcompleto.']';
echo ($html);
?>