<?php
session_start();
include_once("../../model_class/dni_s_aprobados.php");
include_once("../../model_class/historial_consulta_dni_dinersclub.php");
$objr=new dni_s_aprobados();
$objh=new historial_consulta_dni_dinersclub();
$objr->dni=$_REQUEST["txtdni"];

$rsr=(integer)$objr->validar_dni();

if($rsr>0){
    $objr->consult_x_dni();
    $tasa_mul=$objr->tasa*100;
    $tasa=number_format($tasa_mul, 0);
    $js_json='{"dni":"'.$objr->dni.'","producto":"'.$objr->producto_dinersclub.'","en_sistema":"true",
        "id_producto":"'.$objr->id_producto_dinersclub.'","tasa":"'.$objr->tasa.'","tasapor":"'.$tasa.' %"}';
    $objh->ruc=$_SESSION["ruc"];
    $objh->dni=$_SESSION["ruc"];
    $objh->patrocinador=$_SESSION["patrocinador"];
    $objh->patrocinador_directo=$_SESSION["patrocinador_directo"];
    $objh->dni_dinersclub=$_REQUEST["txtdni"];
    $objh->estado_dinersclub="Aprobado";
    $objh->id_producto_dinersclub=$objr->id_producto_dinersclub;
    $objh->id_usuarioregistro=1;
    $objh->id_usuarioactualiza=1;
    $objh->save();
}else{
    $js_json='{"dni":"","producto":"","en_sistema":"false","id_producto":"","tasa":"0","tasapor":"0 %"}';
    $objh->ruc=$_SESSION["ruc"];
    $objh->dni=$_SESSION["ruc"];
    $objh->patrocinador=$_SESSION["patrocinador"];
    $objh->patrocinador_directo=$_SESSION["patrocinador_directo"];
    $objh->dni_dinersclub=$_REQUEST["txtdni"];
    $objh->estado_dinersclub="No incluido en campaña";
    $objh->id_producto_dinersclub=0;
    $objh->id_usuarioregistro=1;
    $objh->id_usuarioactualiza=1;
    $objh->save();
}

$htmlcompleto=$js_json;
$html='['.$htmlcompleto.']';
echo ($html);
?>