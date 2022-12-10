<?php
session_start();
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


if(trim($_POST["txtruc_buscar"])!=""){
    $inicial=$_POST["txtruc_buscar"];
  }
//var_dump($data);
if($_SESSION["id_rol"]=="3"){
    if($_SESSION["posicion"]=="0"){
        
        $tipo_solicitante="Cabeza de Red";
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
    $obj_r->nro_documento=$inicial;
    $obj_r->consultar_datos_nro_documento();    
    if($obj_r->patrocinador=="Cabeza de Red"){
        $patrocinador=$inicial;   
    }else{
        $patrocinador=$obj_r->patrocinador;
    }
    echo $patrocinador;
    
    $tipo_solicitante="Administrativo";
    $id_solicitante=$_SESSION["id_usuario"];
    $ruc_inicial=$inicial;
    $ruc_lider_red=$patrocinador;
    $id_usuarioregistro=$_SESSION["id_usuario"];
    $id_usuarioactualiza=$_SESSION["id_usuario"];
    
}
$obj->ruc_inicial=$ruc_inicial;
$patrocinador_directo="";
$patrocinador_posicion="";
$posicion="1";
$i_con_pos=0;
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

            $obj->posicion="1";            
            $obj->ruc_usuario=$data[$i]->RUC;
            $obj->estado="2";
            $obj->save();
        
        
    }
}
$obj->update_estado_pendiente();
echo "true";
   
?>