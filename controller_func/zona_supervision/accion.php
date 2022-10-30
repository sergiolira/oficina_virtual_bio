<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/zona_supervision.php");
    $obj_z_sup= new zona_supervision();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_z_sup->id_zona_supervision=$_REQUEST["id"];
                 $obj_z_sup->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_z_sup->id_zona_supervision=$_REQUEST["id"];
                 $obj_z_sup->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_z_sup->zona_supervision=strClean($_REQUEST["txt_z_sup"]);
               
               $obj_z_sup->id_zona_supervision=intval($_REQUEST["id"]);
               if ($obj_z_sup->zona_supervision == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_z_sup->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_z_sup->zona_supervision=strClean($_REQUEST["txt_z_sup"]);
               
               if ($obj_z_sup->zona_supervision == '') {
                        echo "error_datos";
               } else {
                   $obj_z_sup->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>