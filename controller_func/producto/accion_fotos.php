<?php
session_start();
require_once("../../helpers/helpers.php");
include_once("../../model_class/imagen_producto.php");
$obj_p= new imagen_producto();


$formatos_permitidos_foto =  array('png','jpg','jpeg');

if($_REQUEST["id"]>0){

    /*Gestion de imagen perfil */
    $nombre_temporal_p=$_FILES['file_fotos_producto']['tmp_name'];  
    $nombreArc_p = $_FILES["file_fotos_producto"]["name"];             
    $extensionArc_p = pathinfo($nombreArc_p, PATHINFO_EXTENSION);
    $nuevo_nombre_archivo_p="fp_".date('dmy')."_".date('Hs')."_".rand(10, 99).".".$extensionArc_p;
    $sizeArc_fp=filesize($nombre_temporal_p);
    if($nombre_temporal_p!="" || $nombre_temporal_p!="null" || $nombre_temporal_p!="NULL" || !is_null($nombre_temporal_p))
    {
    
        if(!in_array($extensionArc_p, $formatos_permitidos_foto)) {
            echo 'error_extencion_imagen';
            die();
        }
        if(!isset($_FILES) || empty($_FILES) && ($_REQUEST["hdnid"]=="" || $_REQUEST["hdnid"]=="0")){
            echo 'error_no_archivo';
            exit();
        }
    
        $imagen = getimagesize($nombre_temporal_p);
        $ancho = $imagen[0];              //Ancho
        $alto = $imagen[1]; 
    
        // if($ancho!=400 && $alto!=400){
        //   echo 'error_tamaño_imagen';
        //   die();
        // }
    
    }
    
    if($nombre_temporal_p!="" || $nombre_temporal_p!="null" || $nombre_temporal_p!="NULL" || !is_null($nombre_temporal_p)){
    
        $sub_carpeta_p=date('dmy').date('His')."_".rand(10, 99);
    
        $path_fp = '../../archivos/fotos_producto/'.$sub_carpeta_p;
    
        if (!file_exists($path_fp)) {
            mkdir($path_fp, 0777, true);
        }
    
        $carpeta_ubicacion_bd_p="archivos/fotos_producto/".$sub_carpeta_p."/";
    
        move_uploaded_file($nombre_temporal_p, '../../archivos/fotos_producto/'.$sub_carpeta_p.'/'.$nuevo_nombre_archivo_p);
        $obj_p->url_imagen=$carpeta_ubicacion_bd_p.$nuevo_nombre_archivo_p;
        $obj_p->tamanio_imagen=$sizeArc_fp;
        $obj_p->id_producto= intval(strClean($_REQUEST["id"]));
        $obj_p->id_usuarioregistro=$_SESSION['idUser'];
        $obj_p->id_usuarioactualiza=$_SESSION['idUser'];
        $obj_p->foto_producto();
        echo "true_foto_producto";
        
    
    }
    
    }

?>