<?php
   require_once("../../helpers/helpers.php");
  session_start();
   include_once("../../model_class/asignacion_herramienta.php");
   include_once("../../model_class/herramienta_tecnologica.php");

    $obj_herramienta = new herramienta_tecnologica();
    $obj_a_h= new asignacion_herramienta();


        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_a_h->id_asignacion_herramienta=$_REQUEST["id"];
                 $obj_a_h->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_a_h->id_asignacion_herramienta=$_REQUEST["id"];
                 $obj_a_h->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar asignacion de herramientas ----*/
         if($_REQUEST["id"]>0){
               $obj_a_h->id_usuario=strClean($_REQUEST["slt_usu"]);
               $obj_a_h->id_herramienta_tecnologica=strClean($_REQUEST["slt_h_tec"]);
               
               $obj_a_h->fecha_asignacion=strClean($_REQUEST["txt_f_a"]);
               if(isset($_REQUEST["txt_f_l"])){
                $obj_a_h->fecha_liberacion=strClean($_REQUEST["txt_f_l"]);
                $obj_herramienta->update_st_asig2(strClean($_REQUEST["slt_h_tec"]));
               }else{
                $obj_a_h->fecha_liberacion="1900-01-01";
               }              
               $obj_a_h->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_a_h->id_asignacion_herramienta=intval($_REQUEST["id"]);
               if ($obj_a_h->id_usuario == '') {
                echo "error_datos";                
                die();
               }else{	              
                  $obj_a_h->update();
                  echo "true_update"; 
                  die();
                 }
                   
                
               
          }else{
            $obj_a_h->id_usuario=strClean($_REQUEST["slt_usu"]);
            $obj_a_h->id_herramienta_tecnologica=strClean($_REQUEST["slt_h_tec"]);
            
            $obj_a_h->fecha_asignacion=strClean($_REQUEST["txt_f_a"]);        
            if(isset($_REQUEST["txt_f_l"])){
              $obj_a_h->fecha_liberacion=strClean($_REQUEST["txt_f_l"]);
             }else{
              $obj_a_h->fecha_liberacion="1900-01-01";
             }               
            $obj_a_h->observacion=strClean($_REQUEST["txt_obs"]);
            $obj_a_h->id_asignacion_herramienta=intval($_REQUEST["id"]);
               if ($obj_a_h->id_usuario == '') {
                        echo "error_datos";
               } else {
                  $obj_herramienta->update_st_asig($obj_a_h->id_herramienta_tecnologica);
                   $obj_a_h->create();                   
                   echo "true_create"; 
                   die();
               }

                
         }

?>