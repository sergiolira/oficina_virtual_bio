<?php
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
include_once("../../model_class/afiliado.php");
$obj=new representante();
$obja=new afiliado();
$rs=$obj->list();

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
            ->setCellValue('A1', 'Nº')
            ->setCellValue('B1', 'Nombres')
            ->setCellValue('C1', 'RUC')
            ->setCellValue('D1', 'Razón Social')
            ->setCellValue('E1', 'Correo')
            ->setCellValue('F1', 'Posición')
            ->setCellValue('G1', 'N° de brazos directos')
            ->setCellValue('H1', 'Ruc - Sponsor')
            ->setCellValue('I1', 'Sponsor')
            ->setCellValue('J1', 'Lider de Red')
            ->setCellValue('K1', 'RUC - Lider de red')
            ->setCellValue('L1', 'Estado')
            ->setCellValue('M1', 'Fecha Creacion');

$objPHPExcel->getActiveSheet()->getStyle("A1:M1")->getFont()->setBold(true);

/*Dimension de Columna*/
foreach(range('A','M') as $columnID) {
	    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
	        ->setAutoSize(true);
	}

$c=0;
$i=2;
$patrocinador_directo="Lider de Red";
$lider_red="0";
while($fila=mysqli_fetch_assoc($rs)){
	$c++;
	$estado="Activo";
	$lider_red="0";
	$patrocinador_directo="Lider de Red";
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
	


	
	if($fila["patrocinador"]!="unilevel"){
		$obja->ruc_patrocinador=$fila["ruc"];
		$rs_nro_afiliados=$obja->contar_afiliados_dos(); 
	}else{
		$rs_nro_afiliados=0;
	}

     
	// Softmeza, UTF-8
	$objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue("A$i", $c)
	            ->setCellValue("B$i", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
	            ->setCellValue("C$i", $fila["ruc"] )
	            ->setCellValue("D$i", $fila["razon_social"])
	         	->setCellValue("E$i", $fila["correo"])
	            ->setCellValue("F$i", $posicion_)
	            ->setCellValue("G$i", $rs_nro_afiliados)
	            ->setCellValue("H$i", $fila["patrocinador_directo"])
	            ->setCellValue("I$i", $fila["patrocinador_directo_datos"])
	            ->setCellValue("J$i", $fila["patrocinador_datos"])
	            ->setCellValue("K$i", $fila["patrocinador"])
	            ->setCellValue("L$i", $estado)
	            ->setCellValue("M$i", $fila["fecharegistro"]);
	            $i++;
}


// Cambiar nombre de hoja de trabajo
$objPHPExcel->getActiveSheet()->setTitle('Representantes');


// Establezca el índice de hoja activa en la primera hoja, por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);

getheaders("Representantes");

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
