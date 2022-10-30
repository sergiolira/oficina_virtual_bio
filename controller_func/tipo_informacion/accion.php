<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/tipo_informacion.php");
$obj_inf= new tipo_informacion();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_inf->id_tipo_informacion=intval(strClean($_REQUEST["id"]));
        $obj_inf->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_inf->id_tipo_informacion=intval(strClean($_REQUEST["id"]));
        $obj_inf->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar Programa oncosalud ----*/
if($_REQUEST["id"]>0){
    $obj_inf->tipo_informacion=strClean($_REQUEST["txt_inf"]);
    $obj_inf->observacion=strClean($_REQUEST["txt_obs"]);
    $obj_inf->id_tipo_informacion=intval(strClean($_REQUEST["id"]));
    if($obj_inf->tipo_informacion == '' || $obj_inf->observacion == '' || $obj_inf->id_tipo_informacion == ''){
        echo "error_datos";
        return false;
    }
    $obj_inf->update();
    echo "true_update";
    die();   
}else{
    $obj_inf->tipo_informacion=strClean($_REQUEST["txt_inf"]);
    $obj_inf->observacion=strClean($_REQUEST["txt_obs"]);
    if($obj_inf->tipo_informacion == '' || $obj_inf->observacion == ''){
        echo "error_datos";
        return false;
    }
    $obj_inf->create();
    echo "true_create";
    die();  
}

?>