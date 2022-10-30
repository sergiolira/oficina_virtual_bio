<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/divisa.php");
$obj_d= new divisa();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_d->id_divisa=intval(strClean($_REQUEST["id"]));
        $obj_d->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_d->id_divisa=intval(strClean($_REQUEST["id"]));
        $obj_d->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar forma de pago ----*/
if($_REQUEST["id"]>0){
    $obj_d->divisa=strClean($_REQUEST["txt_divisa"]);
    $obj_d->expresion=strClean($_REQUEST["txt_expresion"]);
    $obj_d->id_divisa=intval(strClean($_REQUEST["id"]));
    if($obj_d->divisa == '' || $obj_d->id_divisa == ''){
        echo "error_datos";
        return false;
    }
    $obj_d->update();
    echo "true_update";
    die(); 
}else{
    $obj_d->divisa=strClean($_REQUEST["txt_divisa"]);
    $obj_d->expresion=strClean($_REQUEST["txt_expresion"]);
    if($obj_d->divisa == '' ){
        echo "error_datos";
        return false;
    }
    $obj_d->create();
    echo "true_create";
    die(); 
}

?>