<?php
   require_once("../../helpers/helpers.php");

   include_once("../../model_class/herramienta_tecnologica.php");
    $obj_h_tec= new herramienta_tecnologica();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_h_tec->id_herramienta_tecnologica=$_REQUEST["id"];
                 $obj_h_tec->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_h_tec->id_herramienta_tecnologica=$_REQUEST["id"];
                 $obj_h_tec->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar marca comercial ----*/
         if($_REQUEST["id"]>0){

               $obj_h_tec->id_tipo_equipo=strClean($_REQUEST["slt_t_e"]);
               $obj_h_tec->descripcion=strClean($_REQUEST["txt_desc"]);
               $obj_h_tec->id_marca_equipo=strClean($_REQUEST["slt_m_e"]);
               $obj_h_tec->modelo=strClean($_REQUEST["txt_mod"]);
               $obj_h_tec->nro_serial=strClean($_REQUEST["txt_n_s"]);
               $obj_h_tec->fecha_compra=strClean($_REQUEST["txt_f_c"]);
               $obj_h_tec->fecha_garantia=strClean($_REQUEST["txt_f_g"]);
               $obj_h_tec->precio=strClean($_REQUEST["txt_pre"]);
               $obj_h_tec->id_condicion_equipo=strClean($_REQUEST["slt_c_e"]);
               $obj_h_tec->valor_actual=strClean($_REQUEST["txt_v_a"]);
               $obj_h_tec->id_herramienta_tecnologica=intval($_REQUEST["id"]);
               if ($obj_h_tec->descripcion == '' ) {
                echo "error_datos";
                return false;
               }else{
                   $obj_h_tec->update();
                   echo "true_update";
                   die();
               }
          }else{
              $obj_h_tec->id_tipo_equipo=strClean($_REQUEST["slt_t_e"]);
              $obj_h_tec->descripcion=strClean($_REQUEST["txt_desc"]);
              $obj_h_tec->id_marca_equipo=strClean($_REQUEST["slt_m_e"]);
              $obj_h_tec->modelo=strClean($_REQUEST["txt_mod"]);
              $obj_h_tec->nro_serial=strClean($_REQUEST["txt_n_s"]);
              $obj_h_tec->fecha_compra=strClean($_REQUEST["txt_f_c"]);
              $obj_h_tec->fecha_garantia=strClean($_REQUEST["txt_f_g"]);
              $obj_h_tec->precio=strClean($_REQUEST["txt_pre"]);
              $obj_h_tec->id_condicion_equipo=strClean($_REQUEST["slt_c_e"]);
              $obj_h_tec->valor_actual=strClean($_REQUEST["txt_v_a"]);
              $obj_h_tec->id_herramienta_tecnologica=intval($_REQUEST["id"]);
               if ($obj_h_tec->descripcion == '') {
                        echo "error_datos";
               } else {
                   $obj_h_tec->create(); 
                   echo "true_create"; 
                   
               }

                die();
         }

?>