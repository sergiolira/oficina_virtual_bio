<?php
session_start();
include_once("../../model_class/solicitud_arbol_virtual.php");
include_once("../../model_class/representante.php");
$obj=new solicitud_arbol_virtual();
$obj_r=new representante();

$obj->nro_solicitud=$_REQUEST["nrosolicitud"];

if(!isset($_REQUEST["patrocinador"]) and ($_SESSION["id_rol"]=="4" || $_SESSION["id_rol"]=="representante")){
    echo "auto";
    die();
}


if(trim($_REQUEST["txtruc_buscar"])!=""){
    $inicial=$_REQUEST["txtruc_buscar"];
  }
/**Hallamos tipo de solicitante y obtenemos ruc o id de solicitante */
if($_SESSION["id_rol"]=="4" || $_SESSION["id_rol"]=="representante"){
    if($_SESSION["posicion"]=="0"){
        $obj->tipo_solicitante="Lider de Red";
        $obj->id_solicitante=$_SESSION["ruc"];
        $obj->ruc_inicial=$_SESSION["ruc"];
        $obj->ruc_lider_red=$_SESSION["ruc"];
        $obj->id_usuarioregistro="1";
        $obj->id_usuarioactualiza="1";
    }else{
        $obj->tipo_solicitante="Representante";
        $obj->id_solicitante=$_SESSION["ruc"];
        $obj->ruc_inicial=$_SESSION["ruc"];
        $obj->ruc_lider_red=$_SESSION["patrocinador"];
        $obj->id_usuarioregistro="1";
        $obj->id_usuarioactualiza="1";
    }
}else{
    /**Hallamos el Lider */
    $obj_r->ruc=$_REQUEST["usuario"];
    $obj_r->consultar_datos_ruc();   
    if($obj_r->patrocinador=="0"){
        $patrocinador=$inicial;   
    }else{
        $patrocinador=$obj_r->patrocinador;
    }
    $obj->tipo_solicitante="Administrativo";
    $obj->id_solicitante=$_SESSION["id_usuario"];
    $obj->ruc_inicial=$inicial;
    $obj->ruc_lider_red=$patrocinador;
    $obj->id_usuarioregistro=$_SESSION["id_usuario"];
    $obj->id_usuarioactualiza=$_SESSION["id_usuario"];
}

$obj->proceso="remove";

if(!isset($_REQUEST["patrocinador"])){
    $obj->ruc_patrocinador=$inicial;
}elseif($_REQUEST["patrocinador"]=="1"){
    $obj->ruc_patrocinador=$obj_r->patrocinador_directo;
}else{
    $obj->ruc_patrocinador=$_REQUEST["patrocinador"];
}
$obj->ruc_usuario=$_REQUEST["usuario"];
$obj->posicion=$_REQUEST["posicion"];
$obj->estado="1";
$obj->save();
echo "true";
?>