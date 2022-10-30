<?php
   require_once("../helper.php");

   include_once("../../model_class/estado_conexion.php");
    $obj_conexion= new estado_conexion();

          /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_conexion->id_estado_conexion=$_REQUEST["id"];
                 $obj_conexion->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_conexion->id_estado_conexion=$_REQUEST["id"];
                 $obj_conexion->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar estado conexión ----*/
         if($_REQUEST["id"]>0){

               $obj_conexion->estado_conexion=strClean($_REQUEST["txt_econ"]);
               $obj_conexion->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_conexion->id_estado_conexion=intval($_REQUEST["id"]);
               if ($obj_conexion->estado_conexion == '') {
                echo "error_datos";
                return false;
               }else{
                   $obj_conexion->update();
                   echo "true_update";
                   die();
               }
         }else{
               $obj_conexion->estado_conexion=strClean($_REQUEST["txt_econ"]);
               $obj_conexion->observacion=strClean($_REQUEST["txt_obs"]);
               if ($obj_conexion->estado_conexion == '') {
                   echo "incorrectos";
               } else {
                 $obj_conexion->create(); 
                 echo "true_create"; 
           
               }
                die();
         }

?>