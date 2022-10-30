<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/web_red_social.php");
    $obj_wrs= new web_red_social();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_wrs->id_web_red_social=$_REQUEST["id"];
                 $obj_wrs->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_wrs->id_web_red_social=$_REQUEST["id"];
                 $obj_wrs->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){
               
               $obj_wrs->web_red_social=strClean($_REQUEST["txt_wrs"]);
               $obj_wrs->icono=strClean($_REQUEST["txt_icono"]);
               $obj_wrs->enlace=strClean($_REQUEST["txt_enlace"]);
               $obj_wrs->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_wrs->id_web_red_social=intval($_REQUEST["id"]);
               if ($obj_wrs->web_red_social == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_wrs->update();
                   echo "true_update";
                   die();
               }
          }else{
                $obj_wrs->web_red_social=strClean($_REQUEST["txt_wrs"]);
                $obj_wrs->icono=strClean($_REQUEST["txt_icono"]);
                $obj_wrs->enlace=strClean($_REQUEST["txt_enlace"]);
                $obj_wrs->observacion=strClean($_REQUEST["txt_obs"]);
            
               if ($obj_wrs->web_red_social == '') {
                        echo "error_datos";
               } else {
                   $obj_wrs->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>