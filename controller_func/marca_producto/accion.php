<?php
session_start();
require_once("../../helpers/helpers.php");
include_once("../../model_class/marca_producto.php");
$obj_m= new marca_producto();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_m->id_marca_producto=intval(strClean($_REQUEST["id"]));
        $obj_m->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_m->id_marca_producto=intval(strClean($_REQUEST["id"]));
        $obj_m->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar Campaña ----*/
if($_REQUEST["id"]>0){
    $obj_m->userLogin = $_SESSION['idUser'];
    $obj_m->marca_producto=strClean($_REQUEST["txt_marca"]);
    $obj_m->id_marca_producto=intval(strClean($_REQUEST["id"]));
    if($obj_m->marca_producto == '' || $obj_m->id_marca_producto == ''){
        echo "error_datos";
        return false;
    }
    $obj_m->update();
    echo "true_update";
    die(); 
}else{
    $obj_m->userLogin = $_SESSION['idUser'];
    $obj_m->marca_producto=strClean($_REQUEST["txt_marca"]);
    if($obj_m->marca_producto == ''){
        echo "error_datos";
        return false;
    }
    $obj_m->create();
    echo "true_create";
    die(); 
}

?>
