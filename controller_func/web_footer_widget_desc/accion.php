<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/web_footer_widget_desc.php");
    $obj_wfwd= new web_footer_widget_desc();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_wfwd->id_web_footer_widget_desc=$_REQUEST["id"];
                 $obj_wfwd->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_wfwd->id_web_footer_widget_desc=$_REQUEST["id"];
                 $obj_wfwd->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_wfwd->web_footer_widget_desc=strClean($_REQUEST["txt_wfwd"]);
               $obj_wfwd->enlace=strClean($_REQUEST["txt_enlace"]);
               $obj_wfwd->id_web_footer_widget=strClean($_REQUEST["slt_wfw"]);
               $obj_wfwd->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_wfwd->id_web_footer_widget_desc=intval($_REQUEST["id"]);
               if ($obj_wfwd->web_footer_widget_desc == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_wfwd->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_wfwd->web_footer_widget_desc=strClean($_REQUEST["txt_wfwd"]);
               $obj_wfwd->enlace=strClean($_REQUEST["txt_enlace"]);
               $obj_wfwd->id_web_footer_widget=strClean($_REQUEST["slt_wfw"]);
               $obj_wfwd->observacion=strClean($_REQUEST["txt_obs"]);
               if ($obj_wfwd->web_footer_widget_desc == '') {
                        echo "error_datos";
               } else {
                   $obj_wfwd->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>