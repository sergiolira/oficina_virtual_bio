<?php
session_start();
$txtpatrocinador=$_GET["txtruc_b"];

/**
 * PHPExcel Representante
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.softmeza.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##8.1##, ##Octubre 2019##
 */

require_once('../excel.php');
/*Activar Errores*/
activar_errores_reporte();
/*Validar Web*/
nocli();

/** Include libreria PHPExcel */
require_once  '../../lib/PHPExcel_1_8/Classes/PHPExcel.php';

include_once("../../model_class/representante.php");
$obj=new representante();

// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades del documento
$objPHPExcel->getProperties()->setCreator("Softmeza - Sergio lira")
							 ->setLastModifiedBy("Softmeza - Sergio lira")
							 ->setTitle("Documento de prueba de Office 2007 XLSX")
							 ->setSubject("Documento de prueba de Office 2007 XLSX")
							 ->setDescription("Documento de prueba para Office 2007 XLSX, generado usando clases PHP.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Archivo de resultados de prueba");


// Agrega algunos datos (Titulos)
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nombres')
            ->setCellValue('B1', 'RUC')
            ->setCellValue('C1', 'Sponsor')
            ->setCellValue('D1', 'Posición')
            ->setCellValue('E1', 'Nivel')
            ->setCellValue('F1', 'Estado')
            ->setCellValue('G1', 'Fecha Creacion');

$objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getFont()->setBold(true);

/*Dimension de Columna*/
foreach(range('A','G') as $columnID) {
	    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
	        ->setAutoSize(true);
	}
/*Datos*/

$patrocinador_directo=$txtpatrocinador;
$rs=$obj->listar_representantes_sponsor($patrocinador_directo);

$rs_n_uno=$obj->dato_representante_nivel_uno($patrocinador_directo);



$i=2;
$styleArray_uno = array(
	    'font'  => array(
	        'bold'  => true,
	        'color' => array('rgb' => 'E20612')
	    ));

if($fila_n_uno=mysqli_fetch_assoc($rs_n_uno)){

// Softmeza, UTF-8
  	$estado="Activo";
    if($fila_n_uno['estado']==0){
      $estado='Inactivo';
    }
    /*Opciones de posisicion de la red*/
    switch ($fila_n_uno["posicion"]) {
		case '1':
			$posicion_="1";
			break;
		  case '2':
			$posicion_="2";
			break;
		  case '3':
			$posicion_="3";
			break;
		  case '4':
			$posicion_="4";
			break;
		  default:
			$posicion_="Principal";
			break;
		}

   // $style_nivel="style='color:#E20612;font-weight: bold;'";
   // $style_sponsor_dir_uno="style='color:#E20612;font-weight: bold;'";

	$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A$i", $fila_n_uno["nombre"]." ".$fila_n_uno["apellidopaterno"]." ".$fila_n_uno["apellidomaterno"])
    ->setCellValue("B$i", $fila_n_uno["ruc"] )
    ->setCellValue("C$i", $fila_n_uno["patrocinador_directo"])
    ->setCellValue("D$i", $posicion_)
    ->setCellValue("E$i", "Nivel 1")
    ->setCellValue("F$i", $estado)
    ->setCellValue("G$i", $fila_n_uno["fecharegistro"]);
    $objPHPExcel->getActiveSheet()->getStyle("B$i")->applyFromArray($styleArray_uno);
	$objPHPExcel->getActiveSheet()->getStyle("E$i")->applyFromArray($styleArray_uno);
    $i++;



}

$rs=$obj->listar_representantes_sponsor($patrocinador_directo);
$styleArray_dos = array(
	    'font'  => array(
	        'bold'  => true,
	        'color' => array('rgb' => 'FFA200')
	    ));
