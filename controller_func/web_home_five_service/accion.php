<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/web_home_five_service.php");
$obj_web_home_five_service = new web_home_five_service();

$formatos_permitidos =  array('pdf','mp4','doc','docx','xlsx','xlsm','mov','wmv','png','jpg','gif');
$formatos_permitidos_ima =  array('png','jpg','gif','jpeg');

    if(isset($_REQUEST["accion"])){
        if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
            $obj_web_home_five_service->id_web_home_five_service=intval(strClean($_REQUEST["id"]));
            $obj_web_home_five_service->activar();
            echo "true_activado";
            die();
        }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
            $obj_web_home_five_service->id_web_home_five_service=intval(strClean($_REQUEST["id"]));
            $obj_web_home_five_service->desactivar();
            echo "true_desactivado";
            die();     
        }
    }  

    if($_REQUEST["id"]>0){ 
            //$carpeta_ubicacion_bd = null;
            $obj_web_home_five_service->id_web_home_five_service=intval($_REQUEST["id"]);
            $obj_web_home_five_service->titulo_h3=strClean($_REQUEST["txt_titulo_h3"]);
            $obj_web_home_five_service->parrafo=strClean($_REQUEST["txt_parrafo"]);
            $obj_web_home_five_service->desc_boton=strClean($_REQUEST["txt_desc_boton"]);
            $obj_web_home_five_service->enlace=strClean($_REQUEST["txt_enlace"]);
            $obj_web_home_five_service->tipo=strClean($_REQUEST["txt_tipo"]);
            $obj_web_home_five_service->observacion=strClean($_REQUEST["txt_observacion"]);
                if($_FILES['input_archivo']['tmp_name']!=null){
                    $nombre_temporal=$_FILES['input_archivo']['tmp_name'];  
                    $nombreArc = $_FILES["input_archivo"]["name"];             
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
                    $obj_web_home_five_service->imagen=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_home_five_service->update_imagen();
                }
            if($obj_web_home_five_service->titulo_h3=='' ||  $obj_web_home_five_service->parrafo=='' || $obj_web_home_five_service->desc_boton=='' ||
            $obj_web_home_five_service->enlace=='' || $obj_web_home_five_service->tipo==''){
                echo "error_datos"; 
                return false;
            }else{    
                $obj_web_home_five_service->update();
                echo "true_update";
                die();
            }
        
    }else{   
            if($_FILES['input_archivo']['tmp_name']!=null){
                $nombre_temporal=$_FILES['input_archivo']['tmp_name'];  
                $nombreArc = $_FILES["input_archivo"]["name"];             
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
            }
            $obj_web_home_five_service->titulo_h3=strClean($_REQUEST["txt_titulo_h3"]);
            $obj_web_home_five_service->parrafo=strClean($_REQUEST["txt_parrafo"]);
            $obj_web_home_five_service->desc_boton=strClean($_REQUEST["txt_desc_boton"]);
            $obj_web_home_five_service->enlace=strClean($_REQUEST["txt_enlace"]);
            $obj_web_home_five_service->tipo=strClean($_REQUEST["txt_tipo"]);
            $obj_web_home_five_service->imagen=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
            $obj_web_home_five_service->observacion=strClean($_REQUEST["txt_observacion"]);

            if($obj_web_home_five_service->titulo_h3=='' ||  $obj_web_home_five_service->parrafo=='' || $obj_web_home_five_service->desc_boton=='' ||
            $obj_web_home_five_service->enlace=='' || $obj_web_home_five_service->tipo=='' ||  $obj_web_home_five_service->imagen ==''){
                echo "error_datos"; 
                return false;
            }else{
                $obj_web_home_five_service->create();
                echo "true_create";
                die();
            }    
    }