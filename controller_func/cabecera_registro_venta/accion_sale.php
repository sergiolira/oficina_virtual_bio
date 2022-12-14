<?php
session_start();
setlocale(LC_ALL,"es_ES@euro","es_PE","esp");
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, 'es_PE.utf8');
require_once("../../helpers/helpers.php");
include_once("../../model_class/cabecera_registro_venta.php");
include_once("../../model_class/detalle_registro_venta.php");
include_once("../../model_class/representante.php");
$obj_cabecera_registro_venta= new cabecera_registro_venta();
$obj_detalle_registro_venta= new detalle_registro_venta();
$obj_representante= new representante();

    if(isset($_REQUEST["accion"])){
        if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
            $obj_cabecera_registro_venta->nro_solicitud=$_REQUEST["id"];
            $obj_detalle_registro_venta->nro_solicitud=$_REQUEST["id"];
            $obj_detalle_registro_venta->activar();
            $obj_cabecera_registro_venta->activar();
            echo "true_activado";
            die();  
        }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
            $obj_cabecera_registro_venta->nro_solicitud=$_REQUEST["id"];
            $obj_detalle_registro_venta->nro_solicitud=$_REQUEST["id"];
            $obj_detalle_registro_venta->desactivar();
            $obj_cabecera_registro_venta->desactivar();
            echo "true_desactivado";
            die();     
        }
    }  

    if($_REQUEST["id"]!=0){
        $obj_detalle_registro_venta->nro_solicitud=$_REQUEST["id"];
        $obj_detalle_registro_venta->id_tipo_venta=strClean($_REQUEST["slt_tipo_venta"]);
        $obj_detalle_registro_venta->id_paquete=strClean($_REQUEST["slt_paquete"]);
        $obj_detalle_registro_venta->id_producto=strClean($_REQUEST["slt_producto"]);
        if(strClean($_REQUEST["slt_tipo_venta"]==1)){
            $obj_detalle_registro_venta->cantidad=strClean($_REQUEST["txt_cantidad"]);
        }else{
            $obj_detalle_registro_venta->cantidad=1;            
            switch (strClean($_REQUEST["slt_paquete"])) {
                case '1':
                    $obj_representante->tipo_compra="PAQUETE";
                    $obj_representante->descuento_x_registro="10";
                    break;
                case '2':
                    $obj_representante->tipo_compra="PAQUETE";
                    $obj_representante->descuento_x_registro="15";
                    break;
                case '3':
                    $obj_representante->tipo_compra="PAQUETE";
                    $obj_representante->descuento_x_registro="30";
                    break;
                case '4':
                    $obj_representante->tipo_compra="PAQUETE";
                    $obj_representante->descuento_x_registro="40";
                    break;
                case '5':
                    $obj_representante->tipo_compra="PAQUETE";
                    $obj_representante->descuento_x_registro="45";
                    break;            
                default:
                    $obj_representante->tipo_compra="PAQUETE";
                    $obj_representante->descuento_x_registro="0";
                    break;
            }
            $obj_representante->nro_documento=strClean($_REQUEST["txt_numero_documento"]);
            $obj_representante->update_descuento_x_paquete();
           
        }
        
        $obj_detalle_registro_venta->precio_unitario=strClean($_REQUEST["txt_precio_unitario"]);
        $obj_detalle_registro_venta->id_descuento_producto=1;
        $obj_detalle_registro_venta->descuento_por_volumen_producto=strClean($_REQUEST["txt_desc_x_vol"]);
        $obj_detalle_registro_venta->descuento_por_nro_documento=strClean($_REQUEST["txt_des_x_cli"]);
        $obj_detalle_registro_venta->sub_total=strClean($_REQUEST["txt_precio_unitario"])*$obj_detalle_registro_venta->cantidad;
        $obj_detalle_registro_venta->observacion=strClean($_REQUEST["txt_observacion"]);
        $obj_detalle_registro_venta->update();
        /**Cabecera */
        $obj_cabecera_registro_venta->nro_solicitud=$_REQUEST["id"];
        $obj_cabecera_registro_venta->fecha_pedido= strClean($_REQUEST["txt_fecha_pedido"]);
        if(isset($_REQUEST["txt_fecha_entrega"])){
            $obj_cabecera_registro_venta->fecha_entrega= strClean($_REQUEST["txt_fecha_entrega"]);
        }else{
            $obj_cabecera_registro_venta->fecha_entrega= "1900-01-01";
        }
        
        $obj_cabecera_registro_venta->correo= strClean($_REQUEST["txt_correo_cli"]);
        $obj_cabecera_registro_venta->nro_documento= strClean($_REQUEST["txt_numero_documento"]);
        $obj_cabecera_registro_venta->patrocinador= strClean($_REQUEST["txt_patrocinador"]);
        $obj_cabecera_registro_venta->patrocinador_directo= strClean($_REQUEST["txt_patrocinador_directo"]);
        $obj_cabecera_registro_venta->tipo_cliente=strClean($_REQUEST["slt_tipo_cliente"]);
        $obj_cabecera_registro_venta->id_pais=strClean($_REQUEST["slt_pais_seleccionado"]);
        $obj_cabecera_registro_venta->id_departamento=strClean($_REQUEST["slt_departamento_seleccionado"]);
        $obj_cabecera_registro_venta->id_provincia=strClean($_REQUEST["slt_provincia_seleccionado"]);
        $obj_cabecera_registro_venta->id_distrito=strClean($_REQUEST["slt_distrito_seleccionado"]);
        $obj_cabecera_registro_venta->direccion=strClean($_REQUEST["txt_direccion"]);
        $obj_cabecera_registro_venta->referencia=strClean($_REQUEST["txt_referencia"]);
        $obj_cabecera_registro_venta->enlace_ubigeo=strClean($_REQUEST["txt_enlace_ubigeo"]);
        $obj_cabecera_registro_venta->id_estado_registro_venta=strClean($_REQUEST["slt_estado_registro_venta"]);
        $obj_cabecera_registro_venta->total_descuento=strClean($_REQUEST["txt_desc_x_vol"])+strClean($_REQUEST["txt_des_x_cli"]);
        $obj_cabecera_registro_venta->impuesto=0;
        $obj_cabecera_registro_venta->costo_envio=strClean($_REQUEST["txt_costo_envio"]);
        $obj_cabecera_registro_venta->total=$obj_detalle_registro_venta->sub_total-($obj_detalle_registro_venta->sub_total*($obj_cabecera_registro_venta->total_descuento/100))+strClean($_REQUEST["txt_costo_envio"]);
        $obj_cabecera_registro_venta->observacion=strClean($_REQUEST["txt_observacion"]);

        if(strClean($_REQUEST["slt_estado_registro_venta"])==8){
            $obj_representante->nro_documento=strClean($_REQUEST["txt_numero_documento"]);
            $obj_representante->activate_x_nro_documento();
        }
        
        $obj_cabecera_registro_venta->update();
        echo "true_update";
        die();
   }else{
        $nro_solicitud = generatestring();
        /**Detalle */
        $obj_detalle_registro_venta->nro_solicitud=$nro_solicitud;
        $obj_detalle_registro_venta->id_tipo_venta=strClean($_REQUEST["slt_tipo_venta"]);
        $obj_detalle_registro_venta->id_paquete=strClean($_REQUEST["slt_paquete"]);
        $obj_detalle_registro_venta->id_producto=strClean($_REQUEST["slt_producto"]);
        if(strClean($_REQUEST["slt_tipo_venta"]==1)){
            $obj_detalle_registro_venta->cantidad=strClean($_REQUEST["txt_cantidad"]);
        }else{
            $obj_detalle_registro_venta->cantidad=1;
            switch (strClean($_REQUEST["slt_paquete"])) {
                case '1':
                    $obj_representante->tipo_compra="PAQUETE";
                    $obj_representante->descuento_x_registro="10";
                    break;
                case '2':
                    $obj_representante->tipo_compra="PAQUETE";
                    $obj_representante->descuento_x_registro="15";
                    break;
                case '3':
                    $obj_representante->tipo_compra="PAQUETE";
                    $obj_representante->descuento_x_registro="30";
                    break;
                case '4':
                    $obj_representante->tipo_compra="PAQUETE";
                    $obj_representante->descuento_x_registro="40";
                    break;
                case '5':
                    $obj_representante->tipo_compra="PAQUETE";
                    $obj_representante->descuento_x_registro="45";
                    break;            
                default:
                    $obj_representante->tipo_compra="PAQUETE";
                    $obj_representante->descuento_x_registro="0";
                    break;
            }

            $obj_representante->nro_documento=strClean($_REQUEST["txt_numero_documento"]);
            $obj_representante->update_descuento_x_paquete();
        }
        
        $obj_detalle_registro_venta->precio_unitario=strClean($_REQUEST["txt_precio_unitario"]);
        $obj_detalle_registro_venta->id_descuento_producto=1;
        $obj_detalle_registro_venta->descuento_por_volumen_producto=strClean($_REQUEST["txt_desc_x_vol"]);
        $obj_detalle_registro_venta->descuento_por_nro_documento=strClean($_REQUEST["txt_des_x_cli"]);
        $obj_detalle_registro_venta->sub_total=strClean($_REQUEST["txt_precio_unitario"])*$obj_detalle_registro_venta->cantidad;
        $obj_detalle_registro_venta->observacion=strClean($_REQUEST["txt_observacion"]);
        $obj_detalle_registro_venta->create();
        /**Cabecera */
        $obj_cabecera_registro_venta->nro_solicitud=$nro_solicitud;
        $obj_cabecera_registro_venta->fecha_pedido= strClean($_REQUEST["txt_fecha_pedido"]);
        if(isset($_REQUEST["txt_fecha_entrega"])){
            $obj_cabecera_registro_venta->fecha_entrega= strClean($_REQUEST["txt_fecha_entrega"]);
        }else{
            $obj_cabecera_registro_venta->fecha_entrega= "1900-01-01";
        }
        $obj_cabecera_registro_venta->correo= strClean($_REQUEST["txt_correo_cli"]);
        $obj_cabecera_registro_venta->nro_documento= strClean($_REQUEST["txt_numero_documento"]);
        $obj_cabecera_registro_venta->patrocinador= strClean($_REQUEST["txt_patrocinador"]);
        $obj_cabecera_registro_venta->patrocinador_directo= strClean($_REQUEST["txt_patrocinador_directo"]);
        $obj_cabecera_registro_venta->tipo_cliente=strClean($_REQUEST["slt_tipo_cliente"]);
        $obj_cabecera_registro_venta->id_pais=strClean($_REQUEST["slt_pais_seleccionado"]);
        $obj_cabecera_registro_venta->id_departamento=strClean($_REQUEST["slt_departamento_seleccionado"]);
        $obj_cabecera_registro_venta->id_provincia=strClean($_REQUEST["slt_provincia_seleccionado"]);
        $obj_cabecera_registro_venta->id_distrito=strClean($_REQUEST["slt_distrito_seleccionado"]);
        $obj_cabecera_registro_venta->direccion=strClean($_REQUEST["txt_direccion"]);
        $obj_cabecera_registro_venta->referencia=strClean($_REQUEST["txt_referencia"]);
        $obj_cabecera_registro_venta->enlace_ubigeo=strClean($_REQUEST["txt_enlace_ubigeo"]);
        $obj_cabecera_registro_venta->id_estado_registro_venta=strClean($_REQUEST["slt_estado_registro_venta"]);
        $obj_cabecera_registro_venta->total_descuento=strClean($_REQUEST["txt_desc_x_vol"])+strClean($_REQUEST["txt_des_x_cli"]);
        $obj_cabecera_registro_venta->impuesto=0;
        $obj_cabecera_registro_venta->costo_envio=strClean($_REQUEST["txt_costo_envio"]);
        $obj_cabecera_registro_venta->total=$obj_detalle_registro_venta->sub_total-($obj_detalle_registro_venta->sub_total*($obj_cabecera_registro_venta->total_descuento/100))+strClean($_REQUEST["txt_costo_envio"]);
        $obj_cabecera_registro_venta->observacion=strClean($_REQUEST["txt_observacion"]);
        if(strClean($_REQUEST["slt_estado_registro_venta"])==8){
            $obj_representante->nro_documento=strClean($_REQUEST["txt_numero_documento"]);
            $obj_representante->activate_x_nro_documento();
        }
        $obj_cabecera_registro_venta->create(); 
        echo "true_create";
        die();  
        
  }