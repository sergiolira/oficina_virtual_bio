<?php
session_start();
include_once("../../model_class/afiliado.php");
include_once("../../model_class/representante_nivel_categoria.php");
$obj=new afiliado();
$objnc=new representante_nivel_categoria();

$objnc->ruc=$_REQUEST["txtsponsor"];
$id_nivel_categoria=$objnc->validate_nivel();

//$id_nivel_categoria="1";
/*Nivel 4 arriba*/

$posicion1=0;
$posicion2=0;

if($_SESSION["id_tipo_red_mlm"]=="3"){

	if($id_nivel_categoria=="4"){
		$obj->ruc_patrocinador=$_REQUEST["txtsponsor"];
		$rscontar=$obj->contar_afiliados_dos();
		$html="";

		if($rscontar==0){
			$html='<option  value="4" selected >Seleccionar Posicion</option>
			<option value="1" >1 - Izquierda </option>
						<option value="2">2 - Derecha </option>';
			echo $html;
			die();
		}
		
		if($rscontar==1){
			$rs=$obj->consulta_posicion_afiliados_dos();
		
			while($fila=mysqli_fetch_assoc($rs)){
				if($fila["posicion"]==1){
					$html.='<option value="2" selected>2 - Derecha (Disponible)</option>
							<option value="'.$fila["posicion"].'" disabled>1 - Izquierda (Posicion Registrada)</option>';
				}
		
				if($fila["posicion"]==2){
					$html.='<option value="1" selected>1 - Izquierda (Disponible)</option>
							<option value="'.$fila["posicion"].'" disabled>2 - Derecha(Posicion Registrada)</option>';
				}
		
			}
			echo $html;
		die();
		
		
		}
		
		if($rscontar=="2"){
	
	
			$html.='<option value="3" selected>Tercera Posicion en tu Red Disponible</option>
					<option value="1" disabled>1 - Izquierda (Posicion Registrada)</option>
					<option value="2" disabled>2 - Derecha(Posicion Registrada)</option>';
	
	
	
			echo $html;
			die();
	
		}else{
	
			$html='<option value="0" selected>Patrocinador ya lleno sus 3 afiliados</option>';
			echo $html;
			die();
		}
	
	
	
	}else{
	
	/*Nivel 1 2 3*/
	$obj->ruc_patrocinador=$_REQUEST["txtsponsor"];
	$rscontar=$obj->contar_afiliados_dos();
	$html="";
	if($rscontar==0){
		$html='<option  value="4" selected >Seleccionar Posicion</option>
		<option value="1" >1 - Izquierda </option>
					<option value="2">2 - Derecha </option>';
		echo $html;
		die();
	}
	
	if($rscontar==1){
		$rs=$obj->consulta_posicion_afiliados_dos();
	
		while($fila=mysqli_fetch_assoc($rs)){
			if($fila["posicion"]==1){
				$html.='<option value="2" selected>2 - Derecha (Disponible)</option>
						<option value="'.$fila["posicion"].'" disabled>1 - Izquierda (Posicion Registrada)</option>';
			}
	
			if($fila["posicion"]==2){
				$html.='<option value="1" selected>1 - Izquierda (Disponible)</option>
						<option value="'.$fila["posicion"].'" disabled>2 - Derecha(Posicion Registrada)</option>';
			}
	
		}
		echo $html;
	die();
	
	
	}
	
	if($rscontar==2){
		$html='<option value="0" selected>Patrocinador ya lleno sus 2 afiliados</option>';
	echo $html;
	die();
	}
	
	}
	
}

