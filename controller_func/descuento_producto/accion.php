<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/descuento_producto.php");
    $obj_d_p= new descuento_producto();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_d_p->id_descuento_producto=$_REQUEST["id"];
                 $obj_d_p->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_d_p->id_descuento_producto=$_REQUEST["id"];
                 $obj_d_p->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){
               $obj_d_p->id_tipo_descuento=intval($_REQUEST["slt_t_d"]);
               $obj_d_p->monto=strClean($_REQUEST["txt_monto"]);
               $obj_d_p->fecha_inicio=strClean($_REQUEST["txt_f_i"]);
               $obj_d_p->fecha_fin=strClean($_REQUEST["txt_f_f"]);
               $obj_d_p->id_producto=intval($_REQUEST["slt_pro"]);
               
               $obj_d_p->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_d_p->id_descuento_producto=intval($_REQUEST["id"]);
               if ($obj_d_p->monto == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_d_p->update();
                   echo "true_update";
                   die();
               }
          }else{
                $obj_d_p->id_tipo_descuento=intval($_REQUEST["slt_t_d"]);
                $obj_d_p->monto=strClean($_REQUEST["txt_monto"]);
                $obj_d_p->fecha_inicio=strClean($_REQUEST["txt_f_i"]);
                $obj_d_p->fecha_fin=strClean($_REQUEST["txt_f_f"]);
                $obj_d_p->id_producto=intval($_REQUEST["slt_pro"]);
                
                $obj_d_p->observacion=strClean($_REQUEST["txt_obs"]);
            
               if ($obj_d_p->monto == '') {
                        echo "error_datos";
               } else {
                   $obj_d_p->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>