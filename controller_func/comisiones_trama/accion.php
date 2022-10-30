<?php 
require_once("../../helpers/helpers.php");
require_once "../../model_class/trama_comisiones.php";
$obj_tr = new trama_com();

if(isset($_REQUEST['opcion_estado'])){
    
    if($_REQUEST['opcion_estado']=="desactivar"){
        $obj_tr->id_trama= $_REQUEST['id'];
        $obj_tr->desactivar();
        echo "true";
        die();
    }
    else if($_REQUEST['opcion_estado']=="activar"){
        $obj_tr->id_trama= $_REQUEST['id'];
        $obj_tr->activar();
        echo "true";
        die();
    }   
}

$obj_tr->id_trama = intval(strClean($_REQUEST["id"]));
$obj_tr->id_producto = strClean($_REQUEST["slt_pro"]);
$obj_tr->cantidad = strClean($_REQUEST["txt_cantidad"]);
$obj_tr->tipo_comision = strClean($_REQUEST["slt_tip"]);
$obj_tr->comision = strClean($_REQUEST["txt_comision"]);
if($_REQUEST['id']==0){
    if($obj_tr->id_trama==""||
    $obj_tr->id_producto==""||
    $obj_tr->cantidad==""||
    $obj_tr->tipo_comision==""||
    $obj_tr->comision==""){
        echo "error_datos";
        return false;
    }
    $obj_tr->create();
    echo "true";
    die();
}else{
    if($obj_tr->id_trama==""||
    $obj_tr->id_producto==""||
    $obj_tr->cantidad==""||
    $obj_tr->tipo_comision==""||
    $obj_tr->comision==""){
        echo "error_datos";
        return false;
    }
    $obj_tr->update();
    echo "true";
    die();
}