$i_2=3;
$patro_uno="";$patro_dos="";
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }
	    /*Opciones de posisicion de la red*/
	    switch ($fila_n_uno["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_2", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_2", $fila["ruc"] )
		            ->setCellValue("C$i_2", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_2", $posicion_)
		            ->setCellValue("E$i_2", "Nivel 2")
		            ->setCellValue("F$i_2", $estado)
		            ->setCellValue("G$i_2", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_2")->applyFromArray($styleArray_uno);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_2")->applyFromArray($styleArray_dos);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_2")->applyFromArray($styleArray_dos);
		            $i_2++;
		            $c++;
		            switch ($c) {
		            	case 1:
		            		$patro_uno=$fila["ruc"];
		            		break;
		            	default:
		            		$patro_dos=$fila["ruc"];
		            		break;
		            }

	}



/*Nivel 2*/

$patro_tres="";$patro_cuatro="";$patro_cinco="";$patro_seis="";
$styleArray_tres = array(
	    'font'  => array(
	        'bold'  => true,
	        'color' => array('rgb' => 'D5C414')
	    ));
$i_3=$i_2;
if($patro_uno!=""){
$rs=$obj->listar_representantes_sponsor($patro_uno);
$i_3=$i_2;
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }

	    /*Opciones de posisicion de la red*/
	    switch ($fila["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}
		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_3", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_3", $fila["ruc"] )
		            ->setCellValue("C$i_3", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_3", $posicion_)
		            ->setCellValue("E$i_3", "Nivel 3")
		            ->setCellValue("F$i_3", $estado)
		            ->setCellValue("G$i_3", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_3")->applyFromArray($styleArray_dos);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_3")->applyFromArray($styleArray_tres);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_3")->applyFromArray($styleArray_tres);
		            $i_3++;
		            $c++;
		            switch ($c) {
		            	case 1:
		            		$patro_tres=$fila["ruc"];
		            		break;
		            	default:
		            		$patro_cuatro=$fila["ruc"];
		            		break;
		            }

	}
}
/*Nivel 3*/
$i_3_=$i_3;
if($patro_dos!=""){
$rs=$obj->listar_representantes_sponsor($patro_dos);
$i_3_=$i_3;
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }

	    /*Opciones de posisicion de la red*/
	    switch ($fila["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_3_", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_3_", $fila["ruc"] )
		            ->setCellValue("C$i_3_", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_3_", $posicion_)
		            ->setCellValue("E$i_3_", "Nivel 3")
		            ->setCellValue("F$i_3_", $estado)
		            ->setCellValue("G$i_3_", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_3_")->applyFromArray($styleArray_dos);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_3_")->applyFromArray($styleArray_tres);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_3_")->applyFromArray($styleArray_tres);
		            $i_3_++;
		            $c++;
		            switch ($c) {
	            		case 1:
			         		$patro_cinco=$fila["ruc"];
			         		break;
		            	default:
		            		$patro_seis=$fila["ruc"];
		            		break;
		            }

	}

}

/*Nivel 4*/
$patro_siete="";$patro_ocho="";$patro_nueve="";$patro_diez="";$patro_once="";$patro_doce="";$patro_trece="";$patro_catorce="";
$styleArray_cuatro = array(
	    'font'  => array(
	        'bold'  => true,
	        'color' => array('rgb' => '3CA805')
	    ));

$i_4_1=$i_3_;
if($patro_tres!=""){
$rs=$obj->listar_representantes_sponsor($patro_tres);
$i_4_1=$i_3_;
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }

	    /*Opciones de posisicion de la red*/
	    switch ($fila["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_4_1", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_4_1", $fila["ruc"] )
		            ->setCellValue("C$i_4_1", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_4_1", $posicion_)
		            ->setCellValue("E$i_4_1", "Nivel 4")
		            ->setCellValue("F$i_4_1", $estado)
		            ->setCellValue("G$i_4_1", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_4_1")->applyFromArray($styleArray_tres);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_4_1")->applyFromArray($styleArray_cuatro);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_4_1")->applyFromArray($styleArray_cuatro);
		            $i_4_1++;
		            $c++;
		            switch ($c) {
	            		case 1:
			         		$patro_siete=$fila["ruc"];
			         		break;
		            	default:
		            		$patro_ocho=$fila["ruc"];
		            		break;
		            }

	}

}
$i_4_2=$i_4_1;
if($patro_cuatro!=""){
$rs=$obj->listar_representantes_sponsor($patro_cuatro);
$i_4_2=$i_4_1;
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }
	   	/*Opciones de posisicion de la red*/
	    switch ($fila["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_4_2", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_4_2", $fila["ruc"] )
		            ->setCellValue("C$i_4_2", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_4_2", $posicion_)
		            ->setCellValue("E$i_4_2", "Nivel 4")
		            ->setCellValue("F$i_4_2", $estado)
		            ->setCellValue("G$i_4_2", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_4_2")->applyFromArray($styleArray_tres);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_4_2")->applyFromArray($styleArray_cuatro);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_4_2")->applyFromArray($styleArray_cuatro);
		            $i_4_2++;
		            $c++;
		            switch ($c) {
	            		case 1:
			         		$patro_nueve=$fila["ruc"];
			         		break;
		            	default:
		            		$patro_diez=$fila["ruc"];
		            		break;
		            }

	}

}

$i_4_3=$i_4_2;
if($patro_cinco!=""){
$rs=$obj->listar_representantes_sponsor($patro_cinco);
$i_4_3=$i_4_2;
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }

	    /*Opciones de posisicion de la red*/
	    switch ($fila["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_4_3", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_4_3", $fila["ruc"] )
		            ->setCellValue("C$i_4_3", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_4_3", $posicion_)
		            ->setCellValue("E$i_4_3", "Nivel 4")
		            ->setCellValue("F$i_4_3", $estado)
		            ->setCellValue("G$i_4_3", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_4_3")->applyFromArray($styleArray_tres);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_4_3")->applyFromArray($styleArray_cuatro);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_4_3")->applyFromArray($styleArray_cuatro);
		            $i_4_3++;
		            $c++;
		            switch ($c) {
	            		case 1:
			         		$patro_once=$fila["ruc"];
			         		break;
		            	default:
		            		$patro_doce=$fila["ruc"];
		            		break;
		            }

	}

}
$i_4_4=$i_4_3;
if($patro_seis!=""){
$rs=$obj->listar_representantes_sponsor($patro_seis);
$i_4_4=$i_4_3;
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }

	    /*Opciones de posisicion de la red*/
	    switch ($fila["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_4_4", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_4_4", $fila["ruc"] )
		            ->setCellValue("C$i_4_4", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_4_4", $posicion_)
		            ->setCellValue("E$i_4_4", "Nivel 4")
		            ->setCellValue("F$i_4_4", $estado)
		            ->setCellValue("G$i_4_4", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_4_4")->applyFromArray($styleArray_tres);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_4_4")->applyFromArray($styleArray_cuatro);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_4_4")->applyFromArray($styleArray_cuatro);
		            $i_4_4++;
		            $c++;
		            switch ($c) {
	            		case 1:
			         		$patro_trece=$fila["ruc"];
			         		break;
		            	default:
		            		$patro_catorce=$fila["ruc"];
		            		break;
		            }

	}

}

/*Nivel 5*/
$styleArray_cinco = array(
	    'font'  => array(
	        'bold'  => true,
	        'color' => array('rgb' => '0092D7')
	    ));
$i_5_1=$i_4_4;
if($patro_siete!=""){
$rs=$obj->listar_representantes_sponsor($patro_siete);
$i_5_1=$i_4_4;
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }

	    /*Opciones de posisicion de la red*/
	    switch ($fila_n_uno["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_5_1", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_5_1", $fila["ruc"] )
		            ->setCellValue("C$i_5_1", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_5_1", $posicion_)
		            ->setCellValue("E$i_5_1", "Nivel 5")
		            ->setCellValue("F$i_5_1", $estado)
		            ->setCellValue("G$i_5_1", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_5_1")->applyFromArray($styleArray_cuatro);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_5_1")->applyFromArray($styleArray_cinco);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_5_1")->applyFromArray($styleArray_cinco);
		            $i_5_1++;
		            $c++;

	}

}
$i_5_2=$i_5_1;

if($patro_ocho!=""){
$rs=$obj->listar_representantes_sponsor($patro_ocho);
$i_5_2=$i_5_1;
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }

	    /*Opciones de posisicion de la red*/
	    switch ($fila["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_5_2", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_5_2", $fila["ruc"] )
		            ->setCellValue("C$i_5_2", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_5_2", $posicion_)
		            ->setCellValue("E$i_5_2", "Nivel 5")
		            ->setCellValue("F$i_5_2", $estado)
		            ->setCellValue("G$i_5_2", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_5_2")->applyFromArray($styleArray_cuatro);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_5_2")->applyFromArray($styleArray_cinco);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_5_2")->applyFromArray($styleArray_cinco);
		            $i_5_2++;
		            $c++;

	}

}

$i_5_3=$i_5_2;
if($patro_nueve!=""){
$rs=$obj->listar_representantes_sponsor($patro_nueve);
$i_5_3=$i_5_2;
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }
	    /*Opciones de posisicion de la red*/
	    switch ($fila["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}
		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_5_3", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_5_3", $fila["ruc"] )
		            ->setCellValue("C$i_5_3", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_5_3", $posicion_)
		            ->setCellValue("E$i_5_3", "Nivel 5")
		            ->setCellValue("F$i_5_3", $estado)
		            ->setCellValue("G$i_5_3", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_5_3")->applyFromArray($styleArray_cuatro);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_5_3")->applyFromArray($styleArray_cinco);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_5_3")->applyFromArray($styleArray_cinco);
		            $i_5_3++;
		            $c++;

	}

}
$i_5_4=$i_5_3;
if($patro_diez!=""){
$rs=$obj->listar_representantes_sponsor($patro_diez);
$i_5_4=$i_5_3;
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }

	    /*Opciones de posisicion de la red*/
	    switch ($fila["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_5_4", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_5_4", $fila["ruc"] )
		            ->setCellValue("C$i_5_4", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_5_4", $posicion_)
		            ->setCellValue("E$i_5_4", "Nivel 5")
		            ->setCellValue("F$i_5_4", $estado)
		            ->setCellValue("G$i_5_4", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_5_4")->applyFromArray($styleArray_cuatro);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_5_4")->applyFromArray($styleArray_cinco);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_5_4")->applyFromArray($styleArray_cinco);
		            $i_5_4++;
		            $c++;

	}

}
$i_5_5=$i_5_4;
if($patro_once!=""){
$rs=$obj->listar_representantes_sponsor($patro_once);
$i_5_5=$i_5_4;
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }

	    /*Opciones de posisicion de la red*/
	    switch ($fila["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_5_5", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_5_5", $fila["ruc"] )
		            ->setCellValue("C$i_5_5", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_5_5", $posicion_)
		            ->setCellValue("E$i_5_5", "Nivel 5")
		            ->setCellValue("F$i_5_5", $estado)
		            ->setCellValue("G$i_5_5", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_5_5")->applyFromArray($styleArray_cuatro);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_5_5")->applyFromArray($styleArray_cinco);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_5_5")->applyFromArray($styleArray_cinco);
		            $i_5_5++;
		            $c++;

	}

}
$i_5_6=$i_5_5;
if($patro_doce!=""){
$rs=$obj->listar_representantes_sponsor($patro_doce);
$i_5_6=$i_5_5;
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }

	    /*Opciones de posisicion de la red*/
	    switch ($fila["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_5_6", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_5_6", $fila["ruc"] )
		            ->setCellValue("C$i_5_6", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_5_6", $posicion_)
		            ->setCellValue("E$i_5_6", "Nivel 5")
		            ->setCellValue("F$i_5_6", $estado)
		            ->setCellValue("G$i_5_6", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_5_6")->applyFromArray($styleArray_cuatro);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_5_6")->applyFromArray($styleArray_cinco);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_5_6")->applyFromArray($styleArray_cinco);
		            $i_5_6++;
		            $c++;

	}

}
$i_5_7=$i_5_6;
if($patro_trece!=""){
$rs=$obj->listar_representantes_sponsor($patro_trece);
$i_5_7=$i_5_6;
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }

	    /*Opciones de posisicion de la red*/
	    switch ($fila["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_5_7", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_5_7", $fila["ruc"] )
		            ->setCellValue("C$i_5_7", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_5_7", $posicion_)
		            ->setCellValue("E$i_5_7", "Nivel 5")
		            ->setCellValue("F$i_5_7", $estado)
		            ->setCellValue("G$i_5_7", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_5_7")->applyFromArray($styleArray_cuatro);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_5_7")->applyFromArray($styleArray_cinco);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_5_7")->applyFromArray($styleArray_cinco);
		            $i_5_7++;
		            $c++;

	}

}
$i_5_8=$i_5_7;
if($patro_catorce!=""){
$rs=$obj->listar_representantes_sponsor($patro_catorce);
$i_5_8=$i_5_7;
$c=0;
while($fila=mysqli_fetch_assoc($rs)){

		if($fila['estado']==0){
	      $estado='Inactivo';

	    }

	    /*Opciones de posisicion de la red*/
	    switch ($fila["posicion"]) {
			case '1':
				$posicion_="1";
				break;
			  case '2':
				$posicion_="2";
				break;
			  case '3':
				$posicion_="3";
				break;
			  case '4':
				$posicion_="4";
				break;
			  default:
				$posicion_="Principal";
				break;
			}

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i_5_8", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
		            ->setCellValue("B$i_5_8", $fila["ruc"] )
		            ->setCellValue("C$i_5_8", $fila["patrocinador_directo"])
		            ->setCellValue("D$i_5_8", $posicion_)
		            ->setCellValue("E$i_5_8", "Nivel 5")
		            ->setCellValue("F$i_5_8", $estado)
		            ->setCellValue("G$i_5_8", $fila["fecharegistro"]);
		            $objPHPExcel->getActiveSheet()->getStyle("C$i_5_8")->applyFromArray($styleArray_cuatro);
					$objPHPExcel->getActiveSheet()->getStyle("E$i_5_8")->applyFromArray($styleArray_cinco);
					$objPHPExcel->getActiveSheet()->getStyle("B$i_5_8")->applyFromArray($styleArray_cinco);
		            $i_5_8++;
		            $c++;

	}

}







// Cambiar nombre de hoja de trabajo
$objPHPExcel->getActiveSheet()->setTitle('Representantes_'.$_GET["txtruc_b"]);


// Establezca el índice de hoja activa en la primera hoja, por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);

getheaders("Representantes_".$_GET["txtruc_b"]);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
