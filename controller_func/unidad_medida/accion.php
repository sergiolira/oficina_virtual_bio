<?php
session_start();
require_once("../../helpers/helpers.php");
include_once("../../model_class/unidad_medida.php");
$obj_u= new unidad_medida();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_u->id_unidad_medida=intval(strClean($_REQUEST["id"]));
        $obj_u->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_u->id_unidad_medida=intval(strClean($_REQUEST["id"]));
        $obj_u->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar Campaña ----*/
if($_REQUEST["id"]>0){
    $obj_u->userLogin = $_SESSION['idUser'];
    $obj_u->unidad_medida=strClean($_REQUEST["txt_unidad"]);
    $obj_u->id_unidad_medida=intval(strClean($_REQUEST["id"]));
    $obj_u->id_usuarioregistro=$_SESSION['idUser'];
    $obj_u->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_u->unidad_medida == '' || $obj_u->id_unidad_medida == ''){
        echo "error_datos";
        return false;
    }
    $obj_u->update();
    echo "true_update";
    die(); 
}else{
    $obj_u->unidad_medida=strClean($_REQUEST["txt_unidad"]);
    $obj_u->id_usuarioregistro=$_SESSION['idUser'];
    $obj_u->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_u->unidad_medida == ''){
        echo "error_datos";
        return false;
    }
    $obj_u->create();
    echo "true_create";
    die(); 
}

?>
