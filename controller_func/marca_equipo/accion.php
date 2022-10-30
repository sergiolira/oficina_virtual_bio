<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/marca_equipo.php");
    $obj_marca_e= new marca_equipo();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_marca_e->id_marca_equipo=$_REQUEST["id"];
                 $obj_marca_e->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_marca_e->id_marca_equipo=$_REQUEST["id"];
                 $obj_marca_e->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_marca_e->marca_equipo=strClean($_REQUEST["txt_m_e"]);
               
               $obj_marca_e->id_marca_equipo=intval($_REQUEST["id"]);
               if ($obj_marca_e->marca_equipo == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_marca_e->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_marca_e->marca_equipo=strClean($_REQUEST["txt_m_e"]);
               
               if ($obj_marca_e->marca_equipo == '') {
                        echo "error_datos";
               } else {
                   $obj_marca_e->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>