<?php
session_start();
require_once("../../helpers/helpers.php");
include_once("../../model_class/web_banner_descripcion.php");
$obj_wb= new web_banner_descripcion();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_wb->id_web_banner_descripcion=intval(strClean($_REQUEST["id"]));
        $obj_wb->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_wb->id_web_banner_descripcion=intval(strClean($_REQUEST["id"]));
        $obj_wb->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar forma de pago ----*/
if($_REQUEST["id"]>0){
    $obj_wb->id_web_banner_descripcion=intval(strClean($_REQUEST["id"]));
    $obj_wb->titulo=strClean($_REQUEST["txt_titulo"]);
    $obj_wb->subtitulo=strClean($_REQUEST["txt_subtitulo"]);
    $obj_wb->parrafo=strClean($_REQUEST["txt_parrafo"]);
    $obj_wb->id_usuarioregistro=$_SESSION['idUser'];
    $obj_wb->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_wb->titulo == '' || $obj_wb->id_web_banner_descripcion == '' || $obj_wb->subtitulo == '' || $obj_wb->parrafo == ''){
        echo "error_datos";
        return false;
    }
    $obj_wb->update();
    echo "true_update";
    die(); 
}else{
    $obj_wb->titulo=strClean($_REQUEST["txt_titulo"]);
    $obj_wb->subtitulo=strClean($_REQUEST["txt_subtitulo"]);
    $obj_wb->parrafo=strClean($_REQUEST["txt_parrafo"]);
    $obj_wb->id_usuarioregistro=$_SESSION['idUser'];
    $obj_wb->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_wb->titulo == '' ||  $obj_wb->subtitulo == '' || $obj_wb->parrafo == ''){
        echo "error_datos";
        return false;
    }
    $obj_wb->create();
    echo "true_create";
    die(); 
}

?>