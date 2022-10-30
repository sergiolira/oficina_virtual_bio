<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/estado_contrato.php");
    $obj_e_con= new estado_contrato();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_e_con->id_estado_contrato=$_REQUEST["id"];
                 $obj_e_con->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_e_con->id_estado_contrato=$_REQUEST["id"];
                 $obj_e_con->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_e_con->estado_contrato=strClean($_REQUEST["txt_e_con"]);
               
               $obj_e_con->id_estado_contrato=intval($_REQUEST["id"]);
               if ($obj_e_con->estado_contrato == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_e_con->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_e_con->estado_contrato=strClean($_REQUEST["txt_e_con"]);
               
               if ($obj_e_con->estado_contrato == '') {
                        echo "error_datos";
               } else {
                   $obj_e_con->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>