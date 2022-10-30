<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/marca_comercial.php");
    $obj_marca= new marca_comercial();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_marca->id_marca_comercial=$_REQUEST["id"];
                 $obj_marca->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_marca->id_marca_comercial=$_REQUEST["id"];
                 $obj_marca->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_marca->marca_comercial=strClean($_REQUEST["txt_mco"]);
               $obj_marca->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_marca->id_marca_comercial=intval($_REQUEST["id"]);
               if ($obj_marca->marca_comercial == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_marca->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_marca->marca_comercial=strClean($_REQUEST["txt_mco"]);
               $obj_marca->observacion=strClean($_REQUEST["txt_obs"]);
               if ($obj_marca->marca_comercial == '') {
                        echo "error_datos";
               } else {
                   $obj_marca->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>