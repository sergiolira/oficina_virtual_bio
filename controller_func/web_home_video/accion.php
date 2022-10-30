<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/web_home_video.php");
$obj_web_home_video = new web_home_video();
$formatos_permitidos =  array('pdf','mp4','doc','docx','xlsx','xlsm','mov','wmv','png','jpg','gif');
$formatos_permitidos_ima =  array('png','jpg','gif','jpeg');

    if(isset($_REQUEST["accion"])){
        if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
            $obj_web_home_video->id_web_home_video=intval(strClean($_REQUEST["id"]));
            $obj_web_home_video->activar();
            echo "true_activado";
            die();
        }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
            $obj_web_home_video->id_web_home_video=intval(strClean($_REQUEST["id"]));
            $obj_web_home_video->desactivar();
            echo "true_desactivado";
            die();     
        }
    }  

    if($_REQUEST["id"]>0){ 
            $obj_web_home_video->id_web_home_video=intval(strClean($_REQUEST["id"]));
            $obj_web_home_video->titulo_h2=strClean($_REQUEST["txt_titulo_h2"]);
            $obj_web_home_video->parrafo=strClean($_REQUEST["txt_parrafo"]);
            $obj_web_home_video->observacion=strClean($_REQUEST["txt_observacion"]);
                if($_FILES['input_imagen_poster']['tmp_name']!=null){
                    $nombre_temporal=$_FILES['input_imagen_poster']['tmp_name'];  
                    $nombreArc = $_FILES["input_imagen_poster"]["name"];             
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
                    $obj_web_home_video->imagen_you_poster=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_home_video->update_imagen_poster();
                }
                if($_FILES['input_imagen_fondo']['tmp_name']!=null){
                    $nombre_temporal=$_FILES['input_imagen_fondo']['tmp_name'];  
                    $nombreArc = $_FILES["input_imagen_fondo"]["name"];             
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
                    $obj_web_home_video->imagen_fondo=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_home_video->update_imagen_fondo();
                }
                if($_FILES['input_video']['tmp_name']!=null){
                    $nombre_temporal=$_FILES['input_video']['tmp_name'];  
                    $nombreArc = $_FILES["input_video"]["name"];             
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
                    $obj_web_home_video->enlace_video=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_home_video->update_enlace_video();
                }
            if($obj_web_home_video->titulo_h2=='' ||  $obj_web_home_video->parrafo==''){
                echo "error_datos"; 
                return false;
            }else{
                $obj_web_home_video->update();
                echo "true_update";
                die();
            }
    }else{   
            if( $_FILES['input_imagen_poster']['name'] != null && $_FILES['input_imagen_fondo']['name'] != null && $_FILES['input_video']['name'] !=null ){ //valida que haya archivos
                $array_nombre_temporal = array($_FILES['input_imagen_poster']['tmp_name'] , $_FILES['input_imagen_fondo']['tmp_name'], $_FILES['input_video']['tmp_name']);
                $array_nombreArc       = array($_FILES['input_imagen_poster']['name'] , $_FILES['input_imagen_fondo']['name'], $_FILES['input_video']['name']);
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
            $obj_web_home_video->titulo_h2=strClean($_REQUEST["txt_titulo_h2"]);
            $obj_web_home_video->parrafo=strClean($_REQUEST["txt_parrafo"]);
            $obj_web_home_video->imagen_you_poster = $ubicacion_archivo[0];
            $obj_web_home_video->imagen_fondo      = $ubicacion_archivo[1];
            $obj_web_home_video->enlace_video      = $ubicacion_archivo[2];
            $obj_web_home_video->observacion=strClean($_REQUEST["txt_observacion"]);
            if($obj_web_home_video->titulo_h2=='' ||  $obj_web_home_video->parrafo=='' || $obj_web_home_video->imagen_you_poster =='' || $obj_web_home_video->imagen_fondo =='' || $obj_web_home_video->enlace_video ==''){
                echo "error_datos"; 
                return false;
            }else{
                $obj_web_home_video->create();
                echo "true_create";
                die();
            }
    }