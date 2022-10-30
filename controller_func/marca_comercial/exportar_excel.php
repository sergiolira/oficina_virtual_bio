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
include_once("../../model_class/marca_comercial.php");
$obj_m_c= new marca_comercial();

// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades del documento
$objPHPExcel->getProperties()->setCreator("Freky")
							 ->setLastModifiedBy("Freky")
							 ->setTitle("Documento marca comercial Office 2007 XLSX")
							 ->setSubject("Documento marca comercial Office 2007 XLSX")
							 ->setDescription("Documento marca comercial para Office 2007 XLSX, generado usando clases PHP.")
							 ->setKeywords("Office 2007 openxml php")
							 ->setCategory("Documento marca comercial");

// Agrega algunos datos (Titulos)
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nº')
            ->setCellValue('B1', 'ID')
            ->setCellValue('C1', 'Marca comercial')
            ->setCellValue('D1', 'Estado')
            ->setCellValue('E1', 'Fecha de registro')
            ->setCellValue('F1', 'Registrado por');

$objPHPExcel->getActiveSheet()->getStyle("A1:F1")->getFont()->setBold(true);

/*Dimension de Columna*/
foreach(range('A','F') as $columnID) {
	    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
	        ->setAutoSize(true);
	}

$c=0;
$i=2;
$rs=$obj_m_c->read();
while($fila=mysqli_fetch_assoc($rs)){
	$c++;
	$estado="Activo";
	if($fila['estado']==0){
	      $estado='Inactivo';
	    }
	// Softmeza, UTF-8
	$objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue("A$i", $c)
	            ->setCellValue("B$i", $fila["id_marca_comercial"])
	            ->setCellValue("C$i", $fila["marca_comercial"])
	            ->setCellValue("D$i", $estado)
	            ->setCellValue("E$i", $fila["fecharegistro"])
	            ->setCellValue("F$i", $fila["id_usuarioregistro"]);
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
        'namearchivo'=>'Marca_comercial_'.date('dmy')."_".date('Hs')."_".rand(10, 99)
    );

die(json_encode($response));
exit;
?>
