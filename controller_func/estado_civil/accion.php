
<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/estado_civil.php");
$obj_es= new estado_civil();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_es->id_estado_civil=intval(strClean($_REQUEST["id"]));
        $obj_es->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_es->id_estado_civil=intval(strClean($_REQUEST["id"]));
        $obj_es->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar forma de pago ----*/
if($_REQUEST["id"]>0){
    $obj_es->estado_civil=strClean($_REQUEST["txt_edo_civil"]);
    $obj_es->id_estado_civil=intval(strClean($_REQUEST["id"]));
    if($obj_es->estado_civil == '' || $obj_es->id_estado_civil == ''){
        echo "error_datos";
        return false;
    }
    $obj_es->update();
    echo "true_update";
    die(); 
}else{
    $obj_es->estado_civil=strClean($_REQUEST["txt_edo_civil"]);
    if($obj_es->estado_civil == '' ){
        echo "error_datos";
        return false;
    }
    $obj_es->create();
    echo "true_create";
    die(); 
}

?>