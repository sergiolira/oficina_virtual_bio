<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/estado_charla_candidato.php");
    $obj_e_c_can= new estado_charla_candidato();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_e_c_can->id_estado_charla_candidato=$_REQUEST["id"];
                 $obj_e_c_can->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_e_c_can->id_estado_charla_candidato=$_REQUEST["id"];
                 $obj_e_c_can->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_e_c_can->estado_charla_candidato=strClean($_REQUEST["txt_e_c_can"]);
               
               $obj_e_c_can->id_estado_charla_candidato=intval($_REQUEST["id"]);
               if ($obj_e_c_can->estado_charla_candidato == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_e_c_can->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_e_c_can->estado_charla_candidato=strClean($_REQUEST["txt_e_c_can"]);
               
               if ($obj_e_c_can->estado_charla_candidato == '') {
                        echo "error_datos";
               } else {
                   $obj_e_c_can->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>