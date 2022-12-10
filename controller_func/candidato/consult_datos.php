<?php
include_once("../../model_class/candidato.php");
$obj=new candidato();
$obj->nro_documento=$_REQUEST["numero_documento"];
$obj->consultar_datos_nro_documento();
$js_json="";
$js_json='{ "datos":"'.$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno.'",
    "correo":"'.$obj->correo.'","celular":"'.$obj->telefono.'","descuento":"0.00","patrocinador":"","patrocinador_directo":""}';
    
$htmlcompleto=$js_json;
$html='['.$htmlcompleto.']';
echo ($html);
?>