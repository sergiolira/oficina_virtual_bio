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

            $rs_count_rep_x_pat_dir=$obj->count_rep_x_pat_dir_solicitud($obj->ruc_patrocinador);

            
            
            /*if($i_con_pos==1){
                $patrocinador_posicion=$data[$i]->pid;
                $obj->posicion="1";
            }elseif($patrocinador_posicion==$data[$i]->pid && $i_con_pos==2){
                $obj->posicion="2";
            }elseif($patrocinador_posicion==$data[$i]->pid && $i_con_pos==3){
                $obj->posicion="3";
            }elseif($patrocinador_posicion==$data[$i]->pid && $i_con_pos==4){
                $obj->posicion="4";
            }else{
                $patrocinador_posicion=$data[$i]->pid;
                $obj->posicion="1";
                $i_con_pos=1;
            }*/

            if($rs_count_rep_x_pat_dir==0){
                //$patrocinador_posicion=$data[$i]->pid;
                $obj->posicion="1";
            }elseif($rs_count_rep_x_pat_dir==1){
                $obj->posicion="2";
            }elseif($rs_count_rep_x_pat_dir==2){
                $obj->posicion="3";
            }elseif($rs_count_rep_x_pat_dir==3){
                $obj->posicion="4";
            }elseif($rs_count_rep_x_pat_dir==5){
                $obj->posicion="6";
            }/*else{
                $patrocinador_posicion=$data[$i]->pid;
                $obj->posicion="1";
                $i_con_pos=1;
            }*/

            $obj->ruc_usuario=$data[$i]->RUC;
            $obj->estado="2";
            $obj->save();
        
        
    }
}
$obj->update_estado_pendiente();
echo "true";
   
?>