if($_SESSION["id_tipo_red_mlm"]=="5"){

	if($id_nivel_categoria=="4"){
		$obj->ruc_patrocinador=$_REQUEST["txtsponsor"];
		$rscontar=$obj->contar_afiliados_dos();
		$html="";
		
		if($rscontar==0){
			$html='	<option value="0" selected >Seleccionar Posicion</option>
					<option value="1">1 - Posición </option>
					<option value="2">2 - Posición </option>
					<option value="3">3 - Posición </option>';
			echo $html;
			die();
		}

		if($rscontar==1){
			$rs=$obj->consulta_posicion_afiliados_dos();
		
			while($fila=mysqli_fetch_assoc($rs)){
				if($fila["posicion"]==1){
					$html.='<option value="2" selected>2 - Posición (Disponible)</option>
							<option value="3" >3 - Posición (Disponible)</option>
							<option value="'.$fila["posicion"].'" disabled>1 - Posición (Ocupada)</option>';
				}
		
				if($fila["posicion"]==2){
					$html.='<option value="1" selected>1 - Posición (Disponible)</option>
							<option value="3" >3 - Posición (Disponible)</option>
							<option value="'.$fila["posicion"].'" disabled>2 - Posición(Ocupada)</option>';
				}
				if($fila["posicion"]==3){
					$html.='<option value="1" selected>1 - Posición (Disponible)</option>
							<option value="2" >2 - Posición (Disponible)</option>
							<option value="'.$fila["posicion"].'" disabled>3 - Posición(Ocupada)</option>';
				}		
		
			}
			echo $html;
			die();	
		
		}
	
		if($rscontar==2){
			$rs=$obj->consulta_posicion_afiliados_dos();
			$c=0;
			while($fila=mysqli_fetch_assoc($rs)){
				$c++;
				if($c==1){
					$posicion1=$fila["posicion"];
				}
				if($c==2){
					$posicion2=$fila["posicion"];
				}
				
				
				if(($posicion1==1 && $posicion2==2) || ($posicion1==2 && $posicion2==1)){
					$html.='<option value="3" selected>3 - Posición (Disponible)</option>
							<option value="2" disabled>2 - Posición (Ocupada)</option>
							<option value="1" disabled>1 - Posición (Ocupada)</option>';
				}
		
				if(($posicion1==2 && $posicion2==3) || ($posicion1==3 && $posicion2==2)){
					$html.='<option value="1" selected>1 - Posición (Disponible)</option>
							<option value="2" disabled>2 - Posición (Ocupada)</option>
							<option value="3" disabled>3 - Posición (Ocupada)</option>';
				}
				if(($posicion1==1 && $posicion2==3) || ($posicion1==3 && $posicion2==1)){
					$html.='<option value="2" selected>2 - Posición (Disponible)</option>
							<option value="3" disabled>3 - Posición (Ocupada)</option>
							<option value="1" disabled>1 - Posición (Ocupada)</option>';
				}		
		
			}
			echo $html;
			die();	
		
		}

		if($rscontar=="3"){
	
	
			$html.='<option value="4" selected>4 Posición en tu Red Disponible</option>
					<option value="1" disabled>1 - Posición(Posicion Registrada)</option>
					<option value="2" disabled>2 - Posición(Posicion Registrada)</option>
					<option value="3" disabled>2 - Posición(Posicion Registrada)</option>
					';	
	
	
			echo $html;
			die();
	
		}else{
	
			$html='<option value="0" selected>Patrocinador ya lleno sus 4 brazos directos</option>';
			echo $html;
			die();
		}
	
	
	
	}else{
	
	/*Nivel 1 2 3*/
	$obj->ruc_patrocinador=$_REQUEST["txtsponsor"];
	$rscontar=$obj->contar_afiliados_dos();
	$html="";
	if($rscontar==0){
		$html='	<option value="0" selected >Seleccionar Posicion</option>
				<option value="1">1 - Posición </option>
				<option value="2">2 - Posición </option>
				<option value="3">3 - Posición </option>';
		echo $html;
		die();
	}
	
	if($rscontar==1){
		$rs=$obj->consulta_posicion_afiliados_dos();
	
		while($fila=mysqli_fetch_assoc($rs)){
			if($fila["posicion"]==1){
				$html.='<option value="2" selected>2 - Posición (Disponible)</option>
						<option value="3" >3 - Posición (Disponible)</option>
						<option value="'.$fila["posicion"].'" disabled>1 - Posición (Ocupada)</option>';
			}
	
			if($fila["posicion"]==2){
				$html.='<option value="1" selected>1 - Posición (Disponible)</option>
						<option value="3" >3 - Posición (Disponible)</option>
						<option value="'.$fila["posicion"].'" disabled>2 - Posición(Ocupada)</option>';
			}
			if($fila["posicion"]==3){
				$html.='<option value="1" selected>1 - Posición (Disponible)</option>
						<option value="2" >2 - Posición (Disponible)</option>
						<option value="'.$fila["posicion"].'" disabled>3 - Posición(Ocupada)</option>';
			}		
	
		}
		echo $html;
		die();	
	
	}

	if($rscontar==2){
		$rs=$obj->consulta_posicion_afiliados_dos();
		$c=0;
		while($fila=mysqli_fetch_assoc($rs)){
			$c++;
			if($c==1){
				$posicion1=$fila["posicion"];
			}
			if($c==2){
				$posicion2=$fila["posicion"];
			}
			
			
			if(($posicion1==1 && $posicion2==2) || ($posicion1==2 && $posicion2==1)){
				$html.='<option value="3" selected>3 - Posición (Disponible)</option>
						<option value="2" disabled>2 - Posición (Ocupada)</option>
						<option value="1" disabled>1 - Posición (Ocupada)</option>';
			}
	
			if(($posicion1==2 && $posicion2==3) || ($posicion1==3 && $posicion2==2)){
				$html.='<option value="1" selected>1 - Posición (Disponible)</option>
						<option value="2" disabled>2 - Posición (Ocupada)</option>
						<option value="3" disabled>3 - Posición (Ocupada)</option>';
			}
			if(($posicion1==1 && $posicion2==3) || ($posicion1==3 && $posicion2==1)){
				$html.='<option value="2" selected>2 - Posición (Disponible)</option>
						<option value="3" disabled>3 - Posición (Ocupada)</option>
						<option value="1" disabled>1 - Posición (Ocupada)</option>';
			}		
	
		}
		echo $html;
		die();	
	
	}
	
	if($rscontar==3){
		$html='<option value="0" selected>Patrocinador ya lleno sus 3 brazos directos</option>';
	echo $html;
	die();
	}
	
	}
	
}

