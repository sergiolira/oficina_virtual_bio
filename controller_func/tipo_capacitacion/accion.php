<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/tipo_capacitacion.php");
    $obj_t_c= new tipo_capacitacion();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_t_c->id_tipo_capacitacion=$_REQUEST["id"];
                 $obj_t_c->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_t_c->id_tipo_capacitacion=$_REQUEST["id"];
                 $obj_t_c->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_t_c->tipo_capacitacion=strClean($_REQUEST["txt_t_c"]);
               
               $obj_t_c->id_tipo_capacitacion=intval($_REQUEST["id"]);
               if ($obj_t_c->tipo_capacitacion == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_t_c->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_t_c->tipo_capacitacion=strClean($_REQUEST["txt_t_c"]);
               
               if ($obj_t_c->tipo_capacitacion == '') {
                        echo "error_datos";
               } else {
                   $obj_t_c->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>