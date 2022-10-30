<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/web_footer_four_bottom_right.php");
    $obj_wffbr= new web_footer_four_bottom_right();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_wffbr->id_web_footer_four_bottom_right=$_REQUEST["id"];
                 $obj_wffbr->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_wffbr->id_web_footer_four_bottom_right=$_REQUEST["id"];
                 $obj_wffbr->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){
               
               $obj_wffbr->web_footer_four_bottom_right=strClean($_REQUEST["txt_wffbr"]);
               $obj_wffbr->enlace=strClean($_REQUEST["txt_enlace"]);
               $obj_wffbr->imagen=strClean($_REQUEST["txt_imagen"]);
               $obj_wffbr->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_wffbr->id_web_footer_four_bottom_right=intval($_REQUEST["id"]);
               if ($obj_wffbr->web_footer_four_bottom_right == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_wffbr->update();
                   echo "true_update";
                   die();
               }
          }else{
                $obj_wffbr->web_footer_four_bottom_right=strClean($_REQUEST["txt_wffbr"]);
                $obj_wffbr->enlace=strClean($_REQUEST["txt_enlace"]);
                $obj_wffbr->imagen=strClean($_REQUEST["txt_imagen"]);
                $obj_wffbr->observacion=strClean($_REQUEST["txt_obs"]);
            
               if ($obj_wffbr->web_footer_four_bottom_right == '') {
                        echo "error_datos";
               } else {
                   $obj_wffbr->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>