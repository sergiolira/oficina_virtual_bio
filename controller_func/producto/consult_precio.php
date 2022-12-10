<?php
include_once("../../model_class/producto.php");
$obj=new producto();
$obj->id_producto=$_POST["id"];
$obj->consult();
$js_json="";
$js_json='{ "precio_venta":"'.$obj->precio_venta_nuevo.'","descuento": "'.$obj->descuento.'","stock_actual": "'.$obj->stock_actual.'",
    "id_divisa":"'.$obj->id_divisa.'"}';

$htmlcompleto=$js_json;
$html='['.$htmlcompleto.']';
echo ($html);
?>