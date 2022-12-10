<?php
session_start();
setlocale(LC_ALL,"es_ES@euro","es_PE","esp");
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, 'es_PE.utf8');
include_once("../../model_class/trama_registro_ventas_temporal.php");
include_once("../../model_class/trama_registro_ventas.php");
include_once("../../model_class/cabecera_registro_venta.php");
$obj_r=new cabecera_registro_venta();
$obj=new trama_registro_ventas_temporal();
$obj_tvo=new trama_registro_ventas();



if(!isset($_REQUEST["fecha_ini"])){
    echo "false";
     exit();
 }
 
 if(!isset($_REQUEST["fecha_fin"])){
     echo "false";
      exit();
  }
  
 $fecha_ini=$_REQUEST["fecha_ini"];
 $fecha_fin=$_REQUEST["fecha_fin"];

 $año_detalle="";$mes_detalle="";$semana_detalle="";$mesini="";$mesfin="";$mesactualini="";$mesactualfin="";
 $dias_ini="";$dias_fin="";$semana_detalle_archivo="";

 if($fecha_ini=="1" && $fecha_fin=="1"){
    $mes_detalle=$_REQUEST["mes_detalle"];
    $año_detalle=$_REQUEST["anio_detalle"];
    $semana_detalle=$_REQUEST["semana_detalle"];
 }else{

    $mesini= strftime("%B",strtotime($fecha_ini));
    $mesfin= strftime("%B",strtotime($fecha_fin));
    
    /**Condidicion si meses son iguales */
    if($mesini==$mesfin){
        $mes_detalle=$mesini;
        $año_detalle=strftime("%Y",strtotime($fecha_fin));
        $semana_detalle=strftime("%d %B",strtotime($fecha_ini))." al ".strftime("%d %B",strtotime($fecha_fin));
        $semana_detalle_archivo=strftime("%d_%B",strtotime($fecha_ini))."_al_".strftime("%d_%B",strtotime($fecha_fin));
        /*echo $año_detalle;
        echo "<br>";
        echo $mes_detalle;
        echo "<br>";
        echo $semana_detalle;*/
    
    }
    /**Condidicion si meses son diferentes */
    else{
        /**Ultimo dia del mes - Inicial */
        $mesactualini = new DateTime($fecha_ini); 
        $mesactualini=$mesactualini->format('Y-m-d');
        /**Primer dia del mes - Final */
        $mesactualfin = new DateTime($fecha_fin);
        $mesactualfin->modify('first day of this month');
        $mesactualfin=$mesactualfin->format('Y-m-d');
    
        if($mesactualini==$mesactualfin){
            $mes_detalle=$mesini;
            $año_detalle=strftime("%Y",strtotime($fecha_fin));
            $semana_detalle=strftime("%d %B",strtotime($fecha_ini))." al ".strftime("%d %B",strtotime($fecha_fin));
            $semana_detalle_archivo=strftime("%d_%B",strtotime($fecha_ini))."_al_".strftime("%d_%B",strtotime($fecha_fin));
            /*echo $año_detalle;
            echo "<br>";
            echo $mes_detalle;
            echo "<br>";
            echo $semana_detalle;*/
    
        }else{
            //Calculamos dias del primer mes
            $date1 = new DateTime($mesactualini);
            $date2 = new DateTime($fecha_ini);
            $diff = $date1->diff($date2);        
            $dias_ini=$diff->days;
    
            //Calculamos dias del segundo mes        
            $date3 = new DateTime($fecha_fin);
            $date4 = new DateTime($mesactualfin);
            $diff = $date3->diff($date4);
            $dias_fin=$diff->days;
    
            if($dias_ini>$dias_fin){
                $mes_detalle=$mesini;
                $año_detalle=strftime("%Y",strtotime($fecha_fin));
                $semana_detalle=strftime("%d %B",strtotime($fecha_ini))." al ".strftime("%d %B",strtotime($fecha_fin));
                $semana_detalle_archivo=strftime("%d_%B",strtotime($fecha_ini))."_al_".strftime("%d_%B",strtotime($fecha_fin));
                /*echo $año_detalle;
                echo "<br>";
                echo $mes_detalle;
                echo "<br>";
                echo $semana_detalle;*/
            }else{
                $mes_detalle=$mesfin;
                $año_detalle=strftime("%Y",strtotime($fecha_fin));
                $semana_detalle=strftime("%d %B",strtotime($fecha_ini))." al ".strftime("%d %B",strtotime($fecha_fin));
                $semana_detalle_archivo=strftime("%d_%B",strtotime($fecha_ini))."_al_".strftime("%d_%B",strtotime($fecha_fin));
                /*echo $año_detalle;
                echo "<br>";
                echo $mes_detalle;
                echo "<br>";
                echo $semana_detalle;*/
            }
    
        }
        
    }


 }
  
 
 /**Validamos si existe una trama si hay lo eliminamos*/
 $obj_tvo->anio_detalle=$año_detalle;
 $obj_tvo->mes_detalle=ucfirst($mes_detalle);
 $obj_tvo->semana_detalle=$semana_detalle;
 $val_ventas=$obj_tvo->validar_list_ventas_x_fecha();
 if($val_ventas>=1){
     /**Eliminamos lista*/
     $obj_tvo->delete_list_x_fecha();
 }
 /**Listamos la lista temporal y guardamos */
 
 $obj->nro_solicitud_session=$_SESSION["nro_solicitud_tem_trama_ventas"];
 $obj->anio_detalle=$año_detalle;
 $obj->mes_detalle=ucfirst($mes_detalle);
 $obj->semana_detalle=$semana_detalle;
 $obj->id_usuarioactualiza=$_SESSION["id_usuario"];
 $obj->save_list_temporal_a_trama_ventas();
 $obj->update_estado_enviado_trama_ventas();
 $obj_r->id_usuarioactualiza=$_SESSION["id_usuario"];
 $obj_r->nro_solicitud_session=$_SESSION["nro_solicitud_tem_trama_ventas"];
 $obj_r->update_estado_enviado_trama_ventas();
 echo "true";
?>