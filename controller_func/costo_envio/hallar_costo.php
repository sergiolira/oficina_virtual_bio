<?php
include_once("../../model_class/costo_envio.php");
$obj=new costo_envio();
if($_REQUEST["id_pais"]>1){
    $obj->id_pais=$_REQUEST["id_pais"];
    $obj->consult_monto_x_pais();    
}

if($_REQUEST["id_pais"]==1 && $_REQUEST["id_dep"]>0 && $_REQUEST["id_pro"]>0 && $_REQUEST["id_dis"]>0){
    $obj->id_pais=$_REQUEST["id_pais"];
    $obj->id_departamento=$_REQUEST["id_dep"];
    $obj->id_provincia=$_REQUEST["id_pro"];
    $obj->id_distrito=$_REQUEST["id_dis"];
    $obj->consult_monto_x_pais_dep_pro_dis();
    if($obj->monto==0 || $obj->monto==""){
        $obj->id_pais=$_REQUEST["id_pais"];
        $obj->id_departamento=$_REQUEST["id_dep"];
        $obj->id_provincia=$_REQUEST["id_pro"];
        $obj->consult_monto_x_pais_dep_pro();
        if($obj->monto==0 || $obj->monto==""){
            $obj->id_pais=$_REQUEST["id_pais"];
            $obj->id_departamento=$_REQUEST["id_dep"];
            $obj->consult_monto_x_pais_dep();
           
        }
    }

}


$js_json="";
$js_json='{"costo_envio":"'.$obj->monto.'"}';

$htmlcompleto=$js_json;
$html='['.$htmlcompleto.']';
echo ($html);
?>