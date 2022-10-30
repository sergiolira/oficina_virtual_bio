<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/condicion_equipo.php");
    $obj_c_e= new condicion_equipo();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_c_e->id_condicion_equipo=$_REQUEST["id"];
                 $obj_c_e->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_c_e->id_condicion_equipo=$_REQUEST["id"];
                 $obj_c_e->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_c_e->condicion_equipo=strClean($_REQUEST["txt_c_e"]);
               
               $obj_c_e->id_condicion_equipo=intval($_REQUEST["id"]);
               if ($obj_c_e->condicion_equipo == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_c_e->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_c_e->condicion_equipo=strClean($_REQUEST["txt_c_e"]);
               
               if ($obj_c_e->condicion_equipo == '') {
                        echo "error_datos";
               } else {
                   $obj_c_e->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>