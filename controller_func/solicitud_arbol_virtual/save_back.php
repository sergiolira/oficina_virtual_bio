<?php
session_start();
setlocale(LC_ALL,"es_ES@euro","es_PE","esp");
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, 'es_PE.utf8');
include_once("../../model_class/solicitud_arbol_virtual.php");
include_once("../../model_class/representante.php");
$obj=new solicitud_arbol_virtual();
$obj_r=new representante();
$data = json_decode($_POST['datos']);

$tipo_solicitante="";
$id_solicitante="";
$ruc_inicial="";
$ruc_lider_red="";
$id_usuarioregistro="";
$id_usuarioactualiza="";

$obj->nro_solicitud=$_POST["txtnrosoli"];

/**Obtener mes actual */
$mes=date('m');
$anio=date('Y');

if($_SESSION["id_rol"]=="4" || $_SESSION["id_rol"]=="representante"){
$ruc_inicial=$_SESSION["ruc"];  
}else{
$ruc_inicial=$_POST["txtruc_buscar"];    
}

$obj->ruc_inicial=$ruc_inicial;
$val_back=$obj->validar_back_mes_actual($mes,$anio);
if($val_back>1){
    /**No guardo Backup */
    echo "true";
    die();
}else{
    /**Si Hago backup */
    
    
    if(trim($_POST["txtruc_buscar"])!=""){
        $inicial=$_POST["txtruc_buscar"];
      }
    //var_dump($data);
    //echo $_SESSION["id_rol"];
    if($_SESSION["id_rol"]=="4" || $_SESSION["id_rol"]=="representante"){
        if($_SESSION["posicion"]=="0"){
            
            $tipo_solicitante="Lider de Red";
            $id_solicitante=$_SESSION["ruc"];
            $ruc_inicial=$_SESSION["ruc"];
            $ruc_lider_red=$_SESSION["ruc"];
            $id_usuarioregistro="1";
            $id_usuarioactualiza="1";
            
        }else{        
            $tipo_solicitante="Representante";
            $id_solicitante=$_SESSION["ruc"];
            $ruc_inicial=$_SESSION["ruc"];
            $ruc_lider_red=$_SESSION["patrocinador"];
            $id_usuarioregistro="1";
            $id_usuarioactualiza="1";
        }
    }else{
        /**Hallamos el Lider */
        $obj_r->ruc=$inicial;
        $obj_r->consultar_datos_ruc();    
        if($obj_r->patrocinador=="0"){
            $patrocinador=$inicial;   
        }else{
            $patrocinador=$obj_r->patrocinador;
        }
        
        $tipo_solicitante="Administrativo";
        $id_solicitante=$_SESSION["id_usuario"];
        $ruc_inicial=$inicial;
        $ruc_lider_red=$patrocinador;
        $id_usuarioregistro=$_SESSION["id_usuario"];
        $id_usuarioactualiza=$_SESSION["id_usuario"];
    }
    
    $patrocinador_directo="";
    $patrocinador_posicion="";
    $posicion="1";
    $i_con_pos=0;
    $obj->ruc_inicial=$ruc_inicial;
    $obj->delete_save_back();
    for($i=0;$i<count($data);$i++){   
    
        if($data[$i]->id=="1"){
        $patrocinador_directo=$data[$i]->RUC;
        
        }else{
            $i_con_pos++; 
            $obj->tipo_solicitante=$tipo_solicitante;
            $obj->id_solicitante=$id_solicitante;
            $obj->ruc_inicial=$ruc_inicial;
            $obj->ruc_lider_red=$ruc_lider_red;
            $obj->id_usuarioregistro=$id_usuarioregistro;
            $obj->id_usuarioactualiza=$id_usuarioactualiza;
            $obj->proceso="edit";
    
            if($data[$i]->pid=="1"){
                $obj->ruc_patrocinador=$patrocinador_directo;
            }else{
                $obj->ruc_patrocinador=$data[$i]->pid;
            }
            /**Consultar y contar  */

            if($i_con_pos==1){
                $patrocinador_posicion=$data[$i]->pid;
                $obj->posicion="1";
            }elseif($patrocinador_posicion==$data[$i]->pid && $i_con_pos==2){
                $obj->posicion="2";
            }elseif($patrocinador_posicion==$data[$i]->pid && $i_con_pos==3){
                $obj->posicion="3";
            }elseif($patrocinador_posicion==$data[$i]->pid && $i_con_pos==4){
                $obj->posicion="4";
            }elseif($patrocinador_posicion==$data[$i]->pid && $i_con_pos==5){
                $obj->posicion="5";
            }elseif($patrocinador_posicion==$data[$i]->pid && $i_con_pos==6){
                $obj->posicion="6";
            }else{
                $patrocinador_posicion=$data[$i]->pid;
                $obj->posicion="1";
                $i_con_pos=1;
            }
            $obj->ruc_usuario=$data[$i]->RUC;
            $obj->estado="1";
            $obj->save_back();
        }
    }
    //$obj->update_estado_pendiente();
    echo "true";

}




   
?>