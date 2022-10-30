<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/web_home_offer.php");
$obj_web_home_offer= new web_home_offer();
$formatos_permitidos =  array('pdf','mp4','doc','docx','xlsx','xlsm','mov','wmv','png','jpg','gif');
$formatos_permitidos_ima =  array('png','jpg','gif','jpeg');

    if(isset($_REQUEST["accion"])){
        if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
            $obj_web_home_offer->id_web_home_offer=intval(strClean($_REQUEST["id"]));
            $obj_web_home_offer->activar();
            echo "true_activado";
            die();
        }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
            $obj_web_home_offer->id_web_home_offer=intval(strClean($_REQUEST["id"]));
            $obj_web_home_offer->desactivar();
            echo "true_desactivado";
            die();     
        }
    }  

    if($_REQUEST["id"]>0){ 
            $carpeta_ubicacion_bd = null;
            $obj_web_home_offer->id_web_home_offer=intval(strClean($_REQUEST["id"]));
            $obj_web_home_offer->titulo_h2=strClean($_REQUEST["txt_titulo_h2"]);
            $obj_web_home_offer->parrafo=strClean($_REQUEST["txt_parrafo"]);
            $obj_web_home_offer->desc_boton=strClean($_REQUEST["txt_desc_boton"]);
            $obj_web_home_offer->span_producto=strClean($_REQUEST["txt_span_producto"]);
            $obj_web_home_offer->enlace=strClean($_REQUEST["txt_enlace"]);
            $obj_web_home_offer->observacion=strClean($_REQUEST["txt_observacion"]);
                if($_FILES['input_imagen_producto']['tmp_name']!=null){
                    $nombre_temporal=$_FILES['input_imagen_producto']['tmp_name'];  
                    $nombreArc = $_FILES["input_imagen_producto"]["name"];             
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
                    $obj_web_home_offer->imagen_producto=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_home_offer->update_imagen_producto();
                }
                if($_FILES['input_imagen_mujer']['tmp_name']!=null){
                    $nombre_temporal=$_FILES['input_imagen_mujer']['tmp_name'];  
                    $nombreArc = $_FILES["input_imagen_mujer"]["name"];             
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
                    $obj_web_home_offer->imagen_mujer=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
                    $obj_web_home_offer->update_imagen_mujer();
                }
            if($obj_web_home_offer->titulo_h2=='' ||  $obj_web_home_offer->parrafo=='' || $obj_web_home_offer->desc_boton=='' || $obj_web_home_offer->span_producto=='' || $obj_web_home_offer->enlace==''){
                echo "error_datos"; 
                return false;
            }else{
                $obj_web_home_offer->update();
                echo "true_update";
                die();
            }
        

    }else{   
            if( $_FILES['input_imagen_producto']['name'] != null && $_FILES['input_imagen_mujer']['name'] != null){ //valida que haya archivos
                $array_nombre_temporal = array($_FILES['input_imagen_producto']['tmp_name'] , $_FILES['input_imagen_mujer']['tmp_name']);
                $array_nombreArc       = array($_FILES['input_imagen_producto']['name'] , $_FILES['input_imagen_mujer']['name']);
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
            $obj_web_home_offer->titulo_h2=strClean($_REQUEST["txt_titulo_h2"]);
            $obj_web_home_offer->parrafo=strClean($_REQUEST["txt_parrafo"]);
            $obj_web_home_offer->desc_boton=strClean($_REQUEST["txt_desc_boton"]);
            $obj_web_home_offer->imagen_producto = $ubicacion_archivo[0];
            $obj_web_home_offer->imagen_mujer    = $ubicacion_archivo[1];
            $obj_web_home_offer->span_producto=strClean($_REQUEST["txt_span_producto"]);
            $obj_web_home_offer->enlace=strClean($_REQUEST["txt_enlace"]);
            $obj_web_home_offer->observacion=strClean($_REQUEST["txt_observacion"]);
            if($obj_web_home_offer->titulo_h2=='' ||  $obj_web_home_offer->parrafo=='' || $obj_web_home_offer->desc_boton=='' || $obj_web_home_offer->span_producto=='' 
            || $obj_web_home_offer->enlace=='' || $obj_web_home_offer->imagen_producto =='' || $obj_web_home_offer->imagen_mujer==''){
                echo "error_datos"; 
                return false;
            }else{
                $obj_web_home_offer->create();
                echo "true_create";
                die();
            }    
    }