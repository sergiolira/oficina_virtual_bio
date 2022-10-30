<?php
session_start();
require_once("../../helpers/helpers.php");
include_once("../../model_class/producto.php");
include_once("../../model_class/imagen_producto.php");
$obj_c= new producto();
$obj_im= new imagen_producto();

if(isset($_REQUEST["foto"])){
    if($_REQUEST["id"]>0 && $_REQUEST["foto"]=="eliminar"){
        $obj_im->id_imagen_producto=intval(strClean($_REQUEST["id"]));
        $obj_im->desactivar_foto();
        echo "true_eliminado";
        die();
    }
}

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_c->id_producto=intval(strClean($_REQUEST["id"]));
        $obj_c->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_c->id_producto=intval(strClean($_REQUEST["id"]));
        $obj_c->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar Campaña ----*/
if($_REQUEST["id"]>0){
    // $obj_c->userLogin = $_SESSION['idUser'];
    $obj_c->id_producto=intval(strClean($_REQUEST["id"]));
    $obj_c->nombre_producto=strClean($_REQUEST["txt_Nombre_producto"]);
    $obj_c->descripcion_producto= strClean($_REQUEST["txt_rep"]);
    $obj_c->stock_inicial=strClean($_REQUEST["txt_stock"]);
    $obj_c->stock_actual=strClean($_REQUEST["txt_stock"]);
    $obj_c->precio_venta_nuevo=strClean($_REQUEST["txt_precio_nuevo"]);
    $obj_c->precio_venta_anterior=strClean($_REQUEST["txt_precio_anterior"]);
    $obj_c->precio_compra=strClean($_REQUEST["txt_precio_nuevo"]);
    $obj_c->descuento=strClean($_REQUEST["txt_descuento"]);;
    $obj_c->ganancia=0;
    $obj_c->peso=strClean($_REQUEST["txt_peso"]);
    $obj_c->codigo_barra=strClean($_REQUEST["txt_codigo_barra"]);
    $obj_c->codigo_qr=strClean($_REQUEST["txt_codigo_barra"]);
    $obj_c->puntos_x_venta=strClean($_REQUEST["txt_puntos_x_venta"]);
    $obj_c->comision_x_venta=strClean($_REQUEST["txt_comision_x_venta"]);
    $obj_c->id_tipo_producto=strClean($_REQUEST["slt_tipo_producto"]);
    $obj_c->id_categoria_producto=strClean($_REQUEST["slt_cp"]);
    $obj_c->id_sub_categoria_producto=strClean($_REQUEST["slt_scp"]);
    $obj_c->id_marca_producto=strClean($_REQUEST["slt_marca_producto"]);
    $obj_c->id_unidad_medida=strClean($_REQUEST["slt_tipo_peso"]);
    $obj_c->id_divisa=strClean($_REQUEST["slt_divisa"]);
    $obj_c->observacion="";
    $obj_c->id_usuarioregistro=$_SESSION['idUser'];
    $obj_c->id_usuarioactualiza=$_SESSION['idUser'];
    if($obj_c->id_producto == '' || $obj_c->nombre_producto == '' || $obj_c->descripcion_producto == '' || $obj_c->stock_actual == '' 
    || $obj_c->precio_venta_nuevo == '' || $obj_c->precio_venta_anterior == '' || $obj_c->precio_compra == '' ){
        echo "error_datos";
        return false;
    }
    $obj_c->update();
    echo "true_update";
    die(); 
}else{
    // $obj_c->id_producto=intval(strClean($_REQUEST["id"]));
    $obj_c->nombre_producto=strClean($_REQUEST["txt_Nombre_producto"]);
    $obj_c->descripcion_producto= strClean($_REQUEST["txt_rep"]);
    $obj_c->stock_inicial=strClean($_REQUEST["txt_stock"]);
    $obj_c->stock_actual=strClean($_REQUEST["txt_stock"]);
    $obj_c->precio_venta_nuevo=strClean($_REQUEST["txt_precio_nuevo"]);
    $obj_c->precio_venta_anterior=strClean($_REQUEST["txt_precio_anterior"]);
    $obj_c->precio_compra=strClean($_REQUEST["txt_precio_nuevo"]);
    $obj_c->descuento=strClean($_REQUEST["txt_descuento"]);
    $obj_c->ganancia=0;
    $obj_c->peso=strClean($_REQUEST["txt_peso"]);
    $obj_c->codigo_barra=strClean($_REQUEST["txt_codigo_barra"]);
    $obj_c->codigo_qr=strClean($_REQUEST["txt_codigo_barra"]);
    $obj_c->puntos_x_venta=strClean($_REQUEST["txt_puntos_x_venta"]);
    $obj_c->comision_x_venta=strClean($_REQUEST["txt_comision_x_venta"]);
    $obj_c->id_tipo_producto=strClean($_REQUEST["slt_tipo_producto"]);
    $obj_c->id_categoria_producto=strClean($_REQUEST["slt_cp"]);
    $obj_c->id_sub_categoria_producto=strClean($_REQUEST["slt_scp"]);
    $obj_c->id_marca_producto=strClean($_REQUEST["slt_marca_producto"]);
    $obj_c->id_unidad_medida=strClean($_REQUEST["slt_tipo_peso"]);
    $obj_c->id_divisa=strClean($_REQUEST["slt_divisa"]);
    $obj_c->observacion="";
    $obj_c->id_usuarioregistro=$_SESSION['idUser'];
    $obj_c->id_usuarioactualiza=$_SESSION['idUser'];

    if($obj_c->nombre_producto == '' || $obj_c->descripcion_producto == '' || $obj_c->stock_actual == '' 
    || $obj_c->precio_venta_nuevo == '' || $obj_c->precio_venta_anterior == '' || $obj_c->precio_compra == '' ){
        echo "error_datos";
        return false;
    }
    $obj_c->create();
    echo "true_create";
    die(); 
}

?>
