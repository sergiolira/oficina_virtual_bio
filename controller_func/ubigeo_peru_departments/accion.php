<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/ubigeo_peru_departments.php");
$obj_d= new ubigeo_peru_departments();

/*---- Crear y actualizar Programa oncosalud ----*/
if($_REQUEST["id"]>0){
    $obj_d->name=strClean($_REQUEST["txt_title"]);
    $obj_d->id=strClean($_REQUEST["id"]);
    if($obj_d->name == '' || $obj_d->id == ''){
        echo "error_datos";
        return false;
    }
    $obj_d->update();
    echo "true_update";
    die();   
}else{
    $obj_d->name=strClean($_REQUEST["txt_title"]);
    if($obj_d->name == ''){
        echo "error_datos";
        return false;
    }
    $obj_d->create();
    echo "true_create";
    die();  
}

?>