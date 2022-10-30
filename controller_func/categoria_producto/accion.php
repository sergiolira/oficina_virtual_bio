<?php
session_start();
require_once("../../helpers/helpers.php");
include_once("../../model_class/categoria_producto.php");
$obj_c= new categoria_producto();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_c->id_categoria_producto=intval(strClean($_REQUEST["id"]));
        $obj_c->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_c->id_categoria_producto=intval(strClean($_REQUEST["id"]));
        $obj_c->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar Campaña ----*/
if($_REQUEST["id"]>0){
    $obj_c->userLogin = $_SESSION['idUser'];
    $obj_c->categoria=strClean($_REQUEST["txt_cat"]);
    $obj_c->descripcion=strClean($_REQUEST["txt_des"]);
    $obj_c->id_categoria_producto=intval(strClean($_REQUEST["id"]));
    $obj_c->id_usuarioregistro=$_SESSION['idUser'];
    $obj_c->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_c->categoria == '' || $obj_c->id_categoria_producto == ''){
        echo "error_datos";
        return false;
    }
    $obj_c->update();
    echo "true_update";
    die(); 
}else{
    $obj_c->userLogin = $_SESSION['idUser'];
    $obj_c->categoria=strClean($_REQUEST["txt_cat"]);
    $obj_c->descripcion=strClean($_REQUEST["txt_des"]);
    $obj_c->id_usuarioregistro=$_SESSION['idUser'];
    $obj_c->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_c->categoria == ''){
        echo "error_datos";
        return false;
    }
    $obj_c->create();
    echo "true_create";
    die(); 
}

?>
