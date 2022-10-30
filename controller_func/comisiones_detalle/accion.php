<?php 
require_once "../../model_class/detalle_comisiones.php";
$obj_det = new det_comisiones();

if(isset($_REQUEST['opcion_estado'])){
    
    if($_REQUEST['opcion_estado']=="desactivar"){
        $obj_det->id_detalle=$_REQUEST['id'];
        $obj_det->activar();
        echo "true";
        die();
    }
    else if($_REQUEST['opcion_estado']=="activar"){
        $obj_det->id_detalle=$_REQUEST['id'];
        $obj_det->desactivar();
        echo "true";
        die();
    }   
}


$obj_det->id_detalle=$_REQUEST["id"];
$obj_det->id_cabecera=$_REQUEST["slt_rep"];
$obj_det->id_producto=$_REQUEST["slt_pro"];
$obj_det->cantidad=$_REQUEST["txt_cantidad"];
$obj_det->comision=$_REQUEST["txt_comision"];
$obj_det->comision_subtotal=$_REQUEST["txt_subtotal"];

if($_REQUEST['id']==0){
    $obj_det->create();
    echo "true";
    die();
}else{
    $obj_det->update();
    echo "true";
    die();
}
