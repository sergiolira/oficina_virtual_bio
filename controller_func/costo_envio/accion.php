<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/costo_envio.php");
$obj_costo_envio= new costo_envio();
    if(isset($_REQUEST["accion"])){
        if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
            $obj_costo_envio->id_costo_envio=$_REQUEST["id"];
            $obj_costo_envio->activar();
            echo "true_activado";
            die();
        }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
            $obj_costo_envio->id_costo_envio=$_REQUEST["id"];
            $obj_costo_envio->desactivar();
            echo "true_desactivado";
            die();     
        }
    }  

    if($_REQUEST["id"] && $_REQUEST["id"] ){

        $obj_costo_envio->id_costo_envio=intval($_REQUEST["id"]);
        $obj_costo_envio->id_departamento= strClean($_REQUEST["slt_departamendto_seleccionado"]);
        $obj_costo_envio->id_provincia= strClean($_REQUEST["slt_provincia_seleccionado"]);
        $obj_costo_envio->id_distrito= strClean($_REQUEST["slt_distrito_seleccionado"]);
        $obj_costo_envio->id_pais= strClean($_REQUEST["slt_pais_seleccionado"]);
        $obj_costo_envio->monto= strClean($_REQUEST["txt_monto"]);
        $obj_costo_envio->observacion=strClean($_REQUEST["txt_observacion"]);
        if ($obj_costo_envio->id_costo_envio==0) {
         echo "error_datos";
         return false;
        }else{
            $obj_costo_envio->update();
            echo "true_update";
            die();
        }

   }else{
        $obj_costo_envio->id_departamento= strClean($_REQUEST["slt_departamendto_seleccionado"]);
        $obj_costo_envio->id_provincia= strClean($_REQUEST["slt_provincia_seleccionado"]);
        $obj_costo_envio->id_distrito= strClean($_REQUEST["slt_distrito_seleccionado"]);
        $obj_costo_envio->id_pais= strClean($_REQUEST["slt_pais_seleccionado"]);
        $obj_costo_envio->monto= strClean($_REQUEST["txt_monto"]);
        $obj_costo_envio->observacion=strClean($_REQUEST["txt_observacion"]);
        if ($obj_costo_envio->id_departamento == 0 ) {
                 echo "error_datos";
        } else {
            $obj_costo_envio->create(); 
            echo "true_create";
            die();  
        }
  }