<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/genero.php");
$obj_g= new genero();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_g->id_genero=intval(strClean($_REQUEST["id"]));
        $obj_g->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_g->id_genero=intval(strClean($_REQUEST["id"]));
        $obj_g->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar forma de pago ----*/
if($_REQUEST["id"]>0){
    $obj_g->genero=strClean($_REQUEST["txt_genero"]);
    $obj_g->id_genero=intval(strClean($_REQUEST["id"]));
    if($obj_g->genero == '' || $obj_g->id_genero == ''){
        echo "error_datos";
        return false;
    }
    $obj_g->update();
    echo "true_update";
    die(); 
}else{
    $obj_g->genero=strClean($_REQUEST["txt_genero"]);
    if($obj_g->genero == '' ){
        echo "error_datos";
        return false;
    }
    $obj_g->create();
    echo "true_create";
    die(); 
}

?>