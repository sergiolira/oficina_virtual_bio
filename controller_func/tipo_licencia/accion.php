<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/tipo_licencia.php");
    $obj_tipo_lic= new tipo_licencia();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_tipo_lic->id_tipo_licencia=$_REQUEST["id"];
                 $obj_tipo_lic->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_tipo_lic->id_tipo_licencia=$_REQUEST["id"];
                 $obj_tipo_lic->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_tipo_lic->tipo_licencia=strClean($_REQUEST["txt_tipo_lic"]);
               
               $obj_tipo_lic->id_tipo_licencia=intval($_REQUEST["id"]);
               if ($obj_tipo_lic->tipo_licencia == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_tipo_lic->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_tipo_lic->tipo_licencia=strClean($_REQUEST["txt_tipo_lic"]);
               
               if ($obj_tipo_lic->tipo_licencia == '') {
                        echo "error_datos";
               } else {
                   $obj_tipo_lic->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>