$pos_dis1="";$pos_des1="1 - Posición";
$pos_dis2="";$pos_des2="2 - Posición";
$pos_dis3="";$pos_des3="3 - Posición";
$pos_dis4="";$pos_des4="4 - Posición";
$pos_dis5="";$pos_des5="5 - Posición";
$pos_dis6="";$pos_des6="6 - Posición";
if($_SESSION["id_tipo_red_mlm"]=="6"){

	/*Nivel 1 2 3 4 5 6*/
	$obj->ruc_patrocinador=$_REQUEST["txtsponsor"];
	$rscontar=$obj->contar_afiliados_dos();
	$html="";
	if($rscontar==0){
		$html='	<option value="0" selected >Seleccionar Posicion</option>
				<option value="1">1 - Posición </option>
				<option value="2">2 - Posición </option>
				<option value="3">3 - Posición </option>
				<option value="4">4 - Posición </option>
				<option value="5">5 - Posición </option>
				<option value="6">6 - Posición </option>';
		echo $html;
		die();
	}


	
	if($rscontar>=1 && $rscontar<=5){
		$rs=$obj->consulta_posicion_afiliados_dos();
	
		while($fila=mysqli_fetch_assoc($rs)){

			if($fila["posicion"]==1){$pos_dis1="disabled";$pos_des1="1 - Posición(Ocupada)";}
			if($fila["posicion"]==2){$pos_dis2="disabled";$pos_des2="2 - Posición(Ocupada)";}
			if($fila["posicion"]==3){$pos_dis3="disabled";$pos_des3="3 - Posición(Ocupada)";}
			if($fila["posicion"]==4){$pos_dis4="disabled";$pos_des4="4 - Posición(Ocupada)";}
			if($fila["posicion"]==5){$pos_dis5="disabled";$pos_des5="5 - Posición(Ocupada)";}
			if($fila["posicion"]==6){$pos_dis6="disabled";$pos_des6="6 - Posición(Ocupada)";}		
		}

		$html='<option value="0" selected >Seleccionar Posicion</option>
				<option value="1" '.$pos_dis1.'>'.$pos_des1.'</option>
				<option value="2" '.$pos_dis2.'>'.$pos_des2.'</option>
				<option value="3" '.$pos_dis3.'>'.$pos_des3.'</option>
				<option value="4" '.$pos_dis4.'>'.$pos_des4.'</option>
				<option value="5" '.$pos_dis5.'>'.$pos_des5.'</option>
				<option value="6" '.$pos_dis6.'>'.$pos_des6.'</option>';
				
				echo $html;
				die();	
	
	}
	
	if($rscontar==6){
		$html='<option value="0" selected>Patrocinador ya lleno sus 6 brazos directos</option>';
	echo $html;
	die();
	}
	
	
	
}







