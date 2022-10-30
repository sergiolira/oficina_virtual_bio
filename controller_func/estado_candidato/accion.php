<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/estado_candidato.php");
    $obj_e_can= new estado_candidato();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_e_can->id_estado_candidato=$_REQUEST["id"];
                 $obj_e_can->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_e_can->id_estado_candidato=$_REQUEST["id"];
                 $obj_e_can->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_e_can->estado_candidato=strClean($_REQUEST["txt_e_can"]);
               
               $obj_e_can->id_estado_candidato=intval($_REQUEST["id"]);
               if ($obj_e_can->estado_candidato == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_e_can->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_e_can->estado_candidato=strClean($_REQUEST["txt_e_can"]);
               
               if ($obj_e_can->estado_candidato == '') {
                        echo "error_datos";
               } else {
                   $obj_e_can->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>