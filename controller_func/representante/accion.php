<?php
session_start();
include_once("../../model_class/representante.php");
include_once("../../model_class/representante_conectado.php");
include_once("../../model_class/afiliado.php");
include_once("../../model_class/candidato.php");
include_once("../../model_class/registro_ventas_oncosalud.php");
include_once("../../model_class/hc_backup_x_fecha_corte.php");
$obja=new afiliado();
$obj=new representante();
$obj_rc=new representante_conectado();
$obj_c=new candidato();
$obj_rvo=new registro_ventas_oncosalud();
$obj_hc=new hc_backup_x_fecha_corte();
/*Agregar y Editar*/
if($_REQUEST["es"]=="1"){
	if($_REQUEST["tiuser"]=="2"){
		/*Representante Lider*/
		$obj->nombre=ucwords(mb_strtolower(trim($_REQUEST["txtnombre"])));
		$obj->apellidopaterno=ucwords(mb_strtolower(trim($_REQUEST["txtapep"])));
		$obj->apellidomaterno=ucwords(mb_strtolower(trim($_REQUEST["txtapem"])));
		$obj->correo=trim($_REQUEST["txtcorreo"]);
		$obj->telefono=$_REQUEST["txttelefono"];
		if(isset($_REQUEST["txtruc"])){
			$obj->ruc=$_REQUEST["txtruc"];
		}		
		$obj->razon_social=strtoupper(trim($_REQUEST["txtrazons"]));

		if($_REQUEST["txtsponsor"]=="Lider de Red"){
			$obj->patrocinador_directo="Lider de Red";
			$obj->patrocinador="0";
		}else{
			$obj->patrocinador_directo="unilevel";
			$obj->patrocinador="unilevel";
		}
		

		$obj->posicion="0";
		$obj->observacion=$_REQUEST["txtobser"];
	}else{
			/*Representante*/
			$obj->nombre=ucwords(mb_strtolower(trim($_REQUEST["txtnombre"])));
			$obj->apellidopaterno=ucwords(mb_strtolower(trim($_REQUEST["txtapep"])));
			$obj->apellidomaterno=ucwords(mb_strtolower(trim($_REQUEST["txtapem"])));
			$obj->correo=strtolower(trim($_REQUEST["txtcorreo"]));
			$obj->telefono=$_REQUEST["txttelefono"];
			if(isset($_REQUEST["txtruc"])){
				$obj->ruc=$_REQUEST["txtruc"];
			}
			$obj->razon_social=strtoupper($_REQUEST["txtrazons"]);
			if(isset($_REQUEST["txtsponsor"])){
				$obj->patrocinador_directo=$_REQUEST["txtsponsor"];
			}

			if(isset($_REQUEST["txtlred"])){
				$obj->patrocinador=$_REQUEST["txtlred"];
			}

			if(isset($_REQUEST["sltposicion"])){
				$obj->posicion=$_REQUEST["sltposicion"];
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
			$obj_rc->ruc=$_REQUEST["txtruc"];
			$obj_rc->update_estado_subido_sistema();
			/**activamos a activo en candidatos */
			$obj_c->dni=$_REQUEST["hdndni"];
			$obj_c->activate();
			/**Actualizamos el RUC Patrocinador y Red en Registro de ventas y HC Backup */
			$obj_rvo->dni=$_REQUEST["hdndni"];
			$obj_rvo->ruc=$_REQUEST["txtruc"];
			$obj_rvo->patrocinador=$_REQUEST["txtlred"];;
			$obj_rvo->patrocinador_directo=$_REQUEST["txtsponsor"];
			$obj_rvo->representante_datos=ucwords(mb_strtolower(trim($_REQUEST["txtnombre"])))." ".ucwords(mb_strtolower(trim($_REQUEST["txtapep"]))).
			" ".ucwords(mb_strtolower(trim($_REQUEST["txtapem"])));
			$obj_hc->dni=$_REQUEST["hdndni"];
			$obj_hc->ruc=$_REQUEST["txtruc"];
			$obj_hc->patrocinador=$_REQUEST["txtlred"];
			$obj_hc->patrocinador_directo=$_REQUEST["txtsponsor"];

			$obj_rvo->update_sinruc_x_dni();
			$obj_hc->update_sinruc_x_dni();	
		}else{
			$obj->save_representante();
			$obj_rc->ruc=$_REQUEST["txtruc"];
			$obj_rc->update_estado_subido_sistema();
			/**activamos a activo en candidatos */
			$obj_c->dni=$_REQUEST["hdndni"];
			$obj_c->activate();
			/**Actualizamos el RUC Patrocinador y Red en Registro de ventas y HC Backup */
			$obj_rvo->dni=$_REQUEST["hdndni"];
			$obj_rvo->ruc=$_REQUEST["txtruc"];
			$obj_rvo->patrocinador="Lider de Red";
			$obj_rvo->patrocinador_directo="0";
			$obj_rvo->representante_datos=ucwords(mb_strtolower(trim($_REQUEST["txtnombre"])))." ".ucwords(mb_strtolower(trim($_REQUEST["txtapep"]))).
			" ".ucwords(mb_strtolower(trim($_REQUEST["txtapem"])));
			$obj_hc->dni=$_REQUEST["hdndni"];
			$obj_hc->ruc=$_REQUEST["txtruc"];
			$obj_hc->patrocinador="Lider de Red";
			$obj_hc->patrocinador_directo="0";

			$obj_rvo->update_sinruc_x_dni();
			$obj_hc->update_sinruc_x_dni();			

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