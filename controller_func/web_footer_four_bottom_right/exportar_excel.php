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
include_once("../../model_class/web_footer_four_bottom_right.php");
$obj_wffbr= new web_footer_four_bottom_right();

// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades del documento
$objPHPExcel->getProperties()->setCreator("Freky")
							 ->setLastModifiedBy("Freky")
							 ->setTitle("Documento Web footer four b. r. Office 2007 XLSX")
							 ->setSubject("Documento Web footer four b. r. Office 2007 XLSX")
							 ->setDescription("Documento Web footer four b. r. para Office 2007 XLSX, generado usando clases PHP.")
							 ->setKeywords("Office 2007 openxml php")
							 ->setCategory("Documento Web footer four b. r.");

// Agrega algunos datos (Titulos)
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nº')
            ->setCellValue('B1', 'ID')
            ->setCellValue('C1', 'Web footer four b. r.')
			->setCellValue('D1', 'imagen')
            ->setCellValue('E1', 'Obervación')
			
			->setCellValue('F1', 'Estado')
            ->setCellValue('G1', 'Fecha de registro')
            ->setCellValue('H1', 'Registrado por');

$objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getFont()->setBold(true);

/*Dimension de Columna*/
foreach(range('A','H') as $columnID) {
	    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
	        ->setAutoSize(true);
	}

$c=0;
$i=2;
$rs=$obj_wffbr->read();
while($fila=mysqli_fetch_assoc($rs)){
	$c++;
	$estado="Activo";
	if($fila['estado']==0){
	      $estado='Inactivo';
	    }
	// Softmeza, UTF-8
	$objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue("A$i", $c)
	            ->setCellValue("B$i", $fila["id_web_footer_four_bottom_right"])
				->setCellValue("C$i", $fila["web_footer_four_bottom_right"])
	            ->setCellValue("D$i", $fila["imagen"])
				->setCellValue("E$i", $fila["observacion"])
				
	            ->setCellValue("F$i", $estado)
	            ->setCellValue("G$i", $fila["fecharegistro"])
	            ->setCellValue("H$i", $fila["id_usuarioregistro"]);
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
        'namearchivo'=>'Web_footer_four_bottom_right'.date('dmy')."_".date('Hs')."_".rand(10, 99)
    );

die(json_encode($response));
exit;
?>
