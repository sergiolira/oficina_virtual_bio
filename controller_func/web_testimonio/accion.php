<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/web_testimonio.php");
$obj_web_testimonio= new web_testimonio();
$formatos_permitidos =  array('pdf','mp4','doc','docx','xlsx','xlsm','mov','wmv','png','jpg','gif');
$formatos_permitidos_ima =  array('png','jpg','gif','jpeg');

    if(isset($_REQUEST["accion"])){
        if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
            $obj_web_testimonio->id_web_testimonio=intval(strClean($_REQUEST["id"]));
            $obj_web_testimonio->activar();
            echo "true_activado";
            die();
        }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
            $obj_web_testimonio->id_web_testimonio=intval(strClean($_REQUEST["id"]));
            $obj_web_testimonio->desactivar();
            echo "true_desactivado";
            die();     
        }
    }  

    if($_REQUEST["id"]>0){

            $obj_web_testimonio->id_web_testimonio=intval(strClean($_REQUEST["id"]));
            $obj_web_testimonio->testimonio=strClean($_REQUEST["txt_testimonio"]);
            $obj_web_testimonio->nombre=strClean($_REQUEST["txt_nombre"]);
            $obj_web_testimonio->apellido_paterno=strClean($_REQUEST["txt_ape_paterno"]);
            $obj_web_testimonio->apellido_materno=strClean($_REQUEST["txt_ape_materno"]);
            $obj_web_testimonio->cargo=strClean($_REQUEST["txt_cargo"]);
            $obj_web_testimonio->observacion=strClean($_REQUEST["txt_observacion"]);
                if($_FILES['file_img_poster']['name'] != null ){
                    $nombre_temporal=$_FILES['file_img_poster']['tmp_name'];  
                    $nombreArc = $_FILES["file_img_poster"]["name"];             
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
                    $obj_web_testimonio->imagen_you_poster=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_testimonio->update_imagen_you_poster();
                }
                if($_FILES['file_video']['name'] !=null){
                    $nombre_temporal=$_FILES['file_video']['tmp_name'];  
                    $nombreArc = $_FILES["file_video"]["name"];             
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
                    $obj_web_testimonio->video=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_testimonio->update_video();
                }
                if( $_FILES['file_perfil']['name'] != null){
                    $nombre_temporal=$_FILES['file_perfil']['tmp_name'];  
                    $nombreArc = $_FILES["file_perfil"]["name"];             
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
                    $obj_web_testimonio->foto_perfil=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_testimonio->update_foto_perfil();
                }
            if($obj_web_testimonio->testimonio == '' || $obj_web_testimonio->nombre=='' || $obj_web_testimonio->apellido_paterno=='' || $obj_web_testimonio->apellido_materno=='' || $obj_web_testimonio->cargo==''){
                echo "error_datos"; 
                return false;
            }else{ 
                $obj_web_testimonio->update();
                echo "true_update";
                die();
            }
    }else{      
            if( $_FILES['file_perfil']['name'] != null && $_FILES['file_img_poster']['name'] != null && $_FILES['file_video']['name'] !=null ){ //valida que haya archivos
                $array_nombre_temporal = array($_FILES['file_perfil']['tmp_name'] , $_FILES['file_img_poster']['tmp_name'], $_FILES['file_video']['tmp_name']);
                $array_nombreArc       = array($_FILES['file_perfil']['name'] , $_FILES['file_img_poster']['name'], $_FILES['file_video']['name']);
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
            $obj_web_testimonio->testimonio=strClean($_REQUEST["txt_testimonio"]);
            $obj_web_testimonio->nombre=strClean($_REQUEST["txt_nombre"]);
            $obj_web_testimonio->apellido_paterno=strClean($_REQUEST["txt_ape_paterno"]);
            $obj_web_testimonio->apellido_materno=strClean($_REQUEST["txt_ape_materno"]);
            $obj_web_testimonio->foto_perfil       = $ubicacion_archivo[0];
            $obj_web_testimonio->imagen_you_poster = $ubicacion_archivo[1];
            $obj_web_testimonio->video             = $ubicacion_archivo[2];
            $obj_web_testimonio->cargo=strClean($_REQUEST["txt_cargo"]);
            $obj_web_testimonio->observacion=strClean($_REQUEST["txt_observacion"]);
            if($obj_web_testimonio->testimonio == '' || $obj_web_testimonio->nombre=='' || $obj_web_testimonio->apellido_paterno=='' || $obj_web_testimonio->apellido_materno=='' || $obj_web_testimonio->cargo=='' || $obj_web_testimonio->foto_perfil=='' || $obj_web_testimonio->imagen_you_poster=='' || $obj_web_testimonio->video==''){
                echo "error_datos"; 
                return false;
            }else{
                $obj_web_testimonio->create();
                echo "true_create";
                die();
            } 
    }