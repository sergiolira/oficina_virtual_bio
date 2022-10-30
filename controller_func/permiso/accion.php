<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/permiso.php");
$obj_p= new permiso();

/**Validar existencia de modulo y rol */
$obj_p->id_rol=$_REQUEST["id_rol"];
$obj_p->id_modulo=$_REQUEST["id_mod"];
$contar=$obj_p->validar_rol_modulo();
if($contar>0){

    if(isset($_REQUEST["desc"])){
        switch ($_REQUEST["desc"]) {
            case "ver":      
                    if($_REQUEST["estado_switch_permiso"]=="on"){$obj_p->ver=1;}else{$obj_p->ver=0;}                
                    $obj_p->id_modulo=$_REQUEST["id_mod"];
                    $obj_p->id_rol=$_REQUEST["id_rol"];
                    $obj_p->update_ver();
                    echo "true";
                    die();
                break;
            case "crear":
                    if($_REQUEST["estado_switch_permiso"]=="on"){$obj_p->crear=1;}else{$obj_p->crear=0;}                
                    $obj_p->id_modulo=$_REQUEST["id_mod"];
                    $obj_p->id_rol=$_REQUEST["id_rol"];
                    $obj_p->update_create();
                    echo "true";
                    die();                 
                break;
            case "actualizar":
                    if($_REQUEST["estado_switch_permiso"]=="on"){$obj_p->actualizar=1;}else{$obj_p->actualizar=0;}                
                    $obj_p->id_modulo=$_REQUEST["id_mod"];
                    $obj_p->id_rol=$_REQUEST["id_rol"];
                    $obj_p->update_update();      
                    echo "true";
                    die();       
                break;
            case "eliminar":
                    if($_REQUEST["estado_switch_permiso"]=="on"){$obj_p->eliminar=1;}else{$obj_p->eliminar=0;}                
                    $obj_p->id_modulo=$_REQUEST["id_mod"];
                    $obj_p->id_rol=$_REQUEST["id_rol"];
                    $obj_p->update_delete();   
                    echo "true";
                    die();           
                break;
        }
    }

}else{
    if($_REQUEST["estado_switch_permiso"]=="on" && $_REQUEST["desc"]=="ver"){$obj_p->ver=1;}else{$obj_p->ver=0;} 
    if($_REQUEST["estado_switch_permiso"]=="on" && $_REQUEST["desc"]=="crear"){$obj_p->crear=1;}else{$obj_p->crear=0;}
    if($_REQUEST["estado_switch_permiso"]=="on" && $_REQUEST["desc"]=="actualizar"){$obj_p->actualizar=1;}else{$obj_p->actualizar=0;}
    if($_REQUEST["estado_switch_permiso"]=="on" && $_REQUEST["desc"]=="eliminar"){$obj_p->eliminar=1;}else{$obj_p->eliminar=0;}
    $obj_p->id_rol=$_REQUEST["id_rol"];
    $obj_p->id_modulo=$_REQUEST["id_mod"];
    $obj_p->create();
    echo "true";
    die();
}





?>