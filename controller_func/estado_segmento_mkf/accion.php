
<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/estado_segmento_mkf.php");
$obj_mkf= new estado_segmento_mkf();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_mkf->id_estado_segmento_mkf=intval(strClean($_REQUEST["id"]));
        $obj_mkf->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_mkf->id_estado_segmento_mkf=intval(strClean($_REQUEST["id"]));
        $obj_mkf->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar estado_segmento_mkf ----*/
if($_REQUEST["id"]>0){
    $obj_mkf->estado_segmento_mkf=strClean($_REQUEST["txt_mkf"]);
    $obj_mkf->observacion=strClean($_REQUEST["txt_obs"]);
    $obj_mkf->id_estado_segmento_mkf=intval(strClean($_REQUEST["id"]));
    if($obj_mkf->estado_segmento_mkf == '' || $obj_mkf->observacion == '' || $obj_mkf->id_estado_segmento_mkf == ''){
        echo "error_datos";
        return false;
    }
    $obj_mkf->update();
    echo "true_update";
    die(); 
}else{
    $obj_mkf->estado_segmento_mkf=strClean($_REQUEST["txt_mkf"]);
    $obj_mkf->observacion=strClean($_REQUEST["txt_obs"]);
    if($obj_mkf->estado_segmento_mkf == '' || $obj_mkf->observacion == ''){
        echo "error_datos";
        return false;
    }
    $obj_mkf->create();
    echo "true_create";
    die(); 
}

?>