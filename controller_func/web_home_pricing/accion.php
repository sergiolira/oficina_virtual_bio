<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/web_home_pricing.php");
$obj_web_home_pricing= new web_home_pricing();

    if(isset($_REQUEST["accion"])){
        if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
            $obj_web_home_pricing->id_web_home_pricing=intval(strClean($_REQUEST["id"]));
            $obj_web_home_pricing->activar();
            echo "true_activado";
            die();
        }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
            $obj_web_home_pricing->id_web_home_pricing=intval(strClean($_REQUEST["id"]));
            $obj_web_home_pricing->desactivar();
            echo "true_desactivado";
            die();     
        }
    }  

    if($_REQUEST["id"]>0){ 
        $obj_web_home_pricing->id_web_home_pricing=intval(strClean($_REQUEST["id"]));
        $obj_web_home_pricing->titulo_h3=strClean($_REQUEST["txt_titulo_h3"]);
        $obj_web_home_pricing->span=strClean($_REQUEST["txt_span"]);
        $obj_web_home_pricing->icono=strClean($_REQUEST["txt_icono"]);
        $obj_web_home_pricing->enlace=strClean($_REQUEST["txt_enlace"]);
        $obj_web_home_pricing->observacion=strClean($_REQUEST["txt_observacion"]);
        if($obj_web_home_pricing->titulo_h3=='' ||  $obj_web_home_pricing->span=='' || $obj_web_home_pricing->icono=='' || $obj_web_home_pricing->enlace==''){
            echo "error_datos"; 
            return false;
        }else{
            $obj_web_home_pricing->update();
            echo "true_update";
            die();
        }
    }else{   
        $obj_web_home_pricing->titulo_h3=strClean($_REQUEST["txt_titulo_h3"]);
        $obj_web_home_pricing->span=strClean($_REQUEST["txt_span"]);
        $obj_web_home_pricing->icono=strClean($_REQUEST["txt_icono"]);
        $obj_web_home_pricing->enlace=strClean($_REQUEST["txt_enlace"]);
        $obj_web_home_pricing->observacion=strClean($_REQUEST["txt_observacion"]);
        if($obj_web_home_pricing->titulo_h3=='' ||  $obj_web_home_pricing->span=='' || $obj_web_home_pricing->icono=='' || $obj_web_home_pricing->enlace==''){
            echo "error_datos"; 
            return false;
        }else{
            $obj_web_home_pricing->create();
            echo "true_create";
            die();
        }
    }