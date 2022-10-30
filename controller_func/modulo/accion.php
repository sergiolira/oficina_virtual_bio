<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/modulo.php");
$obj_c= new modulo();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_c->id_modulo=intval(strClean($_REQUEST["id"]));
        $obj_c->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_c->id_modulo=intval(strClean($_REQUEST["id"]));
        $obj_c->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar ----*/
if($_REQUEST["id"]>0){
    $obj_c->modulo=strClean($_REQUEST["txt_title"]);
    $obj_c->nivel=strClean($_REQUEST["slt_nivel"]);
    $obj_c->observacion=strClean($_REQUEST["txt_dcrip"]);
    $obj_c->id_modulo=intval(strClean($_REQUEST["id"]));
    $obj_c->icono=strClean($_REQUEST["txt_icon"]);
    $obj_c->estilocolor=strClean($_REQUEST["slt_estcol"]);
    $obj_c->enlace=strClean($_REQUEST["txt_enlace"]);
    if ($obj_c->icono=="") {
        $obj_c->icono="far fa-circle nav-icon";
    }
    if($obj_c->modulo == '' || $obj_c->id_modulo == ''){
        echo "error_datos";
        return false;
    }
    $obj_c->update();
    echo "true_update";
    die(); 
}else{
    $obj_c->modulo=strClean($_REQUEST["txt_title"]);
    $obj_c->nivel=strClean($_REQUEST["slt_nivel"]);
    $obj_c->observacion=strClean($_REQUEST["txt_dcrip"]);
    $obj_c->icono=strClean($_REQUEST["txt_icon"]);
    $obj_c->estilocolor=strClean($_REQUEST["slt_estcol"]);
    $obj_c->enlace=strClean($_REQUEST["txt_enlace"]);
    if ($obj_c->icono=="") {
        $obj_c->icono="far fa-circle nav-icon";
    }
    if($obj_c->modulo == ''){
        echo "error_datos";
        return false;
    }
    $obj_c->create();
    echo "true_create";
    die(); 
}

?>