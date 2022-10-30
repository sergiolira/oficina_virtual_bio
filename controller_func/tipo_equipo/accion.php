<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/tipo_equipo.php");
    $obj_tipo_e= new tipo_equipo();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_tipo_e->id_tipo_equipo=$_REQUEST["id"];
                 $obj_tipo_e->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_tipo_e->id_tipo_equipo=$_REQUEST["id"];
                 $obj_tipo_e->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_tipo_e->tipo_equipo=strClean($_REQUEST["txt_tipo_e"]);
               
               $obj_tipo_e->id_tipo_equipo=intval($_REQUEST["id"]);
               if ($obj_tipo_e->tipo_equipo == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_tipo_e->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_tipo_e->tipo_equipo=strClean($_REQUEST["txt_tipo_e"]);
               
               if ($obj_tipo_e->tipo_equipo == '') {
                        echo "error_datos";
               } else {
                   $obj_tipo_e->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>