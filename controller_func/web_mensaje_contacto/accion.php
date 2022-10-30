<?php 
require_once("../../helpers/helpers.php");
require_once "../../model_class/web_mensaje_contacto.php";
$obj_web_mensaje=new web_mensaje_contacto();

if(isset($_REQUEST['opcion_estado'])){
    
    if($_REQUEST['opcion_estado']=="desactivar"){
        $obj_web_mensaje->id_web_mensaje_contacto=$_REQUEST['id'];
        $obj_web_mensaje->estado(0);
        echo "true";
        die();
    }
    else if($_REQUEST['opcion_estado']=="activar"){
        $obj_web_mensaje->id_web_mensaje_contacto=$_REQUEST['id'];
        $obj_web_mensaje->estado(1);
        echo "true";
        die();
    }   
}

$obj_web_mensaje->id_web_mensaje_contacto=strClean($_REQUEST['id']);
$obj_web_mensaje->nombre_apellido=strClean($_REQUEST["txt_nom"]);
$obj_web_mensaje->correo=strClean($_REQUEST['txt_correo']);
$obj_web_mensaje->celular=strClean($_REQUEST['txt_celular']);
$obj_web_mensaje->mensaje=strClean($_REQUEST['txt_mensaje']);

if($_REQUEST['id'] == 0){
    if($obj_web_mensaje->id_web_mensaje_contacto==""||
    $obj_web_mensaje->nombre_apellido==""||
    $obj_web_mensaje->correo==""||
    $obj_web_mensaje->celular==""||
    $obj_web_mensaje->mensaje==""){
        echo "error_datos";
        return false;
    }

    $obj_web_mensaje->create();
    echo "true";
    die();
}else{
    if($obj_web_mensaje->id_web_mensaje_contacto==""||
    $obj_web_mensaje->nombre_apellido==""||
    $obj_web_mensaje->correo==""||
    $obj_web_mensaje->celular==""||
    $obj_web_mensaje->mensaje==""){
        echo "error_datos";
        return false;
    }
    $obj_web_mensaje->id_web_mensaje_contacto=$_REQUEST['id'];
    $obj_web_mensaje->update();
    
    echo "true";
    die();
}
?>