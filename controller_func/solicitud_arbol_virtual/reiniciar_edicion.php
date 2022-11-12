<?php
session_start();
include_once("../../model_class/solicitud_arbol_virtual.php");
$obj=new solicitud_arbol_virtual();

$obj->nro_solicitud=$_REQUEST["nrosolicitud"];
if(trim($_POST["txtruc_buscar"])!=""){
    $inicial=$_POST["txtruc_buscar"];
  }else{
      echo "false";
      die();
  }

$obj->ruc_inicial=$inicial;
$val=$obj->validar_nro_solicitud();
if($val>0){
$obj->delete_nro_solicitud();
echo "true";
die();
}else{
echo "ya_se_reinicio";
die();
}

?>