
<?php
session_start();
require_once("../../helpers/helpers.php");
include_once("../../model_class/paquete_producto_cabecera.php");
$obj_pp= new paquete_producto_cabecera();

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_pp->id_paquete_producto_cabecera=intval(strClean($_REQUEST["id"]));
        $obj_pp->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_pp->id_paquete_producto_cabecera=intval(strClean($_REQUEST["id"]));
        $obj_pp->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar Campaña ----*/
if($_REQUEST["id"]>0){
    // $obj_pp->userLogin = $_SESSION['idUser'];
    $obj_pp->id_paquete_producto_cabecera=intval(strClean($_REQUEST["id"]));
    $obj_pp->nombre_paquete=strClean($_REQUEST["txt_paquete_producto"]);
    $obj_pp->precio_venta= strClean($_REQUEST["txt_precio_venta"]);
    $obj_pp->cantidad_productos=strClean($_REQUEST["txt_cantidad_producto"]);
    $obj_pp->observacion=strClean($_REQUEST["txt_observacion"]);
    $obj_pp->descripcion=strClean($_REQUEST["txt_descripcion"]);
    $obj_pp->id_usuarioregistro=$_SESSION['idUser'];
    $obj_pp->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_pp->nombre_paquete == '' || $obj_pp->precio_venta == '' || $obj_pp->cantidad_productos == '' || $obj_pp->descripcion == '' 
    || $obj_pp->id_paquete_producto_cabecera == ''){
        echo "error_datos";
        return false;
    }
    $obj_pp->update();
    echo "true_update";
    die(); 
}else{
    $obj_pp->nombre_paquete=strClean($_REQUEST["txt_paquete_producto"]);
    $obj_pp->precio_venta= strClean($_REQUEST["txt_precio_venta"]);
    $obj_pp->cantidad_productos=strClean($_REQUEST["txt_cantidad_producto"]);
    $obj_pp->observacion=strClean($_REQUEST["txt_observacion"]);
    $obj_pp->descripcion=strClean($_REQUEST["txt_descripcion"]);
    $obj_pp->id_usuarioregistro=$_SESSION['idUser'];
    $obj_pp->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_pp->nombre_paquete == '' || $obj_pp->precio_venta == '' || $obj_pp->cantidad_productos == '' || $obj_pp->descripcion == '' ){
        echo "error_datos";
        return false;
    }
    $obj_pp->create();
    echo "true_create";
    die(); 
}

?>
