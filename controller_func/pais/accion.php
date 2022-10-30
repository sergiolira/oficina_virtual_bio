<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/pais.php");
    $obj_pais= new pais();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_pais->id_pais=$_REQUEST["id"];
                 $obj_pais->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_pais->id_pais=$_REQUEST["id"];
                 $obj_pais->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_pais->pais=strClean($_REQUEST["txt_pais"]);
               
               $obj_pais->id_pais=intval($_REQUEST["id"]);
               if ($obj_pais->pais == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_pais->update();
                   echo "true_update";
                   die();
               }
          }else{
               $obj_pais->pais=strClean($_REQUEST["txt_pais"]);
               
               if ($obj_pais->pais == '') {
                        echo "error_datos";
               } else {
                   $obj_pais->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>