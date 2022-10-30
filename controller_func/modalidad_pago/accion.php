<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/modalidad_pago.php");
$obj_md= new modalidad_pago();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_md->id_modalidad_pago= intval(strClean($_REQUEST["id"]));
        $obj_md->activar();
        echo "true_activado";
        die();
       
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_md->id_modalidad_pago= intval(strClean($_REQUEST["id"]));
        $obj_md->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar modalidad de pago ----*/
if($_REQUEST["id"]>0){
    $obj_md->modalidad_pago= strClean($_REQUEST["txt_m"]);
    $obj_md->observacion= strClean($_REQUEST["txt_obs"]);
    $obj_md->id_modalidad_pago= intval(strClean($_REQUEST["id"]));
    if($obj_md->modalidad_pago == '' || $obj_md->observacion == '' || $obj_md->id_modalidad_pago == ''){ 
        echo "error_datos";
        return false;
    }
    $obj_md->update();
    echo "true_update";
    die(); 
}else{
    $obj_md->modalidad_pago= strClean($_REQUEST["txt_m"]);
    $obj_md->observacion= strClean($_REQUEST["txt_obs"]);
    if($obj_md->modalidad_pago == '' || $obj_md->observacion == ''){
        echo "campos_vacios";
        return false;
    }
    $obj_md->create();
    echo "true_create";
    die(); 
}

?>
