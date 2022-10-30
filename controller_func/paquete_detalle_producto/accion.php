
<?php
session_start();
require_once("../../helpers/helpers.php");
include_once("../../model_class/paquete_detalle_producto.php");
$obj_pp= new paquete_detalle_producto();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_pp->id_paquete_detalle_producto=intval(strClean($_REQUEST["id"]));
        $obj_pp->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_pp->id_paquete_detalle_producto=intval(strClean($_REQUEST["id"]));
        $obj_pp->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar Campaña ----*/
if($_REQUEST["id"]>0){
    // $obj_pp->userLogin = $_SESSION['idUser'];
    $obj_pp->id_paquete_detalle_producto=intval(strClean($_REQUEST["id"]));
    $obj_pp->id_paquete_cabecera_producto=strClean($_REQUEST["slt_paquete_producto"]);
    $obj_pp->id_producto= strClean($_REQUEST["slt_producto"]);
    $obj_pp->cantidad=strClean($_REQUEST["txt_cantidad"]);
    $obj_pp->precio_venta_unitario=strClean($_REQUEST["txt_precio_venta"]);
    $obj_pp->observacion=strClean($_REQUEST["txt_observacion"]);
    $obj_pp->id_usuarioregistro=$_SESSION['idUser'];
    $obj_pp->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_pp->id_paquete_cabecera_producto == '' || $obj_pp->id_producto == '' || $obj_pp->cantidad == '' || $obj_pp->precio_venta_unitario == '' 
    || $obj_pp->id_paquete_detalle_producto == ''){
        echo "error_datos";
        return false;
    }
    $obj_pp->update();
    echo "true_update";
    die(); 
}else{
    $obj_pp->id_paquete_cabecera_producto=strClean($_REQUEST["slt_paquete_producto"]);
    $obj_pp->id_producto= strClean($_REQUEST["slt_producto"]);
    $obj_pp->cantidad=strClean($_REQUEST["txt_cantidad"]);
    $obj_pp->precio_venta_unitario=strClean($_REQUEST["txt_precio_venta"]);
    $obj_pp->observacion=strClean($_REQUEST["txt_observacion"]);
    $obj_pp->id_usuarioregistro=$_SESSION['idUser'];
    $obj_pp->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_pp->id_paquete_cabecera_producto == '' || $obj_pp->id_producto == '' || $obj_pp->cantidad == '' || $obj_pp->precio_venta_unitario == '' ){
        echo "error_datos";
        return false;
    }
    $obj_pp->create();
    echo "true_create";
    die(); 
}

?>
