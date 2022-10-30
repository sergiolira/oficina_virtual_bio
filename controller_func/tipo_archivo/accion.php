<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/tipo_archivo.php");
$obj_ar= new tipo_archivo();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_ar->id_tipo_archivo=intval(strClean($_REQUEST["id"]));
        $obj_ar->activar();
        echo "true_activado";
        die();  
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_ar->id_tipo_archivo=intval(strClean($_REQUEST["id"]));
        $obj_ar->desactivar();
        echo "true_desactivado";
        die();
    }
}
 
/*---- Crear y actualizar tipo de archivo ----*/
if($_REQUEST["id"]>0){
    $obj_ar->tipo_archivo= strClean($_REQUEST["txt_arch"]); 

    $obj_ar->observacion= strClean($_REQUEST["txt_obs"]);
    $obj_ar->id_tipo_archivo= intval(strClean($_REQUEST["id"]));
    if ($obj_ar->tipo_archivo == '' || $obj_ar->id_tipo_archivo == '') {
    echo "error_datos";
    return false;
    } else {
        $obj_ar->update();
        echo "true_update";
        die(); 
    }

}else{
    $obj_ar->tipo_archivo= strClean($_REQUEST["txt_arch"]);
    $obj_ar->observacion= strClean($_REQUEST["txt_obs"]);

    if ($obj_ar->tipo_archivo == '') {
        echo "error_datos"; 
        return false;
    } else {
        $obj_ar->create(); 
        echo "true_create";
        die();        
    }

}

?>