<?php
session_start();
include_once("../../model_class/representante.php");
include_once("../../model_class/afiliado.php");
include_once("../../model_class/candidato.php");
$obja=new afiliado();
$obj=new representante();
$obj_c=new candidato();
/*Agregar y Editar*/
if($_REQUEST["es"]=="1"){
	if($_REQUEST["tiuser"]=="2"){
		/*Representante Lider*/
		$obj->tipo_persona=$_REQUEST["slt_ti_per"];
		$obj->nombre=ucwords(mb_strtolower(trim($_REQUEST["txtnombre"])));
		$obj->apellidopaterno=ucwords(mb_strtolower(trim($_REQUEST["txtapep"])));
		$obj->apellidomaterno=ucwords(mb_strtolower(trim($_REQUEST["txtapem"])));
		$obj->id_genero=$_REQUEST["slt_genero"];
		$obj->fecha_nacimiento=$_REQUEST["txtfechanac"];
		$edad=$obj_c->busca_edad($_REQUEST["txtfechanac"]);
		$obj->edad=$edad;
		$obj->id_pais=$_REQUEST["sltpais"];
		$obj->id_departamento=$_REQUEST["sltdepartamento"];
		$obj->id_provincia=$_REQUEST["sltprovincia"];
		$obj->id_distrito=$_REQUEST["sltdistrito"];
		$obj->direccion=trim($_REQUEST["txtdireccion"]);
		$obj->telefono=$_REQUEST["txttelefono"];
		$obj->correo=strtolower(trim($_REQUEST["txtcorreo"]));
		$obj->id_tipo_documento=$_REQUEST["slttipdoc"];
		if($_REQUEST["slt_ti_per"]=="PN"){
			$obj->razon_social=strtoupper($obj->apellidopaterno." ".$obj->apellidomaterno." ".$obj->nombre);
		}else{
			$obj->razon_social=strtoupper($_REQUEST["txtrazons"]);
		}		

		if(isset($_REQUEST["txtruc"])){
			$obj->nro_documento=$_REQUEST["txtruc"];
		}		

		if($_REQUEST["txtsponsor"]=="Cabeza de Red"){
			$obj->patrocinador_directo="Cabeza de Red";
			$obj->patrocinador="Cabeza de Red";
		}else{
			$obj->patrocinador_directo="unilevel";
			$obj->patrocinador="unilevel";
		}
		

		$obj->posicion="0";
		$obj->observacion=$_REQUEST["txtobser"];
	}else{
			/*Representante*/
			$obj->tipo_persona=$_REQUEST["slt_ti_per"];
			$obj->nombre=ucwords(mb_strtolower(trim($_REQUEST["txtnombre"])));
			$obj->apellidopaterno=ucwords(mb_strtolower(trim($_REQUEST["txtapep"])));
			$obj->apellidomaterno=ucwords(mb_strtolower(trim($_REQUEST["txtapem"])));
			$obj->id_genero=$_REQUEST["slt_genero"];
			$obj->fecha_nacimiento=$_REQUEST["txtfechanac"];
			$edad=$obj_c->busca_edad($_REQUEST["txtfechanac"]);
			$obj->edad=$edad;
			$obj->id_pais=$_REQUEST["sltpais"];
			$obj->id_departamento=$_REQUEST["sltdepartamento"];
			$obj->id_provincia=$_REQUEST["sltprovincia"];
			$obj->id_distrito=$_REQUEST["sltdistrito"];
			$obj->direccion=trim($_REQUEST["txtdireccion"]);
			$obj->telefono=$_REQUEST["txttelefono"];
			$obj->correo=strtolower(trim($_REQUEST["txtcorreo"]));
			$obj->id_tipo_documento=$_REQUEST["slttipdoc"];
			if($_REQUEST["slt_ti_per"]=="PN"){
				$obj->razon_social=strtoupper($obj->apellidopaterno." ".$obj->apellidomaterno." ".$obj->nombre);
			}else{
				$obj->razon_social=strtoupper($_REQUEST["txtrazons"]);
			}		

			if(isset($_REQUEST["txtruc"])){
				$obj->nro_documento=$_REQUEST["txtruc"];
			}
			
			if(isset($_REQUEST["txtsponsor"])){
				$obj->patrocinador_directo=$_REQUEST["txtsponsor"];
			}

			if(isset($_REQUEST["txtlred"])){
				$obj->patrocinador=$_REQUEST["txtlred"];
			}
			
			$obj->observacion=$_REQUEST["txtobser"];
			/*Afiliado*/
			if(isset($_REQUEST["txtsponsor"])){
				$obja->ruc_patrocinador=$_REQUEST["txtsponsor"];
			}
			
			if(isset($_REQUEST["txtruc"])){
				$obja->ruc_usuario=$_REQUEST["txtruc"];
			}

			if(isset($_REQUEST["sltposicion"])){
				$obja->posicion=$_REQUEST["sltposicion"];
			}
	}
	if($_REQUEST["hdnid"]>0){
		$obj->id_usuarioactualiza=$_SESSION["id_usuario"];
		$obj->id_representante=$_REQUEST["hdnid"];
		/*Validar existe doble*/
		$rs=$obj->valida_doble_actualiza();
		if($rs>=1){
			echo "true_doble";
			die();
		}
		if($_REQUEST["txtpass"]!=""){
			$clave=password_hash($_REQUEST["txtpass"], PASSWORD_DEFAULT,['cost'=>10]);
			$obj->clave=$clave;
		}
		if($_REQUEST["txtpass"]!=""){
			$obj->edit_representante();
			echo "edit_true";
			die();
			}else{
				$obj->edit_representante_sc();
				echo "edit_true";
				die();
			}
	}else{
		/*Validar existe doble*/
		$rs=$obj->valida_doble_registro();
		if($rs>=1){
			echo "true_doble";
			die();
		}

		if(trim($_REQUEST["txtpass"])!=""){
				$clave=password_hash($_REQUEST["txtpass"], PASSWORD_DEFAULT,['cost'=>10]);
				$obj->clave=$clave;
			}
		$obj->id_usuarioregistro=$_SESSION["id_usuario"];
		$obj->id_usuarioactualiza=$_SESSION["id_usuario"];
		$obja->id_usuarioregistro=$_SESSION["id_usuario"];
		$obja->id_usuarioactualiza=$_SESSION["id_usuario"];
		if($_REQUEST["tiuser"]=="1"){
			$obj->save_representante();
			$obja->save_afiliado();
		}else{
			$obj->save_representante();
			
		}
		echo "save_true";
		die();
	}
	die();
}

if($_REQUEST["es"]=="3"){
	$obj->id_representante=$_GET["id"];
	$obja->ruc_usuario=$_GET["content"];
	$obj->id_usuarioactualiza=$_SESSION["id_usuario"];
	$obj->delete();
	$obja->delete();
	echo "delete_true";
	die();
}

if($_REQUEST["es"]=="4"){
	$obj->id_representante=$_GET["id"];
	$obja->ruc_usuario=$_GET["content"];
	$obj->id_usuarioactualiza=$_SESSION["id_usuario"];
	$obj->activate();
	$obja->activate();
	echo "activate_true";
	die();
}

?>