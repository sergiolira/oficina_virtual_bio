<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/forma_pago.php");
$obj_f= new forma_pago();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_f->id_forma_pago=intval(strClean($_REQUEST["id"]));
        $obj_f->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_f->id_forma_pago=intval(strClean($_REQUEST["id"]));
        $obj_f->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar forma de pago ----*/
if($_REQUEST["id"]>0){
    $obj_f->forma_pago=strClean($_REQUEST["txt_fp"]);
    $obj_f->observacion=strClean($_REQUEST["txt_obs"]);
    $obj_f->id_forma_pago=intval(strClean($_REQUEST["id"]));
    if($obj_f->forma_pago == '' || $obj_f->observacion == '' || $obj_f->id_forma_pago == ''){
        echo "error_datos";
        return false;
    }
    $obj_f->update();
    echo "true_update";
    die(); 
}else{
    $obj_f->forma_pago=strClean($_REQUEST["txt_fp"]);
    $obj_f->observacion=strClean($_REQUEST["txt_obs"]);
    if($obj_f->forma_pago == '' || $obj_f->observacion == ''){
        echo "error_datos";
        return false;
    }
    $obj_f->create();
    echo "true_create";
    die(); 
}

?>