<?php

require_once("../../helpers/helpers.php");
include_once("../../model_class/financiado.php");
    $obj_financiado= new financiado();

         /*---- Activar y desactivar Estado ----*/
         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_financiado->id_financiado=$_REQUEST["id"];
                 $obj_financiado->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_financiado->id_financiado=$_REQUEST["id"];
                 $obj_financiado->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar financiado ----*/
         if($_REQUEST["id"]>0){

               $obj_financiado->financiado=strClean($_REQUEST["txt_finan"]);
               $obj_financiado->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_financiado->id_financiado=intval($_REQUEST["id"]);
               if ($obj_financiado->financiado == '') {
                echo "error_datos";
                return false;
               }else{
                   $obj_financiado->update();
                   echo "true_update";
                   die();
               }
         }
        else
        {
          $obj_financiado->financiado=strClean($_REQUEST["txt_finan"]);
          $obj_financiado->observacion=strClean($_REQUEST["txt_obs"]);
          if ($obj_financiado->financiado == '' ) {
                   echo "error_datos";
          } else {
              $obj_financiado->create(); 
              echo "true_create"; 
              
          }
                die();
         }

?>