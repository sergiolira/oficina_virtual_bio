<?php
session_start();
setlocale(LC_ALL,"es_ES@euro","es_PE","esp");
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, 'es_PE.utf8');
include_once("../../model_class/trama_registro_ventas_temporal.php");
include_once("../../model_class/cabecera_registro_venta.php");
include_once("../../model_class/representante.php");
$obj_r=new cabecera_registro_venta();
$obj_rep=new representante();
$obj=new trama_registro_ventas_temporal();

$fechainicio=new DateTime(); 
$fechafin=new DateTime(); 
$dia = new DateTime(); 
$dia=$dia->format('Y-m-d');
$nombre_dia=strftime("%A",strtotime($dia));

/**Validar */


    if($nombre_dia=="lunes"){
        $fechainicio=$fechainicio->format('Y-m-d');
        $fechafin=$fechafin->format('Y-m-d');
        
    }elseif($nombre_dia=="martes"){
        $fechafin=$fechafin->format('Y-m-d');
        //$fechafin=$fechafin->format('Y-m-d');
        $fechainicio=date("Y-m-d",strtotime($fechafin."- 1 day")); 
    }elseif ($nombre_dia=="miércoles" || utf8_encode($nombre_dia)=="miércoles" || $nombre_dia=="miercoles") {
        $fechafin=$fechafin->format('Y-m-d');
        //$fechafin=$fechafin->format('Y-m-d');
        $fechainicio=date("Y-m-d",strtotime($fechafin."- 2 day"));    
    }elseif ($nombre_dia=="jueves") {
        $fechafin=$fechafin->format('Y-m-d');
        $fechainicio=date("Y-m-d",strtotime($fechafin."- 3 day"));    
    }elseif ($nombre_dia=="viernes") {
        $fechafin=$fechafin->format('Y-m-d');
        //$fechafin=$fechafin->format('Y-m-d');
        $fechainicio=date("Y-m-d",strtotime($fechafin."- 4 day"));    
    }elseif ($nombre_dia=="sábado" || utf8_encode($nombre_dia)=="sábado" || $nombre_dia=="sabado") {
        $fechafin=$fechafin->format('Y-m-d');
        $fechainicio=date("Y-m-d",strtotime($fechafin."- 5 day"));    
    }elseif ($nombre_dia=="domingo") {
        $fechafin=$fechafin->format('Y-m-d');
        $fechainicio=date("Y-m-d",strtotime($fechafin."- 6 day"));    
    }else{
    echo "dia_incorrecto";
    die();
    }

    /**Conlas fechas buscamos una solicitud de trama ya registrama */
    $obj->fecha_inicio=$fechainicio;
    $obj->fecha_fin=$fechafin;
    $ses_res=$obj->consultar_nro_solicitud_session();
    if($ses_res==""){
        $nro_sol_temp="ts_tem_".date('dmy')."_".date('Hs')."_".rand(10, 99); 
        $_SESSION["nro_solicitud_tem_trama_ventas"]=$nro_sol_temp;
    }else{
        $_SESSION["nro_solicitud_tem_trama_ventas"]=$ses_res;
    }


