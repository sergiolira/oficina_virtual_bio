<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/web_header.php");
    $obj_w_h= new web_header();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_w_h->id_web_header=$_REQUEST["id"];
                 $obj_w_h->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_w_h->id_web_header=$_REQUEST["id"];
                 $obj_w_h->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){
               
               $obj_w_h->marca_comercial=strClean($_REQUEST["txt_m_c"]);
               $obj_w_h->logo=strClean($_REQUEST["txt_l"]);
               $obj_w_h->logo_blanco=strClean($_REQUEST["txt_l_b"]);
               $obj_w_h->logo_footer=strClean($_REQUEST["txt_l_f"]);
               $obj_w_h->celular1=strClean($_REQUEST["txt_c1"]);
               $obj_w_h->celular2=strClean($_REQUEST["txt_c2"]);
               $obj_w_h->razon_social=strClean($_REQUEST["txt_r_s"]);
               $obj_w_h->ruc=strClean($_REQUEST["txt_r"]);
               
               
               $obj_w_h->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_w_h->id_web_header=intval($_REQUEST["id"]);
               if ($obj_w_h->marca_comercial == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_w_h->update();
                   echo "true_update";
                   die();
               }
          }else{
                $obj_w_h->marca_comercial=strClean($_REQUEST["txt_m_c"]);
                $obj_w_h->logo=strClean($_REQUEST["txt_l"]);
                $obj_w_h->logo_blanco=strClean($_REQUEST["txt_l_b"]);
                $obj_w_h->logo_footer=strClean($_REQUEST["txt_l_f"]);
                $obj_w_h->celular1=strClean($_REQUEST["txt_c1"]);
                $obj_w_h->celular2=strClean($_REQUEST["txt_c2"]);
                $obj_w_h->razon_social=strClean($_REQUEST["txt_r_s"]);
                $obj_w_h->ruc=strClean($_REQUEST["txt_r"]);
                $obj_w_h->observacion=strClean($_REQUEST["txt_obs"]);
            
               if ($obj_w_h->marca_comercial == '') {
                        echo "error_datos";
               } else {
                   $obj_w_h->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>