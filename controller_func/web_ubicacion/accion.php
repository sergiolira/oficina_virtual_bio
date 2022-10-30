<?php
require_once("../../helpers/helpers.php");
require_once "../../model_class/web_ubicacion.php";
$obj_web_ub = new web_ubicacion();


$formatos_permitidos_foto =  array('png','jpg','jpeg');

if(isset($_REQUEST['opcion_estado'])){
    
    if($_REQUEST['opcion_estado']=="desactivar"){
        $obj_web_ub->id_web_ubicacion=$_REQUEST['id'];
        $obj_web_ub->estado(1);
        echo "true";
        die();
    } else if ($_REQUEST['opcion_estado'] == "activar") {
        $obj_web_ub->id_web_ubicacion = $_REQUEST['id'];
        $obj_web_ub->estado(0);
        echo "true";
        die();
    }
}

<<<<<<< HEAD
$obj_web_ub->id_web_ubicacion = strClean($_REQUEST['id']);
$obj_web_ub->id_pais = strClean($_REQUEST["sltpais"]);
$obj_web_ub->id_departamento = strClean($_REQUEST['sltdepartamento']);
$obj_web_ub->id_provincia = strClean($_REQUEST['sltprovincia']);
$obj_web_ub->id_distrito = strClean($_REQUEST['sltdistrito']);
$obj_web_ub->direccion = strClean($_REQUEST['txt_direccion']);
$obj_web_ub->latitud = strClean($_REQUEST['txt_latitud']);
$obj_web_ub->longitud = strClean($_REQUEST['txt_longitud']);
$obj_web_ub->imagen = strClean($_REQUEST['txt_img']);