if($_REQUEST["tipo"]=="4"){      

 
    $obj->nro_solicitud_session=$_SESSION["nro_solicitud_tem_trama_ventas"];


    $filtro="";$fecha_ped_ini="";$fecha_ped_fin="";$fecha_entrega_ini="";$fecha_entrega_fin="";
    $slt_estado_pedido_c="";$slt_tipo_venta_c="";$txt_nro_sol_c="";$txt_nro_doc_c="";
    
    $fecha_ped_ini=$_REQUEST["fecha_ped_ini"];
    $fecha_ped_fin=$_REQUEST["fecha_ped_fin"];
    $fecha_entrega_ini=$_REQUEST["fecha_entrega_ini"];
    $fecha_entrega_fin=$_REQUEST["fecha_entrega_fin"];
    $slt_estado_pedido_c=8;
    $txt_nro_sol_c=$_REQUEST["txt_nro_sol_c"];
    $txt_nro_doc_c=$_REQUEST["txt_nro_doc_c"];
    
    if(trim($fecha_ped_ini)!="null" && trim($fecha_ped_ini)!="" && $fecha_ped_ini!="0" &&
    trim($fecha_ped_fin)!="null" && trim($fecha_ped_fin)!="" && $fecha_ped_fin!="0"){
      $filtro.=" and DATE(crv.fecha_pedido) BETWEEN '".$fecha_ped_ini."' AND '".$fecha_ped_fin."'";
    }
    
    if(trim($fecha_entrega_ini)!="null" && trim($fecha_entrega_ini)!="" && $fecha_entrega_ini!="0" &&
    trim($fecha_entrega_fin)!="null" && trim($fecha_entrega_fin)!="" && $fecha_entrega_fin!="0"){
      $filtro.=" and DATE(crv.fecha_entrega) BETWEEN '".$fecha_entrega_ini."' AND '".$fecha_entrega_fin."'";
    }
    
    $filtro.=" and crv.id_estado_registro_venta in (".$slt_estado_pedido_c.")";
    
    
    if($txt_nro_sol_c!=""){
    $filtro.=" and crv.nro_solicitud='".$txt_nro_sol_c."'";
    }
    
    if($txt_nro_doc_c!=""){
    $filtro.=" and crv.nro_documento='".$txt_nro_doc_c."'";
    }

    $filtro.=" and crv.estado_enviado_comision!='3'";

    $filtro.=" and (crv.patrocinador!='Cabeza de Red' OR drv.id_tipo_venta!='2')";

    $rs=$obj_r->consult_filtro($filtro);


    while($fila=mysqli_fetch_assoc($rs)){

        $obj_rep->nro_documento=$fila["nro_documento"];
        $val_rep=$obj_rep->validar_nro_documento_r();
        if($val_rep>0){
            $obj->nro_solicitud_session=$_SESSION["nro_solicitud_tem_trama_ventas"];
            $obj->nro_solicitud=$fila["nro_solicitud"];
            $obj->id_cabecera_registro_venta=$fila["id_cabecera_registro_venta"];
            $obj->id_usuarioregistro=$_SESSION["id_usuario"];
            $obj->id_usuarioactualiza=$_SESSION["id_usuario"];

            $rs_val=$obj->validar_nro_solicitud();
            $rs_val_elim=$obj->validar_nro_solicitud_eliminado();
            if($rs_val_elim=="1"){
                $obj->activate();
            }else{
                if($rs_val=="0"){
                    $obj->save();
                }
            }

        }               
        
    }
    echo "true";
    die();    
}

if($_REQUEST["tipo"]=="1"){   
   
    $obj->nro_solicitud_session=$_SESSION["nro_solicitud_tem_trama_ventas"];
    $obj->id_cabecera_registro_venta=$_REQUEST["id"];
    $obj->nro_solicitud=$_REQUEST["solicitud"];
    $obj->id_usuarioregistro=$_SESSION["id_usuario"];
    $obj->id_usuarioactualiza=$_SESSION["id_usuario"];

    $rs_val=$obj->validar_nro_solicitud();
    $rs_val_elim=$obj->validar_nro_solicitud_eliminado();

    if($rs_val_elim=="1"){
        $obj->activate();
        echo "true";
        die();
    }
    if($rs_val=="0"){
        $obj->save();
        echo "true";
        die();
    }else{
        echo "true_doble";
        die();
    }
    
    
}

if($_REQUEST["tipo"]=="2"){
    $obj->nro_solicitud_session=$_SESSION["nro_solicitud_tem_trama_ventas"];
    $obj->id_cabecera_registro_venta=$_REQUEST["id"];
    $obj->id_usuarioregistro=$_SESSION["id_usuario"];
	$obj->id_usuarioactualiza=$_SESSION["id_usuario"];
	$obj->delete();
    $obj_r->nro_solicitud=$_REQUEST["solicitud"];
    $obj_r->id_usuarioactualiza=$_SESSION["id_usuario"];
    $obj_r->no_enviar_venta_trama();
	echo "delete_true";
	die();
}


?>