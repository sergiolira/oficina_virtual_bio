<?php
session_start();
require_once("../../helpers/helpers.php");
include_once("../../model_class/paquete_detalle_producto.php");
$obj_pp= new paquete_detalle_producto();

$formatos_permitidos =  array('pdf','mp4','doc','docx','xlsx','xlsm','mov','wmv','png','jpg','gif');
$formatos_permitidos_ima =  array('png','jpg','gif','jpeg');
/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_pp->id_paquete_detalle_producto=intval(strClean($_REQUEST["id"]));
        $obj_pp->activar();
        echo "true_activado";
        die();
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_pp->id_paquete_detalle_producto=intval(strClean($_REQUEST["id"]));
        $obj_pp->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar Campaña ----*/
if($_REQUEST["id"]>0){
    // $obj_pp->userLogin = $_SESSION['idUser'];
    $obj_pp->id_paquete_detalle_producto=intval(strClean($_REQUEST["id"]));
    $obj_pp->id_paquete_cabecera_producto=strClean($_REQUEST["slt_paquete_producto"]);
    $obj_pp->id_producto= strClean($_REQUEST["slt_producto"]);
    $obj_pp->cantidad=strClean($_REQUEST["txt_cantidad"]);
    $obj_pp->precio_venta_unitario=strClean($_REQUEST["txt_precio_venta"]);
    $obj_pp->observacion=strClean($_REQUEST["txt_observacion"]);
    $obj_pp->id_usuarioregistro=$_SESSION['idUser'];
    $obj_pp->id_usuarioactualiza=$_SESSION['idUser'];
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
        $obj_pp->imagen=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
        $obj_pp->update_imagen();
    }

    if($obj_pp->id_paquete_cabecera_producto == '' || $obj_pp->id_producto == '' || $obj_pp->cantidad == '' || $obj_pp->precio_venta_unitario == '' 
    || $obj_pp->id_paquete_detalle_producto == ''){
        echo "error_datos";
        return false;
    }
    $obj_pp->update();
    echo "true_update";
    die(); 
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
    $obj_pp->id_paquete_cabecera_producto=strClean($_REQUEST["slt_paquete_producto"]);
    $obj_pp->id_producto= strClean($_REQUEST["slt_producto"]);
    $obj_pp->cantidad=strClean($_REQUEST["txt_cantidad"]);
    $obj_pp->precio_venta_unitario=strClean($_REQUEST["txt_precio_venta"]);
    $obj_pp->observacion=strClean($_REQUEST["txt_observacion"]);
    $obj_pp->id_usuarioregistro=$_SESSION['idUser'];
    $obj_pp->id_usuarioactualiza=$_SESSION['idUser'];
    $obj_pp->imagen=$carpeta_ubicacion_bd.$nuevo_nombre_archivo;
    if($obj_pp->id_paquete_cabecera_producto == '' || $obj_pp->id_producto == '' || $obj_pp->cantidad == '' || $obj_pp->precio_venta_unitario == '' ){
        echo "error_datos";
        return false;
    }
    $obj_pp->create();
    echo "true_create";
    die(); 
}

?>
