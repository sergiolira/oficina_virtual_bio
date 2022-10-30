<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/estado_programacion_charla.php");
    $obj_e_p_c= new estado_programacion_charla();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_e_p_c->id_estado_programacion_charla=$_REQUEST["id"];
                 $obj_e_p_c->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_e_p_c->id_estado_programacion_charla=$_REQUEST["id"];
                 $obj_e_p_c->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_e_p_c->estado_programacion_charla=strClean($_REQUEST["txt_e_p_c"]);
               
               $obj_e_p_c->id_estado_programacion_charla=intval($_REQUEST["id"]);
               if ($obj_e_p_c->estado_programacion_charla == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_e_p_c->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_e_p_c->estado_programacion_charla=strClean($_REQUEST["txt_e_p_c"]);
               
               if ($obj_e_p_c->estado_programacion_charla == '') {
                        echo "error_datos";
               } else {
                   $obj_e_p_c->create(); 
                   echo "true_create";  
               }

                die();
         }

?>