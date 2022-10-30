<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/ubigeo_peru_provinces.php");
$obj_up= new ubigeo_peru_provinces();

/*---- Activar y desactivar Estado ----
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_up->id_tipo_informacion=intval(strClean($_REQUEST["id"]));
        $obj_up->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_up->id_tipo_informacion=intval(strClean($_REQUEST["id"]));
        $obj_up->desactivar();
        echo "true_desactivado";
        die();
    }
}*/

/*---- Crear y actualizar Programa oncosalud ----*/
if($_REQUEST["id"]>0){
    $obj_up->name=strClean($_REQUEST["txt_title"]);
    $obj_up->department_id=strClean($_REQUEST["slt_dep"]);
    $obj_up->id=strClean($_REQUEST["id"]);
    if($obj_up->name == '' || $obj_up->department_id == '' || $obj_up->id == ''){
        echo "error_datos";
        return false;
    }
    $obj_up->update();
    echo "true_update";
    die();   
}else{
    $obj_up->name=strClean($_REQUEST["txt_title"]);
    $obj_up->department_id=strClean($_REQUEST["slt_dep"]);
    if($obj_up->name == '' || $obj_up->department_id == ''){
        echo "error_datos";
        return false;
    }
    $obj_up->create();
    echo "true_create";
    die();  
}

?>