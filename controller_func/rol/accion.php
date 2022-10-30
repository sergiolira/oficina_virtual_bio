
<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/rol.php");
$obj_r= new rol();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_r->id_rol=intval(strClean($_REQUEST["id"]));
        $obj_r->activar();
        echo "true_activado";
        die(); 
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_r->id_rol=intval(strClean($_REQUEST["id"]));
        $obj_r->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar rol ----*/
if($_REQUEST["id"]>0){
    $obj_r->rol= strClean($_REQUEST["txt_rol"]);
    $obj_r->observacion= strClean($_REQUEST["txt_descrip"]);
    $obj_r->id_rol= intval(strClean($_REQUEST["id"]));
    if ($obj_r->rol == '' || $obj_r->rol == '') {
    echo "error_datos";
    return false;
    } else {
        $obj_r->update();
        echo "true_update";
        die(); 
    }

}else{
    $obj_r->rol= strClean($_REQUEST["txt_rol"]);
    $obj_r->observacion= strClean($_REQUEST["txt_descrip"]);

    if ($obj_r->rol == '' || $obj_r->rol == '') {
        echo "error_datos"; 
        return false;
    } else {
        $obj_r->create(); 
        echo "true_create";
        die();        
    }

}

?>