<?php

   require_once("../../helpers/helpers.php");
   include_once("../../model_class/frecuencia.php");
    $obj_frecuencia= new frecuencia();

         /*---- Activar y desactivar Estado ----*/
         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_frecuencia->id_frecuencia=$_REQUEST["id"];
                 $obj_frecuencia->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_frecuencia->id_frecuencia=$_REQUEST["id"];
                 $obj_frecuencia->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_frecuencia->frecuencia=strClean($_REQUEST["txt_frec"]);
               $obj_frecuencia->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_frecuencia->id_frecuencia=intval($_REQUEST["id"]);
               if ($obj_frecuencia->frecuencia == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_frecuencia->update();
                   echo "true_update";
                   die();
               }
         }
        else
        {
          $obj_frecuencia->frecuencia=strClean($_REQUEST["txt_frec"]);
          $obj_frecuencia->observacion=strClean($_REQUEST["txt_obs"]);
          if ($obj_frecuencia->frecuencia == '' ) {
                   echo "error_datos";
          } else {
              $obj_frecuencia->create(); 
              echo "true_create"; 
              
          }
                die();
         }

?>