<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/web_sub_menu.php");
    $obj_web_sm= new web_sub_menu();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_web_sm->id_web_sub_menu=$_REQUEST["id"];
                 $obj_web_sm->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_web_sm->id_web_sub_menu=$_REQUEST["id"];
                 $obj_web_sm->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_web_sm->web_sub_menu=strClean($_REQUEST["txt_web_sm"]);
               $obj_web_sm->enlace=strClean($_REQUEST["txt_enlace"]);
               $obj_web_sm->id_web_menu=strClean($_REQUEST["slt_wm"]);
               $obj_web_sm->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_web_sm->id_web_sub_menu=intval($_REQUEST["id"]);
               if ($obj_web_sm->web_sub_menu == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_web_sm->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_web_sm->web_sub_menu=strClean($_REQUEST["txt_web_sm"]);
               $obj_web_sm->enlace=strClean($_REQUEST["txt_enlace"]);
               $obj_web_sm->id_web_menu=strClean($_REQUEST["slt_wm"]);
               $obj_web_sm->observacion=strClean($_REQUEST["txt_obs"]);
               if ($obj_web_sm->web_sub_menu == '') {
                        echo "error_datos";
               } else {
                   $obj_web_sm->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>