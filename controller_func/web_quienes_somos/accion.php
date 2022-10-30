<?php 
require_once("../../helpers/helpers.php");
require_once "../../model_class/web_quienes_somos.php";
$obj_quienes_somos=new web_quienes_somos();
$fomato_img = array('png','jpg','gif','jpeg');

if(isset($_REQUEST['opcion_estado'])){
    
    if($_REQUEST['opcion_estado']=="desactivar"){
        $obj_quienes_somos->id_web_quienes_somos=$_REQUEST['id'];
        $obj_quienes_somos->estado(0);
        echo "true";
        die();
    }
    else if($_REQUEST['opcion_estado']=="activar"){
        $obj_quienes_somos->id_web_quienes_somos=$_REQUEST['id'];
        $obj_quienes_somos->estado(1);
        echo "true";
        die();
    }   
}


$obj_quienes_somos->id_web_quienes_somos=$_REQUEST['id'];
$obj_quienes_somos->titulo=$_REQUEST["txt_titulo"];
// $obj_quienes_somos->imagen_principal=$_REQUEST['txt_imagen_p'];
// $obj_quienes_somos->imagen=$_REQUEST['txt_imagen'];
$obj_quienes_somos->subtitulo=$_REQUEST['txt_subtitulo'];
$obj_quienes_somos->parrafo=$_REQUEST['txt_parrafo'];
$obj_quienes_somos->icono=$_REQUEST['txt_icono'];


if($_REQUEST['id']==0){
    if($obj_quienes_somos->id_web_quienes_somos==""||
    $obj_quienes_somos->titulo==""||
    $obj_quienes_somos->imagen_principal==""||
    $obj_quienes_somos->imagen==""||
    $obj_quienes_somos->subtitulo==""||
    $obj_quienes_somos->parrafo==""||
    $obj_quienes_somos->icono==""){
        echo "error_datos";
        return false;
    }
    $obj_quienes_somos->create();
    echo "true";
    die();
}else{
    if($obj_quienes_somos->id_web_quienes_somos==""||
    $obj_quienes_somos->titulo==""||
    $obj_quienes_somos->imagen_principal==""||
    $obj_quienes_somos->imagen==""||
    $obj_quienes_somos->subtitulo==""||
    $obj_quienes_somos->parrafo==""||
    $obj_quienes_somos->icono==""){
        echo "error_datos";
        return false;
    }
    $obj_quienes_somos->update();
    echo "true";
    die();
}


?>