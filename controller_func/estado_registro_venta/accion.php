<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/estado_registro_venta.php");
$obj_estado_registro_venta = new estado_registro_venta();
    if(isset($_REQUEST["accion"])){
        if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
            $obj_estado_registro_venta->id_estado_registro_venta=$_REQUEST["id"];
            $obj_estado_registro_venta->activar();
            echo "true_activado";
            die();
        }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
            $obj_estado_registro_venta->id_estado_registro_venta=$_REQUEST["id"];
            $obj_estado_registro_venta->desactivar();
            echo "true_desactivado";
            die();     
        }
    }  

    if($_REQUEST["id"]>0){

        $obj_estado_registro_venta->id_estado_registro_venta=intval($_REQUEST["id"]);
        $obj_estado_registro_venta->estado_registro_venta=strClean($_REQUEST["txt_estado_venta"]);
        $obj_estado_registro_venta->observacion=strClean($_REQUEST["txt_observacion"]);
        if ($obj_estado_registro_venta->estado_registro_venta == '' || $obj_estado_registro_venta->id_estado_registro_venta==0 ) {
         echo "error_datos";
         return false;
        }else{
            $obj_estado_registro_venta->update();
            echo "true_update";
            die();
        }

   }else{

        $obj_estado_registro_venta->estado_registro_venta=strClean($_REQUEST["txt_estado_venta"]);
        $obj_estado_registro_venta->observacion=strClean($_REQUEST["txt_observacion"]);
        if ($obj_estado_registro_venta->estado_registro_venta == '') {
                 echo "error_datos";
        } else {
            $obj_estado_registro_venta->create(); 
            echo "true_create";
            die();  
        }
  }