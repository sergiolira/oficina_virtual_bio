<?php 
require_once "../../model_class/tipo_comision.php";
$obj_tc = new tipo_com();
if(isset($_REQUEST['opcion_estado'])){
    
    if($_REQUEST['opcion_estado']=="desactivar"){
        $obj_tc->id_tipo_comision= $_REQUEST['id'];
        $obj_tc->estado(0);
        echo "true";
        die();
    }
    else if($_REQUEST['opcion_estado']=="activar"){
        $obj_tc->id_tipo_comision= $_REQUEST['id'];
        $obj_tc->estado(1);
        echo "true";
        die();
    }   
}
$obj_tc->id_tipo_comision = $_REQUEST["id"];
$obj_tc->tipocomision = $_REQUEST["txt_tipocomision"];

if($_REQUEST['id']==0){
    $obj_tc->create();
    echo "true";
    die();
}else{
    $obj_tc->update();
    echo "true";
    die();
}
?>