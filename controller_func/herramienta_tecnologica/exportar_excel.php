<?php
session_start();
setlocale(LC_ALL,"es_ES@euro","es_PE","esp");
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, 'es_PE.utf8');

/**
 * PHPExcel Usuario
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

require_once('../../helpers/helpers.php');
/*Activar Errores*/
activar_errores_reporte();
/*Validar Web*/
nocli();

/** Include libreria PHPExcel */
require_once  '../../lib/PHPExcel_1_8/Classes/PHPExcel.php';
include_once("../../model_class/herramienta_tecnologica.php");
$obj_h_tec= new herramienta_tecnologica();

// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades del documento
$objPHPExcel->getProperties()->setCreator("Freky")
							 ->setLastModifiedBy("Freky")
							 ->setTitle("Documento herramienta tecnologica Office 2007 XLSX")
							 ->setSubject("Documento herramienta tecnologica Office 2007 XLSX")
							 ->setDescription("Documento herramienta tecnologica para Office 2007 XLSX, generado usando clases PHP.")
							 ->setKeywords("Office 2007 openxml php")
							 ->setCategory("Documento herramienta tecnologica");

// Agrega algunos datos (Titulos)
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nº')
            ->setCellValue('B1', 'ID')
            ->setCellValue('C1', 'Descripción')
            ->setCellValue('D1', 'Tipo de equipo')
			->setCellValue('E1', 'Marca de equipo')
			->setCellValue('F1', 'Fecha de garantía')
			->setCellValue('G1', 'Precio de compra')
			->setCellValue('H1', 'Condición del equipo')
			->setCellValue('I1', 'Status asignación')
			->setCellValue('J1', 'Estado')
            ->setCellValue('K1', 'Fecha de registro')
            ->setCellValue('L1', 'Registrado por');

$objPHPExcel->getActiveSheet()->getStyle("A1:L1")->getFont()->setBold(true);

/*Dimension de Columna*/
foreach(range('A','L') as $columnID) {
	    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
	        ->setAutoSize(true);
	}

$c=0;
$i=2;
$rs=$obj_h_tec->read();
while($fila=mysqli_fetch_assoc($rs)){
	$c++;
	$estado="Activo";
	$status_asignacion="Libre";

	if($fila["status_asignacion"]==1){
		$status_asignacion='Ocupado';
	}

	if($fila['estado']==0){
	      $estado='Inactivo';
	    }
	// Softmeza, UTF-8
	$objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue("A$i", $c)
	            ->setCellValue("B$i", $fila["id_herramienta_tecnologica"])
	            ->setCellValue("C$i", $fila["descripcion"])
				->setCellValue("D$i", $fila["tipo_equipo"])
				->setCellValue("E$i", $fila["marca_equipo"])
				->setCellValue("F$i", $fila["fecha_garantia"])
				->setCellValue("G$i", $fila["precio"])
				->setCellValue("H$i", $fila["condicion_equipo"])
				->setCellValue("I$i", $status_asignacion)
	            ->setCellValue("J$i", $estado)
	            ->setCellValue("K$i", $fila["fecharegistro"])
	            ->setCellValue("L$i", $fila["id_usuarioregistro"]);
	            $i++;
}

$objPHPExcel->getActiveSheet()->freezePane('A2');
// Cambiar nombre de hoja de trabajo
$objPHPExcel->getActiveSheet()->setTitle('Reporte');

// Establezca el índice de hoja activa en la primera hoja, por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_start();
$objWriter->save('php://output');

$xlsData = ob_get_contents();
ob_end_clean();

$response =  array(
        'op' => 'ok',
        'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData),
        'namearchivo'=>'Herramienta_tecnologica_'.date('dmy')."_".date('Hs')."_".rand(10, 99)
    );

die(json_encode($response));
exit;
?>
