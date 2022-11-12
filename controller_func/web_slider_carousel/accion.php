<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/web_slider_carousel.php");
$obj_web_slider_carousel = new web_slider_carousel();

$formatos_permitidos =  array('pdf','mp4','doc','docx','xlsx','xlsm','mov','wmv','png','jpg','gif');
$formatos_permitidos_ima =  array('png','jpg','gif','jpeg');

    if(isset($_REQUEST["accion"])){
        if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
            $obj_web_slider_carousel->id_web_slider_carousel=intval(strClean($_REQUEST["id"]));
            $obj_web_slider_carousel->activar();
            echo "true_activado";
            die();
        }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
            $obj_web_slider_carousel->id_web_slider_carousel=intval(strClean($_REQUEST["id"]));
            $obj_web_slider_carousel->desactivar();
            echo "true_desactivado";
            die();     
        }
    }  

    if($_REQUEST["id"]>0){ 
            $obj_web_slider_carousel->id_web_slider_carousel=intval(strClean($_REQUEST["id"]));
            $obj_web_slider_carousel->posicion_imagen=strClean($_REQUEST["slt_posicion_imagen"]);
            $obj_web_slider_carousel->h1=strClean($_REQUEST["txt_titulo_h1"]);
            $obj_web_slider_carousel->span=strClean($_REQUEST["txt_span"]);
            $obj_web_slider_carousel->parrafo=strClean($_REQUEST["txt_parrafo"]);
            $obj_web_slider_carousel->boton_1_desc=strClean($_REQUEST["txt_desc_boton_1"]);
            $obj_web_slider_carousel->boton_2_desc=strClean($_REQUEST["txt_desc_boton_2"]);
            $obj_web_slider_carousel->boton_1_enlace=strClean($_REQUEST["txt_enlace_boton_1"]);
            $obj_web_slider_carousel->boton_2_enlace=strClean($_REQUEST["txt_enlace_boton_2"]);
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
                    $obj_web_slider_carousel->imagen=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_slider_carousel->update_imagen();
                }
            if($obj_web_slider_carousel->h1==''){
                    echo "error_datos"; 
                    return false;
            }else{
                $obj_web_slider_carousel->update();
                echo "true_update";
                die();
            }
        
    }else{   
            if($_FILES['input_archivo']['tmp_name'] != null){ //SOLO PARA UNA IMAGEN 
                $nombre_temporal = $_FILES['input_archivo']['tmp_name'];  //5
                $nombreArc = $_FILES["input_archivo"]["name"];   //632423423423
                $extensionArc = pathinfo($nombreArc, PATHINFO_EXTENSION);
                $nuevo_nombre_archivo = date('dmy')."_".date('Hs')."_".rand(10, 99).".".$extensionArc;
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
            $obj_web_slider_carousel->posicion_imagen=strClean($_REQUEST["slt_posicion_imagen"]);
            $obj_web_slider_carousel->h1=strClean($_REQUEST["txt_titulo_h1"]);
            $obj_web_slider_carousel->span=strClean($_REQUEST["txt_span"]);
            $obj_web_slider_carousel->parrafo=strClean($_REQUEST["txt_parrafo"]);
            $obj_web_slider_carousel->boton_1_desc=strClean($_REQUEST["txt_desc_boton_1"]);
            $obj_web_slider_carousel->boton_2_desc=strClean($_REQUEST["txt_desc_boton_2"]);
            $obj_web_slider_carousel->boton_1_enlace=strClean($_REQUEST["txt_enlace_boton_1"]);
            $obj_web_slider_carousel->boton_2_enlace=strClean($_REQUEST["txt_enlace_boton_2"]);
            $obj_web_slider_carousel->imagen=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
            if($obj_web_slider_carousel->h1=='' || $obj_web_slider_carousel->span==""|| $obj_web_slider_carousel->parrafo=="" || $obj_web_slider_carousel->boton_1_desc=="" 
            || $obj_web_slider_carousel->boton_2_desc=="" || $obj_web_slider_carousel->boton_1_enlace=="" || $obj_web_slider_carousel->boton_2_enlace==""){

                echo "error_datos"; 
                return false;
            }else{
                $obj_web_slider_carousel->create();
                echo "true_create";
                die();
            }
    }