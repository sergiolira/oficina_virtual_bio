<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/ubigeo_peru_districts.php");
$obj_up= new ubigeo_peru_districts();


/*---- Crear y actualizar Programa oncosalud ----*/
if($_REQUEST["id"]>0){
    $obj_up->name=strClean($_REQUEST["txt_title"]);
    $obj_up->province_id=strClean($_REQUEST["slt_pro"]);
    $obj_up->department_id=strClean($_REQUEST["slt_dep"]);
    $obj_up->id=strClean($_REQUEST["id"]);
    if($obj_up->name == '' || $obj_up->province_id == '' || $obj_up->department_id == '' || $obj_up->id == ''){
        echo "error_datos";
        return false;
    }
    $obj_up->update();
    echo "true_update";
    die();   
}else{
    $obj_up->name=strClean($_REQUEST["txt_title"]);
    $obj_up->province_id=strClean($_REQUEST["slt_pro"]);
    $obj_up->department_id=strClean($_REQUEST["slt_dep"]);
    if($obj_up->name == '' || $obj_up->province_id == '' || $obj_up->department_id == ''){
        echo "error_datos";
        return false;
    }
    $obj_up->create();
    echo "true_create";
    die();  
}

?>