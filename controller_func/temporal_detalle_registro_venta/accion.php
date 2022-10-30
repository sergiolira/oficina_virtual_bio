<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/temporal_detalle_registro_venta.php");
$obj_temporal_detalle_registro_venta= new temporal_detalle_registro_venta();
    if(isset($_REQUEST["accion"])){
        if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
            $obj_temporal_detalle_registro_venta->id_temporal_detalle_registro_venta=$_REQUEST["id"];
            $obj_temporal_detalle_registro_venta->activar();
            echo "true_activado";
            die();
        }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
            $obj_temporal_detalle_registro_venta->id_temporal_detalle_registro_venta=$_REQUEST["id"];
            $obj_temporal_detalle_registro_venta->desactivar();
            echo "true_desactivado";
            die();     
        }
    }  

    if($_REQUEST["id"]>0){

        $obj_temporal_detalle_registro_venta->id_temporal_detalle_registro_venta=intval($_REQUEST["id"]);
        $obj_temporal_detalle_registro_venta->id_tipo_venta= strClean($_REQUEST["slt_tipo_venta"]);
        $obj_temporal_detalle_registro_venta->cantidad= strClean($_REQUEST["txt_cantidad"]);
        $obj_temporal_detalle_registro_venta->precio_unitario= strClean($_REQUEST["txt_precio_unitario"]);
        $obj_temporal_detalle_registro_venta->sub_total= strClean($_REQUEST["txt_sub_total"]);
        $obj_temporal_detalle_registro_venta->id_producto= strClean($_REQUEST["slt_producto"]);
        $obj_temporal_detalle_registro_venta->id_paquete= strClean($_REQUEST["slt_paquete"]);
        $obj_temporal_detalle_registro_venta->id_descuento_producto= strClean($_REQUEST["slt_descuento"]);
        $obj_temporal_detalle_registro_venta->observacion=strClean($_REQUEST["txt_observacion"]);
        if ($obj_temporal_detalle_registro_venta->id_temporal_detalle_registro_venta==0) {
         echo "error_datos";
         return false;
        }else{
            $obj_temporal_detalle_registro_venta->update();
            echo "true_update";
            die();
        }

   }else{
        $obj_temporal_detalle_registro_venta->nro_solicitud=date('dmy')."_".date('Hs')."_".rand(10,99);
        $obj_temporal_detalle_registro_venta->id_tipo_venta= strClean($_REQUEST["slt_tipo_venta"]);
        $obj_temporal_detalle_registro_venta->cantidad= strClean($_REQUEST["txt_cantidad"]);
        $obj_temporal_detalle_registro_venta->precio_unitario= strClean($_REQUEST["txt_precio_unitario"]);
        $obj_temporal_detalle_registro_venta->sub_total= strClean($_REQUEST["txt_sub_total"]);
        $obj_temporal_detalle_registro_venta->id_producto= strClean($_REQUEST["slt_producto"]);
        $obj_temporal_detalle_registro_venta->id_paquete= strClean($_REQUEST["slt_paquete"]);
        $obj_temporal_detalle_registro_venta->id_descuento_producto= strClean($_REQUEST["slt_descuento"]);
        $obj_temporal_detalle_registro_venta->observacion=strClean($_REQUEST["txt_observacion"]);
        if ($obj_temporal_detalle_registro_venta->id_tipo_venta ==0) {
                 echo "error_datos";
                 return false;
        } else {
            $obj_temporal_detalle_registro_venta->create(); 
            echo "true_create";
            die();  
        }
  }