<?php
session_start();
require_once("../../helpers/helpers.php");
include_once("../../model_class/tipo_producto.php");
$obj_tp= new tipo_producto();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_tp->id_tipo_producto=intval(strClean($_REQUEST["id"]));
        $obj_tp->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_tp->id_tipo_producto=intval(strClean($_REQUEST["id"]));
        $obj_tp->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar Campaña ----*/
if($_REQUEST["id"]>0){
    $obj_tp->userLogin = $_SESSION['idUser'];
    $obj_tp->tipo_producto=strClean($_REQUEST["txt_tipo"]);
    $obj_tp->id_tipo_producto=intval(strClean($_REQUEST["id"]));
    $obj_tp->id_usuarioregistro=$_SESSION['idUser'];
    $obj_tp->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_tp->tipo_producto == '' || $obj_tp->id_tipo_producto == ''){
        echo "error_datos";
        return false;
    }
    $obj_tp->update();
    echo "true_update";
    die(); 
}else{
    $obj_tp->userLogin = $_SESSION['idUser'];
    $obj_tp->tipo_producto=strClean($_REQUEST["txt_tipo"]);
    $obj_tp->id_usuarioregistro=$_SESSION['idUser'];
    $obj_tp->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_tp->tipo_producto == ''){
        echo "error_datos";
        return false;
    }
    $obj_tp->create();
    echo "true_create";
    die(); 
}

?>
