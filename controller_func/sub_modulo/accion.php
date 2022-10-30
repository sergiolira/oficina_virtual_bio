<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/sub_modulo.php");
$obj_sm= new sub_modulo();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_sm->id_sub_modulo=intval(strClean($_REQUEST["id"]));
        $obj_sm->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_sm->id_sub_modulo=intval(strClean($_REQUEST["id"]));
        $obj_sm->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar ----*/
if($_REQUEST["id"]>0){
    $obj_sm->sub_modulo=strClean($_REQUEST["txt_title"]);
    $obj_sm->nivel=strClean($_REQUEST["slt_nivel"]);
    $obj_sm->id_modulo=intval(strClean($_REQUEST["slt_md"]));
    $obj_sm->sub_x_nivel=intval(strClean($_REQUEST["slt_nivel_sub"]));
    if ($obj_sm->nivel==1 || $obj_sm->nivel==2) {
        $obj_sm->sub_x_nivel="0";
    }
    $obj_sm->icono=strClean($_REQUEST["txt_icon"]);
    if ($obj_sm->icono=="") {
        $obj_sm->icono="far fa-circle nav-icon";
    }
    $obj_sm->enlace=strClean($_REQUEST["txt_enlace"]);
    $obj_sm->id_sub_modulo=intval(strClean($_REQUEST["id"]));
    if($obj_sm->sub_modulo == '' || $obj_sm->id_sub_modulo == '' || $obj_sm->id_modulo == '' || $obj_sm->nivel == ''
    || $obj_sm->sub_x_nivel == '' || $obj_sm->icono == '' ){
        echo "error_datos";
        return false;
    }
    $obj_sm->update();
    echo "true_update";
    die(); 
}else{
    $obj_sm->sub_modulo=strClean($_REQUEST["txt_title"]);
    $obj_sm->nivel=strClean($_REQUEST["slt_nivel"]);
    $obj_sm->id_modulo=intval(strClean($_REQUEST["slt_md"]));
    $obj_sm->sub_x_nivel=intval(strClean($_REQUEST["slt_nivel_sub"]));
    if ($obj_sm->nivel==1 || $obj_sm->nivel==2) {
        $obj_sm->sub_x_nivel="0";
    }
    $obj_sm->icono=strClean($_REQUEST["txt_icon"]);
    if ($obj_sm->icono=="") {
        $obj_sm->icono="far fa-circle nav-icon";
    }
    $obj_sm->enlace=strClean($_REQUEST["txt_enlace"]);
    if($obj_sm->sub_modulo == '' || $obj_sm->id_modulo == '' || $obj_sm->nivel == ''
    || $obj_sm->sub_x_nivel == '' || $obj_sm->icono == '' ){
        echo "error_datos";
        return false;
    }
    $obj_sm->create();
    echo "true_create";
    die(); 
    
}

?>