<?php
  session_start();
   require_once("../../helpers/helpers.php");
   include_once("../../model_class/asignacion_licencia.php");
    include_once("../../model_class/licencia.php");
    $obj_a_lic= new asignacion_licencia();
    $obj_lic= new licencia();

        /*---- Activar y desactivar Estado ----*/

         if(isset($_REQUEST["accion"])){
            if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
                 $obj_a_lic->id_asignacion_licencia=$_REQUEST["id"];
                 $obj_a_lic->activar();
                 echo "true_activado";
                 die();
               }
               else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
                 $obj_a_lic->id_asignacion_licencia=$_REQUEST["id"];
                 $obj_a_lic->desactivar();
                 echo "true_desactivado";
                 die();     
               }
         }  

         /*---- Crear y actualizar asignacion de licencias ----*/
         if($_REQUEST["id"]>0){

               $obj_a_lic->id_herramienta_tecnologica=strClean($_REQUEST["slt_h_tec"]);
               $obj_a_lic->id_licencia=strClean($_REQUEST["slt_lic"]);
               $obj_a_lic->fecha_asignacion=strClean($_REQUEST["txt_f_a"]);
               $obj_a_lic->fecha_vencimiento=strClean($_REQUEST["txt_f_v"]);
               $obj_a_lic->observacion=strClean($_REQUEST["txt_obs"]);
               $obj_a_lic->id_asignacion_licencia=intval($_REQUEST["id"]);
               
               if ($obj_a_lic->id_licencia == '') {
                echo "error_datos";
                return false;
               }else{      
                   if($obj_a_lic->id_licencia==$_SESSION["id_lic"]){
                    $obj_a_lic->update();
                    echo "true_update";
                   }else if($obj_a_lic->id_licencia != $_SESSION["id_lic"]){
                  
                    
                   $tabla2=$obj_lic->consult_stock($_SESSION["id_lic"]);
                   $fila2 = mysqli_fetch_array($tabla2);
                   $ac_stock2 = $fila2['stock'];
                   $ac_stock2=$ac_stock2 +1;
                   $obj_lic->update_stock_x_fecha_venc($_SESSION["id_lic"],$ac_stock2,$obj_a_lic->fecha_vencimiento);

                   $tabla1=$obj_lic->consult_stock($obj_a_lic->id_licencia);
                   $fila1 = mysqli_fetch_array($tabla1);
                   $ac_stock = $fila1['stock'];
                   $ac_stock =$ac_stock-1;
                   $obj_lic->update_stock($obj_a_lic->id_licencia,$ac_stock);
                   $obj_a_lic->update();
                   echo "true_update";

                   }
                     
                   
                   die();
               }
          }else{
              $obj_a_lic->id_herramienta_tecnologica=strClean($_REQUEST["slt_h_tec"]);
              $obj_a_lic->id_licencia=strClean($_REQUEST["slt_lic"]);
              $obj_a_lic->fecha_asignacion=strClean($_REQUEST["txt_f_a"]);
              $obj_a_lic->fecha_vencimiento=strClean($_REQUEST["txt_f_v"]);
              $obj_a_lic->observacion=strClean($_REQUEST["txt_obs"]);
              $obj_a_lic->id_asignacion_licencia=intval($_REQUEST["id"]);
           
                   $obj_a_lic->create(); 
                   $tabla1=$obj_lic->consult_stock($obj_a_lic->id_licencia);
                   $fila1 = mysqli_fetch_array($tabla1);
                   $ac_stock = $fila1['stock'];
                   $ac_stock =$ac_stock-1;
                   $obj_lic->update_stock($obj_a_lic->id_licencia,$ac_stock);
                   echo "true_create"; 
               

                die();
         }

?>