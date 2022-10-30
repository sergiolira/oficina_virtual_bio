<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/cabecera_registro_venta.php");
$obj_cabecera_registro_venta= new cabecera_registro_venta();
    if(isset($_REQUEST["accion"])){
        if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
            $obj_cabecera_registro_venta->id_cabecera_registro_venta=$_REQUEST["id"];
            $obj_cabecera_registro_venta->activar();
            echo "true_activado";
            die();
        }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
            $obj_cabecera_registro_venta->id_cabecera_registro_venta=$_REQUEST["id"];
            $obj_cabecera_registro_venta->desactivar();
            echo "true_desactivado";
            die();     
        }
    }  

    if($_REQUEST["id"]>0){
        $obj_cabecera_registro_venta->id_cabecera_registro_venta=intval($_REQUEST["id"]);
        $obj_cabecera_registro_venta->fecha_pedido= strClean($_REQUEST["txt_fecha_pedido"]);
        $obj_cabecera_registro_venta->fecha_entrega= strClean($_REQUEST["txt_fecha_entrega"]);
        $obj_cabecera_registro_venta->correo= strClean($_REQUEST["txt_correo"]);
        $obj_cabecera_registro_venta->nro_documento= strClean($_REQUEST["txt_numero_documento"]);
        $obj_cabecera_registro_venta->tipo_cliente=strClean($_REQUEST["txt_tipo_cliente"]);
        $obj_cabecera_registro_venta->id_pais=strClean($_REQUEST["slt_pais_seleccionado"]);
        $obj_cabecera_registro_venta->id_departamento=strClean($_REQUEST["slt_departamento_seleccionado"]);
        $obj_cabecera_registro_venta->id_provincia=strClean($_REQUEST["slt_provincia_seleccionado"]);
        $obj_cabecera_registro_venta->id_distrito=strClean($_REQUEST["slt_distrito_seleccionado"]);
        $obj_cabecera_registro_venta->direccion=strClean($_REQUEST["txt_direccion"]);
        $obj_cabecera_registro_venta->referencia=strClean($_REQUEST["txt_referencia"]);
        $obj_cabecera_registro_venta->enlace_ubigeo=strClean($_REQUEST["txt_enlace_ubigeo"]);
        $obj_cabecera_registro_venta->id_estado_registro_venta=strClean($_REQUEST["slt_estado_registro_venta"]);
        $obj_cabecera_registro_venta->total_descuento=strClean($_REQUEST["txt_total_descuento"]);
        $obj_cabecera_registro_venta->impuesto=strClean($_REQUEST["txt_impuesto"]);
        $obj_cabecera_registro_venta->costo_envio=strClean($_REQUEST["txt_costo_envio"]);
        $obj_cabecera_registro_venta->total=strClean($_REQUEST["txt_total"]);
        $obj_cabecera_registro_venta->observacion=strClean($_REQUEST["txt_observacion"]);
        if ($obj_cabecera_registro_venta->id_cabecera_registro_venta==0) {
         echo "error_datos";
         return false;
        }else{
            $obj_cabecera_registro_venta->update();
            echo "true_update";
            die();
        }
   }else{
        $obj_cabecera_registro_venta->nro_solicitud=date('dmy')."_".date('Hs')."_".rand(10,99);
        $obj_cabecera_registro_venta->fecha_pedido= strClean($_REQUEST["txt_fecha_pedido"]);
        $obj_cabecera_registro_venta->fecha_entrega= strClean($_REQUEST["txt_fecha_entrega"]);
        $obj_cabecera_registro_venta->correo= strClean($_REQUEST["txt_correo"]);
        $obj_cabecera_registro_venta->nro_documento= strClean($_REQUEST["txt_numero_documento"]);
        $obj_cabecera_registro_venta->tipo_cliente=strClean($_REQUEST["txt_tipo_cliente"]);
        $obj_cabecera_registro_venta->id_pais=strClean($_REQUEST["slt_pais_seleccionado"]);
        $obj_cabecera_registro_venta->id_departamento=strClean($_REQUEST["slt_departamento_seleccionado"]);
        $obj_cabecera_registro_venta->id_provincia=strClean($_REQUEST["slt_provincia_seleccionado"]);
        $obj_cabecera_registro_venta->id_distrito=strClean($_REQUEST["slt_distrito_seleccionado"]);
        $obj_cabecera_registro_venta->direccion=strClean($_REQUEST["txt_direccion"]);
        $obj_cabecera_registro_venta->referencia=strClean($_REQUEST["txt_referencia"]);
        $obj_cabecera_registro_venta->enlace_ubigeo=strClean($_REQUEST["txt_enlace_ubigeo"]);
        $obj_cabecera_registro_venta->id_estado_registro_venta=strClean($_REQUEST["slt_estado_registro_venta"]);
        $obj_cabecera_registro_venta->total_descuento=strClean($_REQUEST["txt_total_descuento"]);
        $obj_cabecera_registro_venta->impuesto=strClean($_REQUEST["txt_impuesto"]);
        $obj_cabecera_registro_venta->costo_envio=strClean($_REQUEST["txt_costo_envio"]);
        $obj_cabecera_registro_venta->total=strClean($_REQUEST["txt_total"]);
        $obj_cabecera_registro_venta->observacion=strClean($_REQUEST["txt_observacion"]);
        if ($obj_cabecera_registro_venta->fecha_pedido ==0) {
                 echo "error_datos";
                 return false;
        } else {
            $obj_cabecera_registro_venta->create(); 
            echo "true_create";
            die();  
        }
  }