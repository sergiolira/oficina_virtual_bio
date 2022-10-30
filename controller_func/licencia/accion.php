<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/licencia.php");
    $obj_lic= new licencia();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_lic->id_licencia=$_REQUEST["id"];
                 $obj_lic->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_lic->id_licencia=$_REQUEST["id"];
                 $obj_lic->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_lic->licencia=strClean($_REQUEST["txt_lic"]);
               $obj_lic->id_tipo_licencia=strClean($_REQUEST["slt_t_lic"]);
               $obj_lic->codigo=strClean($_REQUEST["txt_cod"]);
               $obj_lic->stock=strClean($_REQUEST["txt_stock"]);
               $obj_lic->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_lic->id_licencia=intval($_REQUEST["id"]);
               if ($obj_lic->licencia == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_lic->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_lic->licencia=strClean($_REQUEST["txt_lic"]);
               $obj_lic->id_tipo_licencia=strClean($_REQUEST["slt_t_lic"]);
               $obj_lic->codigo=strClean($_REQUEST["txt_cod"]);
               $obj_lic->stock=strClean($_REQUEST["txt_stock"]);
               $obj_lic->observacion=strClean($_REQUEST["txt_obs"]);
               if ($obj_lic->licencia == '') {
                        echo "error_datos";
               } else {
                   $obj_lic->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>