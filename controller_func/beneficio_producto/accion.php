<?php
session_start();
require_once("../../helpers/helpers.php");
include_once("../../model_class/beneficio_producto.php");
$obj_d= new beneficio_producto();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_d->id_beneficio_producto=intval(strClean($_REQUEST["id"]));
        $obj_d->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_d->id_beneficio_producto=intval(strClean($_REQUEST["id"]));
        $obj_d->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar forma de pago ----*/
if($_REQUEST["id"]>0){
    $obj_d->id_beneficio_producto=intval(strClean($_REQUEST["id"]));
    $obj_d->titulo=strClean($_REQUEST["txt_titulo"]);
    $obj_d->descripcion=strClean($_REQUEST["txt_descripcion"]);
    $obj_d->id_producto=strClean($_REQUEST["slt_producto"]);
    $obj_d->observacion=strClean($_REQUEST["txt_obs"]);
    $obj_d->id_usuarioregistro=$_SESSION['idUser'];
    $obj_d->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_d->id_beneficio_producto == '' || $obj_d->titulo == '' || $obj_d->descripcion == '' 
    || $obj_d->id_producto == ''){
        echo "error_datos";
        return false;
    }
    $obj_d->update();
    echo "true_update";
    die(); 
}else{
    $obj_d->titulo=strClean($_REQUEST["txt_titulo"]);
    $obj_d->descripcion=strClean($_REQUEST["txt_descripcion"]);
    $obj_d->id_producto=strClean($_REQUEST["slt_producto"]);
    $obj_d->observacion=strClean($_REQUEST["txt_obs"]);
    $obj_d->id_usuarioregistro=$_SESSION['idUser'];
    $obj_d->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_d->titulo == '' || $obj_d->descripcion == '' 
    || $obj_d->id_producto == ''){
        echo "error_datos";
        return false;
    }
    $obj_d->create();
    echo "true_create";
    die(); 
}

?>