<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/entidad_bancaria.php");
    $obj_e_ban= new entidad_bancaria();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_e_ban->id_entidad_bancaria=$_REQUEST["id"];
                 $obj_e_ban->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_e_ban->id_entidad_bancaria=$_REQUEST["id"];
                 $obj_e_ban->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_e_ban->entidad_bancaria=strClean($_REQUEST["txt_e_ban"]);
               
               $obj_e_ban->id_entidad_bancaria=intval($_REQUEST["id"]);
               if ($obj_e_ban->entidad_bancaria == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_e_ban->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_e_ban->entidad_bancaria=strClean($_REQUEST["txt_e_ban"]);
               
               if ($obj_e_ban->entidad_bancaria == '') {
                        echo "error_datos";
               } else {
                   $obj_e_ban->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>