if ($_REQUEST['id'] == 0) {
    if (
        $obj_web_ub->id_web_ubicacion == "" || $obj_web_ub->id_pais == "" || $obj_web_ub->id_departamento == "" || $obj_web_ub->id_provincia == ""
        || $obj_web_ub->id_distrito == "" || $obj_web_ub->direccion == "" || $obj_web_ub->latitud == "" || $obj_web_ub->longitud == "" || $obj_web_ub->imagen == ""
    ) {
        echo "error_datos";
        return false;
    }

    $obj_web_ub->create();
    echo "true";
    die();
} else {
    if (
        $obj_web_ub->id_web_ubicacion == "" || $obj_web_ub->id_pais == "" || $obj_web_ub->id_departamento == "" || $obj_web_ub->id_provincia == ""
        || $obj_web_ub->id_distrito == "" || $obj_web_ub->direccion == "" || $obj_web_ub->latitud == "" || $obj_web_ub->longitud == "" || $obj_web_ub->imagen == ""
    ) {
        echo "error_datos";
        return false;
    }
    $obj_web_ub->update();
    echo "true";
    die();
=======


if($_REQUEST['id']==0){
     /**Gestion de imagen */
    $nombre_temporal_f_ubi=$_FILES['file_img_web_ubi']['tmp_name'];  
    $nombreArc_f_ubi = $_FILES["file_img_web_ubi"]["name"];             
    $extensionArc_f_ubi = pathinfo($nombreArc_f_ubi, PATHINFO_EXTENSION);
    $nuevo_nombre_archivo_f_ubi="fp_".date('dmy')."_".date('Hs')."_".rand(10, 99).".".$extensionArc_f_ubi;
    $sizeArc_f_ubi=filesize($nombre_temporal_f_ubi);

    if($nombre_temporal_f_ubi!="" || $nombre_temporal_f_ubi!="null" || $nombre_temporal_f_ubi!="NULL" || !is_null($nombre_temporal_f_ubi))
    {
   
        if(!in_array($extensionArc_f_ubi, $formatos_permitidos_foto)) {
            echo 'error_extencion_imagen';
            die();
        }
        if(!isset($_FILES) || empty($_FILES) && ($_REQUEST["hdnid"]=="" || $_REQUEST["hdnid"]=="0")){
            echo 'error_no_archivo';
            exit();
        }
   
       //  $imagen = getimagesize($nombre_temporal_f_ubi);
       //  $ancho = $imagen[0];              //Ancho
       //  $alto = $imagen[1]; 
   
       //  if($ancho!=400 && $alto!=400){
       //    echo 'error_tamaño_imagen';
       //    die();
       //  }
   
    }else{
        echo 'error_no_archivo';
        exit();
    }
   
   
   /**Gestion de imagen */
   $sub_carpeta_f_ubi=date('dmy').date('His')."_".rand(10, 99);
   
   $path_f_ubi = '../../archivos/foto_web_ubicacion/'.$sub_carpeta_f_ubi;
   
   if (!file_exists($path_f_ubi)) {
       mkdir($path_f_ubi, 0777, true);
   }
   
   $carpeta_ubicacion_bd_f_ubi="archivos/foto_web_ubicacion/".$sub_carpeta_f_ubi."/";
   
   move_uploaded_file($nombre_temporal_f_ubi, '../../archivos/foto_web_ubicacion/'.$sub_carpeta_f_ubi.'/'.$nuevo_nombre_archivo_f_ubi);
   
    $obj_web_ub->id_web_ubicacion=$_REQUEST['id'];
    $obj_web_ub->id_pais=$_REQUEST["sltpais"];
    $obj_web_ub->id_departamento=$_REQUEST['sltdepartamento'];
    $obj_web_ub->id_provincia=$_REQUEST['sltprovincia'];
    $obj_web_ub->id_distrito=$_REQUEST['sltdistrito'];
    $obj_web_ub->direccion=$_REQUEST['txt_direccion'];
    $obj_web_ub->telefono_1=$_REQUEST["txt_telef_1"];
    $obj_web_ub->telefono_2=$_REQUEST["txt_telef_2"];
    $obj_web_ub->latitud=$_REQUEST['txt_latitud'];
    $obj_web_ub->longitud=$_REQUEST['txt_longitud'];
    $obj_web_ub->imagen=$carpeta_ubicacion_bd_f_ubi.$nuevo_nombre_archivo_f_ubi;
    $obj_web_ub->create();
    echo "true";
    die();
}else{

     /**Gestion de imagen */
     $nombre_temporal_f_ubi=$_FILES['file_img_web_ubi']['tmp_name'];  
     $nombreArc_f_ubi = $_FILES["file_img_web_ubi"]["name"];             
     $extensionArc_f_ubi = pathinfo($nombreArc_f_ubi, PATHINFO_EXTENSION);
     $nuevo_nombre_archivo_f_ubi="fp_".date('dmy')."_".date('Hs')."_".rand(10, 99).".".$extensionArc_f_ubi;
     $sizeArc_f_ubi=filesize($nombre_temporal_f_ubi);
 
     if($nombre_temporal_f_ubi=="" || $nombre_temporal_f_ubi=="null" || $nombre_temporal_f_ubi=="NULL" || !is_null($nombre_temporal_f_ubi))
     {

     }else{
             
        if(!in_array($extensionArc_f_ubi, $formatos_permitidos_foto)) {
            echo 'error_extencion_imagen';
            die();
        }
        if(!isset($_FILES) || empty($_FILES) && ($_REQUEST["hdnid"]=="" || $_REQUEST["hdnid"]=="0")){
            echo 'error_no_archivo';
            exit();
        }
   
       //  $imagen = getimagesize($nombre_temporal_f_ubi);
       //  $ancho = $imagen[0];              //Ancho
       //  $alto = $imagen[1]; 
   
       //  if($ancho!=400 && $alto!=400){
       //    echo 'error_tamaño_imagen';
       //    die();
       //  }
     }
    
     if($nombre_temporal_f_ubi!="" || $nombre_temporal_f_ubi!="null" || $nombre_temporal_f_ubi!="NULL" || !is_null($nombre_temporal_f_ubi))
     {
        /**Gestion de imagen */
        $sub_carpeta_f_ubi=date('dmy').date('His')."_".rand(10, 99);
        
        $path_f_ubi = '../../archivos/foto_web_ubicacion/'.$sub_carpeta_f_ubi;
        
        if (!file_exists($path_f_ubi)) {
            mkdir($path_f_ubi, 0777, true);
        }
        
        $carpeta_ubicacion_bd_f_ubi="archivos/foto_web_ubicacion/".$sub_carpeta_f_ubi."/";
        
        move_uploaded_file($nombre_temporal_f_ubi, '../../archivos/foto_web_ubicacion/'.$sub_carpeta_f_ubi.'/'.$nuevo_nombre_archivo_f_ubi);
        $obj_web_ub->imagen=$carpeta_ubicacion_bd_f_ubi.$nuevo_nombre_archivo_f_ubi;
        $obj_web_ub->id_web_ubicacion=$_REQUEST['id'];
        $obj_web_ub->update_foto();
    }

        $obj_web_ub->id_web_ubicacion=$_REQUEST['id'];
        $obj_web_ub->id_pais=$_REQUEST["sltpais"];
        $obj_web_ub->id_departamento=$_REQUEST['sltdepartamento'];
        $obj_web_ub->id_provincia=$_REQUEST['sltprovincia'];
        $obj_web_ub->id_distrito=$_REQUEST['sltdistrito'];
        $obj_web_ub->direccion=$_REQUEST['txt_direccion'];
        $obj_web_ub->telefono_1=$_REQUEST["txt_telef_1"];
        $obj_web_ub->telefono_2=$_REQUEST["txt_telef_2"];
        $obj_web_ub->latitud=$_REQUEST['txt_latitud'];
        $obj_web_ub->longitud=$_REQUEST['txt_longitud'];
        
        $obj_web_ub->update();
        echo "true";
        die();
>>>>>>> 3139a5ef66a5662297a67dd4f742f16044420dbd
}
