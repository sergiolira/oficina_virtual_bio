<?php
session_start();
if(!isset($_SESSION['correo']) || $_SESSION["correo"]==""){
    include_once("../funciones.php");
    $obj= new funciones();
    $obj->delete_session_usuario();
    $obj->delete_session_post();
    echo "session_expired";
    die();
}
include_once("../../model_class/registro_ventas_oncosalud.php");
$objr=new registro_ventas_oncosalud();
$objr->nro_solicitud=$_REQUEST["txtnrosolicitud_rec_sub"];
$objr->id_registro_ventas_oncosalud=$_REQUEST["hdnid"];


if(isset($_REQUEST["accion"])){

    $rsr=(integer)$objr->validar_nrosolicitud_rechazada();
    if($rsr>0){
        echo "true";
        die();
        }

}


if($objr->id_registro_ventas_oncosalud==0){ 
    $rsr=(integer)$objr->validar_nrosolicitud_rechazada();
    if($rsr>0){
        echo "true_doble";
        die();
        }

    $rsr_sub=(integer)$objr->validar_nrosolicitud_rechazada_subsanada();    
    if($rsr_sub>0){
        echo "true_r_s";
        die();  
    }
}else{
    if(isset($_REQUEST["txtnrosolicitud"])){
        $objr->nro_solicitud_subsanada=$_REQUEST["txtnrosolicitud"];
        }
    if($_REQUEST["txtnrosolicitud"]==$_REQUEST["txtnrosolicitud_rec_sub"]){
        echo "true_doble";
        die();
    }

    $rsr_sub=(integer)$objr->validar_nrosolicitud_rechazada_subsanada_edit();
    if($rsr_sub>0){
        echo "true_r_s";
        die();  
    }
}





echo "false";
die();

?>