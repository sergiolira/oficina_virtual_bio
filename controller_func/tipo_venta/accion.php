<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/tipo_venta.php");
$obj_tipo_venta= new tipo_venta();
    if(isset($_REQUEST["accion"])){
        if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
            $obj_tipo_venta->id_tipo_venta=$_REQUEST["id"];
            $obj_tipo_venta->activar();
            echo "true_activado";
            die();
        }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
            $obj_tipo_venta->id_tipo_venta=$_REQUEST["id"];
            $obj_tipo_venta->desactivar();
            echo "true_desactivado";
            die();     
        }
    }  
    if($_REQUEST["id"]>0){
        $obj_tipo_venta->id_tipo_venta=intval($_REQUEST["id"]);
        $obj_tipo_venta->tipo_venta=strClean($_REQUEST["txt_tipo_venta"]);
        $obj_tipo_venta->observacion=strClean($_REQUEST["txt_observacion"]);
        if ($obj_tipo_venta->tipo_venta == '' || $obj_tipo_venta->id_tipo_venta==0 ) {
         echo "error_datos";
         return false;
        }else{
            $obj_tipo_venta->update();
            echo "true_update";
            die();
        }
   }else{
        $obj_tipo_venta->tipo_venta=strClean($_REQUEST["txt_tipo_venta"]);
        $obj_tipo_venta->observacion=strClean($_REQUEST["txt_observacion"]);
        if ($obj_tipo_venta->tipo_venta == '') {
                 echo "error_datos";
        } else {
            $obj_tipo_venta->create(); 
            echo "true_create";
            die();  
        }
        
  }