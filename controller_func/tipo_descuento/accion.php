<?php
session_start();
require_once("../../helpers/helpers.php");
include_once("../../model_class/tipo_descuento.php");
$obj_d= new tipo_descuento();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_d->id_tipo_descuento=intval(strClean($_REQUEST["id"]));
        $obj_d->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_d->id_tipo_descuento=intval(strClean($_REQUEST["id"]));
        $obj_d->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar forma de pago ----*/
if($_REQUEST["id"]>0){
    $obj_d->tipo_descuento=strClean($_REQUEST["txt_tipo_descuento"]);
    $obj_d->id_tipo_descuento=intval(strClean($_REQUEST["id"]));
    $obj_d->id_usuarioregistro=$_SESSION['idUser'];
    $obj_d->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_d->tipo_descuento == '' || $obj_d->id_tipo_descuento == ''){
        echo "error_datos";
        return false;
    }
    $obj_d->update();
    echo "true_update";
    die(); 
}else{
    $obj_d->tipo_descuento=strClean($_REQUEST["txt_tipo_descuento"]);
    $obj_d->id_usuarioregistro=$_SESSION['idUser'];
    $obj_d->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_d->tipo_descuento == '' ){
        echo "error_datos";
        return false;
    }
    $obj_d->create();
    echo "true_create";
    die(); 
}

?>