<?php
require_once("../../helpers/helpers.php");

require_once "../../model_class/cabecera_comisiones_venta.php";
$obj_cab = new cabecera_comisiones_venta();

if(isset($_REQUEST['opcion_estado'])){
    
    if($_REQUEST['opcion_estado']=="desactivar"){
        $obj_cab->id_cabecera=$_REQUEST['id'];
        $obj_cab->activar();
        echo "true";
        die();
    }
    else if($_REQUEST['opcion_estado']=="activar"){
        $obj_cab->id_cabecera=$_REQUEST['id'];
        $obj_cab->desactivar();
        echo "true";
        die();
    }   
}
$obj_cab->id_cabecera=intval(strClean($_REQUEST['id']));
$obj_cab->representante=strClean($_REQUEST['txt_representante']);
$obj_cab->correo=strClean($_REQUEST['txt_correo']);
$obj_cab->id_tipo_documento=strClean($_REQUEST['slt_dni']);
$obj_cab->nro_documento=strClean($_REQUEST['txt_num_document']);
$obj_cab->comision_total=strClean($_REQUEST['txt_comision']);
$obj_cab->anio=strClean($_REQUEST['txt_anio']);
$obj_cab->mes=strClean($_REQUEST['txt_mes']);
$obj_cab->semana_inicio=strClean($_REQUEST['txt_sem_inicio']);
$obj_cab->semana_fin=strClean($_REQUEST['txt_sem_fin']);
$obj_cab->semana_detalle=strClean($_REQUEST['txt_sem_det']);


if($_REQUEST['id']==0){
    if($_REQUEST['id']==""||
    $_REQUEST['txt_representante']==""||
    $_REQUEST['txt_correo']==""||
    $_REQUEST['slt_dni']==""||
    $_REQUEST['txt_num_document']==""||
    $_REQUEST['txt_comision']==""||
    $_REQUEST['txt_anio']==""||
    $_REQUEST['txt_mes']==""||
    $_REQUEST['txt_sem_inicio']==""||
    $_REQUEST['txt_sem_fin']==""||
    $_REQUEST['txt_sem_det']==""){
        echo "error_datos";
        return false;
    }else{
        $obj_cab->create();
        echo "true";
        die();
    }
    
}else{
    if($_REQUEST['id']==""||
    $_REQUEST['txt_representante']==""||
    $_REQUEST['txt_correo']==""||
    $_REQUEST['slt_dni']==""||
    $_REQUEST['txt_num_document']==""||
    $_REQUEST['txt_comision']==""||
    $_REQUEST['txt_anio']==""||
    $_REQUEST['txt_mes']==""||
    $_REQUEST['txt_sem_inicio']==""||
    $_REQUEST['txt_sem_fin']==""||
    $_REQUEST['txt_sem_det']==""){
        echo "error_datos";
        return false;
    }else{
        $obj_cab->update();
        echo "true";
        die();
    }
    
}
?>