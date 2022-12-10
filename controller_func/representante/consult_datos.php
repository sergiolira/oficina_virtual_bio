<?php
include_once("../../model_class/representante.php");
$obj=new representante();
$obj->nro_documento=$_REQUEST["numero_documento"];
$obj->consultar_datos_nro_documento();
$js_json="";
$js_json='{ "datos":"'.$obj->razon_social.'","correo":"'.$obj->correo.'",
    "celular":"'.$obj->telefono.'","descuento":"'.$obj->descuento_x_registro.'","patrocinador":"'.$obj->patrocinador.'",
    "patrocinador_directo":"'.$obj->patrocinador_directo.'"}';
    
$htmlcompleto=$js_json;
$html='['.$htmlcompleto.']';
echo ($html);
?>