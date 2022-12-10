<?php
   require_once("../../helpers/helpers.php");
   include_once("../../model_class/registro_compra.php");
   include_once("../../model_class/producto.php");
    $obj_r_c= new registro_compra();
    $obj_producto= new producto();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_r_c->id_registro_compra=$_REQUEST["id"];
                 $obj_r_c->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_r_c->id_registro_compra=$_REQUEST["id"];
                 $obj_r_c->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){
               $obj_r_c->id_producto=intval($_REQUEST["slt_pro"]);
               $obj_r_c->id_divisa=intval($_REQUEST["slt_div"]);
               $obj_r_c->precio_unitario=strClean($_REQUEST["txt_p_u"]);
               $obj_r_c->sub_total=strClean($_REQUEST["txt_s_t"]);               
               $obj_r_c->fecha_ingreso=strClean($_REQUEST["txt_f_i"]);
               $obj_r_c->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_r_c->id_registro_compra=intval($_REQUEST["id"]);
               if ($obj_r_c->precio_unitario == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_r_c->update();
                   echo "true_update";
                   die();
               }
          }else{
                $obj_r_c->id_producto=intval($_REQUEST["slt_pro"]);
                $obj_r_c->id_divisa=intval($_REQUEST["slt_div"]);
                $obj_r_c->cantidad=intval($_REQUEST["txt_can"]);
                $obj_r_c->precio_unitario=strClean($_REQUEST["txt_p_u"]);
                $obj_r_c->sub_total=strClean($_REQUEST["txt_s_t"]);                
                $obj_r_c->fecha_ingreso=strClean($_REQUEST["txt_f_i"]);                
                $obj_r_c->observacion=strClean($_REQUEST["txt_obs"]);

                $obj_producto->stock_actual=intval($_REQUEST["txt_can"]);
                $obj_producto->stock_inicial=intval($_REQUEST["txt_can"]);
                $obj_producto->id_producto=intval($_REQUEST["slt_pro"]);
            
               if ($obj_r_c->cantidad == '') {
                        echo "error_datos";
               } else {
                  $obj_producto->update_stock();
                   $obj_r_c->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>