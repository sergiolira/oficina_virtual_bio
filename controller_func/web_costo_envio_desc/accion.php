<?php
session_start();
require_once("../../helpers/helpers.php");
include_once("../../model_class/web_costo_envio_desc.php");
$obj_w= new web_costo_envio_desc();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_w->id_web_costo_envio_desc=intval(strClean($_REQUEST["id"]));
        $obj_w->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_w->id_web_costo_envio_desc=intval(strClean($_REQUEST["id"]));
        $obj_w->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar forma de pago ----*/
if($_REQUEST["id"]>0){
    $obj_w->id_web_costo_envio_desc=intval(strClean($_REQUEST["id"]));
    $obj_w->web_costo_envio_desc=strClean($_REQUEST["txt_web_costo"]);
    $obj_w->id_usuarioregistro=$_SESSION['idUser'];
    $obj_w->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_w->web_costo_envio_desc == '' || $obj_w->id_web_costo_envio_desc == ''){
        echo "error_datos";
        return false;
    }
    $obj_w->update();
    echo "true_update";
    die(); 
}else{
    $obj_w->web_costo_envio_desc=strClean($_REQUEST["txt_web_costo"]);
    $obj_w->id_usuarioregistro=$_SESSION['idUser'];
    $obj_w->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_w->web_costo_envio_desc == '' ){
        echo "error_datos";
        return false;
    }
    $obj_w->create();
    echo "true_create";
    die(); 
}

?>