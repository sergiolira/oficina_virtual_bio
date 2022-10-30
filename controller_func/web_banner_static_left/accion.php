<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/web_banner_static_left.php");
$obj_web_banner_static_left= new web_banner_static_left();
$formatos_permitidos =  array('pdf','mp4','doc','docx','xlsx','xlsm','mov','wmv','png','jpg','gif');
$formatos_permitidos_ima =  array('png','jpg','gif','jpeg');

    if(isset($_REQUEST["accion"])){
        if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
            $obj_web_banner_static_left->id_web_banner_static_left=intval(strClean($_REQUEST["id"]));
            $obj_web_banner_static_left->activar();
            echo "true_activado";
            die();
        }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
            $obj_web_banner_static_left->id_web_banner_static_left=intval(strClean($_REQUEST["id"]));
            $obj_web_banner_static_left->desactivar();
            echo "true_desactivado";
            die();     
        }
    }  

    if($_REQUEST["id"]>0){

            $obj_web_banner_static_left->id_web_banner_static_left=intval(strClean($_REQUEST["id"]));
            $obj_web_banner_static_left->titulo_h1=strClean($_REQUEST["txt_titulo_h1"]);
            $obj_web_banner_static_left->titulo_span=strClean($_REQUEST["txt_titulo_span"]);
            $obj_web_banner_static_left->parrafo_uno=strClean($_REQUEST["txt_parrafo_uno"]);
            $obj_web_banner_static_left->parrafo_dos=strClean($_REQUEST["txt_parrafo_dos"]);
            $obj_web_banner_static_left->parrafo_tres=strClean($_REQUEST["txt_parrafo_tres"]);
            $obj_web_banner_static_left->titulo_descarga=strClean($_REQUEST["txt_titulo_descarga"]);
            $obj_web_banner_static_left->descripcion_boton_descarga=strClean($_REQUEST["txt_descrip_descarga"]);
            $obj_web_banner_static_left->observacion=strClean($_REQUEST["txt_observacion"]);
                if($_FILES['file_archivo_descarga']['name'] != null ){
                    $nombre_temporal=$_FILES['file_archivo_descarga']['tmp_name'];  
                    $nombreArc = $_FILES["file_archivo_descarga"]["name"];             
                    $extensionArc = pathinfo($nombreArc, PATHINFO_EXTENSION);
                    $nuevo_nombre_archivo=date('dmy')."_".date('Hs')."_".rand(10, 99).".".$extensionArc;
                    if(!in_array($extensionArc, $formatos_permitidos)) {
                        echo 'error_extencion';
                        die();
                    }
                    $sub_carpeta=date('dmy').date('His')."_".rand(10, 99);
                    $path = '../../archivos/'.$sub_carpeta;
                    if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                    }
                    if(!isset($_FILES) || empty($_FILES)){
                        echo 'error_no_archivo';
                        exit();
                    }
                    $carpeta_ubicacion_bd="archivos/".$sub_carpeta."/";
                    move_uploaded_file($nombre_temporal, '../../archivos/'.$sub_carpeta.'/'.$nuevo_nombre_archivo);
                    $obj_web_banner_static_left->archivo_descarga=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_banner_static_left->update_archivo_descarga();
                }
                if($_FILES['file_hombre']['name'] !=null){
                    $nombre_temporal=$_FILES['file_hombre']['tmp_name'];  
                    $nombreArc = $_FILES["file_hombre"]["name"];             
                    $extensionArc = pathinfo($nombreArc, PATHINFO_EXTENSION);
                    $nuevo_nombre_archivo=date('dmy')."_".date('Hs')."_".rand(10, 99).".".$extensionArc;
                    /* Validamos extencion*/
                    if(!in_array($extensionArc, $formatos_permitidos)) {
                        echo 'error_extencion';
                        die();
                    }
                    $sub_carpeta=date('dmy').date('His')."_".rand(10, 99);
                    $path = '../../archivos/'.$sub_carpeta;
                    if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                    }
                    if(!isset($_FILES) || empty($_FILES)){
                        echo 'error_no_archivo';
                        exit();
                    }
                    $carpeta_ubicacion_bd="archivos/".$sub_carpeta."/";
                    move_uploaded_file($nombre_temporal, '../../archivos/'.$sub_carpeta.'/'.$nuevo_nombre_archivo);
                    $obj_web_banner_static_left->imagen_hombre=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_banner_static_left->update_imagen_hombre();
                }
                if( $_FILES['file_producto']['name'] != null){
                    $nombre_temporal=$_FILES['file_producto']['tmp_name'];  
                    $nombreArc = $_FILES["file_producto"]["name"];             
                    $extensionArc = pathinfo($nombreArc, PATHINFO_EXTENSION);
                    $nuevo_nombre_archivo=date('dmy')."_".date('Hs')."_".rand(10, 99).".".$extensionArc;
                    /* Validamos extencion*/
                    if(!in_array($extensionArc, $formatos_permitidos)) {
                        echo 'error_extencion';
                        die();
                    }
                    $sub_carpeta=date('dmy').date('His')."_".rand(10, 99);
                    $path = '../../archivos/'.$sub_carpeta;
                    if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                    }
                    if(!isset($_FILES) || empty($_FILES)){
                        echo 'error_no_archivo';
                        exit();
                    }
                    $carpeta_ubicacion_bd="archivos/".$sub_carpeta."/";
                    move_uploaded_file($nombre_temporal, '../../archivos/'.$sub_carpeta.'/'.$nuevo_nombre_archivo);
                    $obj_web_banner_static_left->imagen_producto=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_banner_static_left->update_imagen_producto();
                }
                if( $_FILES['file_circulo']['name'] != null){
                    $nombre_temporal=$_FILES['file_circulo']['tmp_name'];  
                    $nombreArc = $_FILES["file_circulo"]["name"];             
                    $extensionArc = pathinfo($nombreArc, PATHINFO_EXTENSION);
                    $nuevo_nombre_archivo=date('dmy')."_".date('Hs')."_".rand(10, 99).".".$extensionArc;
                    /* Validamos extencion*/
                    if(!in_array($extensionArc, $formatos_permitidos)) {
                        echo 'error_extencion';
                        die();
                    }
                    $sub_carpeta=date('dmy').date('His')."_".rand(10, 99);
                    $path = '../../archivos/'.$sub_carpeta;
                    if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                    }
                    if(!isset($_FILES) || empty($_FILES)){
                        echo 'error_no_archivo';
                        exit();
                    }
                    $carpeta_ubicacion_bd="archivos/".$sub_carpeta."/";
                    move_uploaded_file($nombre_temporal, '../../archivos/'.$sub_carpeta.'/'.$nuevo_nombre_archivo);
                    $obj_web_banner_static_left->imagen_circulo=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_banner_static_left->update_imagen_circulo();
                }
                if( $_FILES['file_fondo']['name'] != null){
                    $nombre_temporal=$_FILES['file_fondo']['tmp_name'];  
                    $nombreArc = $_FILES["file_fondo"]["name"];             
                    $extensionArc = pathinfo($nombreArc, PATHINFO_EXTENSION);
                    $nuevo_nombre_archivo=date('dmy')."_".date('Hs')."_".rand(10, 99).".".$extensionArc;
                    /* Validamos extencion*/
                    if(!in_array($extensionArc, $formatos_permitidos)) {
                        echo 'error_extencion';
                        die();
                    }
                    $sub_carpeta=date('dmy').date('His')."_".rand(10, 99);
                    $path = '../../archivos/'.$sub_carpeta;
                    if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                    }
                    if(!isset($_FILES) || empty($_FILES)){
                        echo 'error_no_archivo';
                        exit();
                    }
                    $carpeta_ubicacion_bd="archivos/".$sub_carpeta."/";
                    move_uploaded_file($nombre_temporal, '../../archivos/'.$sub_carpeta.'/'.$nuevo_nombre_archivo);
                    $obj_web_banner_static_left->imagen_fondo=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_banner_static_left->update_imagen_fondo();
                }
            if($obj_web_banner_static_left->titulo_h1 == '' || $obj_web_banner_static_left->titulo_span=='' || $obj_web_banner_static_left->parrafo_uno=='' || 
               $obj_web_banner_static_left->parrafo_dos=='' || $obj_web_banner_static_left->parrafo_tres=='' || $obj_web_banner_static_left->titulo_descarga=='' || 
               $obj_web_banner_static_left->descripcion_boton_descarga==''){
                echo "error_datos"; 
                return false;
            }else{ 
                $obj_web_banner_static_left->update();
                echo "true_update";
                die();
            }
    }else{      
            if( $_FILES['file_archivo_descarga']['name'] != null && $_FILES['file_hombre']['name'] != null && $_FILES['file_producto']['name'] !=null && $_FILES['file_circulo']['name'] !=null && $_FILES['file_fondo']['name'] !=null ){ //valida que haya archivos
                $array_nombre_temporal = array($_FILES['file_archivo_descarga']['tmp_name'] , $_FILES['file_hombre']['tmp_name'], $_FILES['file_producto']['tmp_name'], $_FILES['file_circulo']['tmp_name'], $_FILES['file_fondo']['tmp_name']);
                $array_nombreArc       = array($_FILES['file_archivo_descarga']['name'] , $_FILES['file_hombre']['name'], $_FILES['file_producto']['name'], $_FILES['file_circulo']['name'], $_FILES['file_fondo']['name']);
                $ubicacion_archivo = array();
                    for ($x = 0; $x < count($array_nombre_temporal); $x++) {
                        $extensionArc = pathinfo($array_nombreArc[$x], PATHINFO_EXTENSION);
                        $nuevo_nombre_archivo=date('dmy')."_".date('Hs')."_".rand(10, 99).".".$extensionArc;
                        $sub_carpeta=date('dmy').date('His')."_".rand(10, 99);
                        $path = '../../archivos/'.$sub_carpeta;
                        if (!file_exists($path)) {
                            mkdir($path, 0777, true);
                        }
                        $carpeta_ubicacion_bd="archivos/".$sub_carpeta."/";
                        move_uploaded_file($array_nombre_temporal[$x], '../../archivos/'.$sub_carpeta.'/'.$nuevo_nombre_archivo);   
                        $ubicacion_archivo[$x] = $carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    }
            }
            $obj_web_banner_static_left->titulo_h1=strClean($_REQUEST["txt_titulo_h1"]);
            $obj_web_banner_static_left->titulo_span=strClean($_REQUEST["txt_titulo_span"]);
            $obj_web_banner_static_left->parrafo_uno=strClean($_REQUEST["txt_parrafo_uno"]);
            $obj_web_banner_static_left->parrafo_dos=strClean($_REQUEST["txt_parrafo_dos"]);
            $obj_web_banner_static_left->parrafo_tres=strClean($_REQUEST["txt_parrafo_tres"]);
            $obj_web_banner_static_left->titulo_descarga=strClean($_REQUEST["txt_titulo_descarga"]);
            $obj_web_banner_static_left->descripcion_boton_descarga=strClean($_REQUEST["txt_descrip_descarga"]);
            $obj_web_banner_static_left->observacion=strClean($_REQUEST["txt_observacion"]);
            $obj_web_banner_static_left->archivo_descarga = $ubicacion_archivo[0];
            $obj_web_banner_static_left->imagen_hombre    = $ubicacion_archivo[1];
            $obj_web_banner_static_left->imagen_producto  = $ubicacion_archivo[2];
            $obj_web_banner_static_left->imagen_circulo   = $ubicacion_archivo[3];
            $obj_web_banner_static_left->imagen_fondo     = $ubicacion_archivo[4];
        
            if($obj_web_banner_static_left->titulo_h1 == '' || $obj_web_banner_static_left->titulo_span=='' || $obj_web_banner_static_left->parrafo_uno=='' || 
               $obj_web_banner_static_left->parrafo_dos=='' || $obj_web_banner_static_left->parrafo_tres=='' || $obj_web_banner_static_left->titulo_descarga=='' || 
               $obj_web_banner_static_left->descripcion_boton_descarga=='' ||  $obj_web_banner_static_left->archivo_descarga==''|| $obj_web_banner_static_left->imagen_hombre==''|| 
               $obj_web_banner_static_left->imagen_producto==''|| $obj_web_banner_static_left->imagen_circulo=='' || $obj_web_banner_static_left->imagen_fondo=='' ){
                echo "error_datos"; 
                return false;
            }else{
                $obj_web_banner_static_left->create();
                echo "true_create";
                die();
            } 
    }