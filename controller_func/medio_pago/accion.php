<?php
   require_once("../helper.php");

   include_once("../../model_class/medio_pago.php");
    $obj_medio= new medio_pago();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_medio->id_medio_pago=$_REQUEST["id"];
                 $obj_medio->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_medio->id_medio_pago=$_REQUEST["id"];
                 $obj_medio->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar medio pago ----*/
         if($_REQUEST["id"]>0){

               $obj_medio->medio_pago=strClean($_REQUEST["txt_mpago"]);
               $obj_medio->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_medio->id_medio_pago=intval($_REQUEST["id"]);
               if ($obj_medio->medio_pago == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_medio->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_medio->medio_pago=strClean($_REQUEST["txt_mpago"]);
               $obj_medio->observacion=strClean($_REQUEST["txt_obs"]);
               if ($obj_medio->medio_pago == '' ) {
                        echo "error_datos";
               } else {
                   $obj_medio->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>