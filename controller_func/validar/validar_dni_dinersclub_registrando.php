<?php
session_start();
include_once("../../model_class/dni_s_aprobados.php");
$objr=new dni_s_aprobados();
$objr->dni=$_REQUEST["txtdni"];
$rsr=(integer)$objr->validar_dni();
if($rsr>0){
    $objr->consult_x_dni();
    $tasa_mul=$objr->tasa*100;
    $tasa=number_format($tasa_mul, 0);
    $js_json='{"dni":"'.$objr->dni.'","producto":"'.$objr->producto_dinersclub.'","en_sistema":"true",
        "id_producto":"'.$objr->id_producto_dinersclub.'","tasa":"'.$tasa.' %"}';
}else{
    $tasa_mul=$objr->tasa*100;
    $tasa=number_format($tasa_mul, 0);
    $js_json='{"dni":"","producto":"","en_sistema":"false","id_producto":"'.$objr->id_producto_dinersclub.'","tasa":"'.$tasa.' %"}';
}

$htmlcompleto=$js_json;
$html='['.$htmlcompleto.']';
echo ($html);
?>