<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/tipo_documento.php");
$obj_td= new tipo_documento();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_td->id_tipo_documento=intval(strClean($_REQUEST["id"]));
        $obj_td->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_td->id_tipo_documento=intval(strClean($_REQUEST["id"]));
        $obj_td->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar ----*/
if($_REQUEST["id"]>0){
    $obj_td->tipo_documento=strClean($_REQUEST["txt_title"]);
    $obj_td->id_tipo_documento=intval(strClean($_REQUEST["id"]));
    if($obj_td->tipo_documento == '' || $obj_td->id_tipo_documento == ''){
        echo "error_datos";
        return false;
    }
    $obj_td->update();
    echo "true_update";
    die(); 
}else{
    $obj_td->tipo_documento=strClean($_REQUEST["txt_title"]);
    if($obj_td->tipo_documento == ''){
        echo "error_datos";
        return false;
    }
    $obj_td->create();
    echo "true_create";
    die(); 
}

?>