<?php
session_start();

if(!isset($_SESSION['correo']) || $_SESSION["correo"]==""){
	header('Location: https://intranet.prolife.pe/');
	exit();
	}
include_once("../../model_class/candidato.php");
$obj=new candidato();
$horariogestion="";
//activar y desactivar
if(isset($_REQUEST["accion"])){
	if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
		 $obj->id_candidato=$_REQUEST["id"];
		 $obj->activar();
		 echo "true_activado";
		 die();
	   }
	   else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
		 $obj->id_candidato=$_REQUEST["id"];
		 $obj->desactivar();
		 echo "true_desactivado";
		 die();     
	   }
 }  


if($_REQUEST["es"]=="1"){	

	$edad=$obj->busca_edad($_REQUEST["txtfechanac"]);
	if($edad<=19){
		echo "edad_false";
		die();
	}

	$obj->nombre=ucwords(mb_strtolower(trim($_REQUEST["txtnombre"])));
	$obj->apellidopaterno=ucwords(mb_strtolower(trim($_REQUEST["txtapep"])));
	$obj->apellidomaterno=ucwords(mb_strtolower(trim($_REQUEST["txtapem"])));
	$obj->correo=strtolower(trim($_REQUEST["txtcorreo"]));
	$obj->id_tipo_documento=$_REQUEST["slt_t_d"];
	$obj->nro_documento=$_REQUEST["txtnro_doc"];
	$obj->telefono=$_REQUEST["txttelefono"];			
	$obj->fecha_nacimiento=date('Y-m-d',strtotime($_REQUEST["txtfechanac"]));	
	$obj->edad=$edad;	
	$obj->id_genero=$_REQUEST["sltgenero"];
	$obj->patrocinador=1;
	$obj->patrocinador_directo=1;
	$obj->observacion=$_REQUEST["txtobservacion"];	
	$obj->id_rep_usu_registro=1;
	$obj->id_usuarioregistro=1;
	$obj->id_usuarioactualiza=1;
	$obj->id_dep=$_REQUEST["sltdepartamento"];
	$obj->id_pro=$_REQUEST["sltprovincia"];
	$obj->id_dis=$_REQUEST["sltdistrito"];	
	
	if($_REQUEST["sltrelacion"]=="Otro"){
		if(isset($_REQUEST["txtrelacion"])){
			$obj->relacion_candidato_reclutador=$_REQUEST["txtrelacion"];
		}else{
			$obj->relacion_candidato_reclutador=$_REQUEST["sltrelacion"];
		}		
	}else{
		$obj->relacion_candidato_reclutador=$_REQUEST["sltrelacion"];
	}
	$obj->motiva_negocio=$_REQUEST["txt_motiva_negocio"];
	if($_REQUEST["slt_experiencia_comercial"]=="Otro"){
		if(isset($_REQUEST["txt_experiencia_comercial"])){
			$obj->experiencia_comercial=$_REQUEST["txt_experiencia_comercial"];
		}else{
			$obj->experiencia_comercial=$_REQUEST["slt_experiencia_comercial"];
		}		
	}else{
		$obj->experiencia_comercial=$_REQUEST["slt_experiencia_comercial"];
	}
	$obj->cartera_cliente_entorno=$_REQUEST["r_cartera_cliente_entorno"];
	$obj->disponibilidad_gestion_negocio=$_REQUEST["r_disponibilidad_gestion_negocio"];	
	if(isset($_REQUEST["checkbox_horario_gestion_negocio_1"])){
		$horariogestion.=$_REQUEST["checkbox_horario_gestion_negocio_1"];
	}else{
		$horariogestion.="";
	}
	if(isset($_REQUEST["checkbox_horario_gestion_negocio_2"])){
		$horariogestion.=$_REQUEST["checkbox_horario_gestion_negocio_2"];
	}else{
		$horariogestion.="";
	}

	if(isset($_REQUEST["checkbox_horario_gestion_negocio_3"])){
		$horariogestion.=$_REQUEST["checkbox_horario_gestion_negocio_3"];
	}else{
		$horariogestion.="";
	}
	$obj->horario_gestion_negocio=$horariogestion;

	if($_REQUEST["txtnro_doc"]!=""){
		$clave=password_hash($_REQUEST["txtnro_doc"], PASSWORD_DEFAULT,['cost'=>10]);
		$obj->clave=$clave;
	}

	if($_REQUEST["hdnid"]>0){		
		$obj->id_candidato=$_REQUEST["hdnid"];
		$obj->edit();
		echo "edit_true";	
		die();
				
	}else{		
		$clave=password_hash($_REQUEST["txtnro_doc"], PASSWORD_DEFAULT,['cost'=>10]);
		$obj->clave=$clave;
		$obj->id_usuarioregistro=1;
		$obj->id_usuarioactualiza=1;
		$obj->save();
		echo "save_true";	
		die();
	}
	die();
}
?>