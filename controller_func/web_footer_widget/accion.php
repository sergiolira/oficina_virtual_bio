<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/web_footer_widget.php");
    $obj_wfw= new web_footer_widget();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_wfw->id_web_footer_widget=$_REQUEST["id"];
                 $obj_wfw->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_wfw->id_web_footer_widget=$_REQUEST["id"];
                 $obj_wfw->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){
               
               $obj_wfw->web_footer_widget=strClean($_REQUEST["txt_wfw"]);
               
               $obj_wfw->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_wfw->id_web_footer_widget=intval($_REQUEST["id"]);
               if ($obj_wfw->web_footer_widget == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_wfw->update();
                   echo "true_update";
                   die();
               }
          }else{
                $obj_wfw->web_footer_widget=strClean($_REQUEST["txt_wfw"]);
                
                $obj_wfw->observacion=strClean($_REQUEST["txt_obs"]);
            
               if ($obj_wfw->web_footer_widget == '') {
                        echo "error_datos";
               } else {
                   $obj_wfw->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>