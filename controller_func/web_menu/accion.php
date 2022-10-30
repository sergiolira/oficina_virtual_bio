<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/web_menu.php");
    $obj_web_menu= new web_menu();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_web_menu->id_web_menu=$_REQUEST["id"];
                 $obj_web_menu->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_web_menu->id_web_menu=$_REQUEST["id"];
                 $obj_web_menu->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_web_menu->web_menu=strClean($_REQUEST["txt_web_menu"]);
               $obj_web_menu->enlace=strClean($_REQUEST["txt_enlace"]);
               $obj_web_menu->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_web_menu->id_web_menu=intval($_REQUEST["id"]);
               if ($obj_web_menu->web_menu == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_web_menu->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_web_menu->web_menu=strClean($_REQUEST["txt_web_menu"]);
               $obj_web_menu->enlace=strClean($_REQUEST["txt_enlace"]);
               $obj_web_menu->observacion=strClean($_REQUEST["txt_obs"]);
               if ($obj_web_menu->web_menu == '') {
                        echo "error_datos";
               } else {
                   $obj_web_menu->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>