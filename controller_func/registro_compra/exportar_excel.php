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
include_once("../../model_class/registro_compra.php");
$obj_r_c= new registro_compra();

// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades del documento
$objPHPExcel->getProperties()->setCreator("Freky")
							 ->setLastModifiedBy("Freky")
							 ->setTitle("Documento Registro de compra Office 2007 XLSX")
							 ->setSubject("Documento Registro de compra Office 2007 XLSX")
							 ->setDescription("Documento Registro de compra para Office 2007 XLSX, generado usando clases PHP.")
							 ->setKeywords("Office 2007 openxml php")
							 ->setCategory("Documento Registro de compra");

// Agrega algunos datos (Titulos)
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nº')
            ->setCellValue('B1', 'ID')
            ->setCellValue('C1', 'Producto')
			->setCellValue('D1', 'Divisa')
            ->setCellValue('E1', 'Cantidad')
			->setCellValue('F1', 'Precio unitario')
			->setCellValue('G1', 'Sub total')
			->setCellValue('H1', 'Fecha de ingreso')
			->setCellValue('I1', 'Estado')
            ->setCellValue('J1', 'Fecha de registro')
            ->setCellValue('K1', 'Registrado por');

$objPHPExcel->getActiveSheet()->getStyle("A1:K1")->getFont()->setBold(true);

/*Dimension de Columna*/
foreach(range('A','K') as $columnID) {
	    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
	        ->setAutoSize(true);
	}

$c=0;
$i=2;
$rs=$obj_r_c->read();
while($fila=mysqli_fetch_assoc($rs)){
	$c++;
	$estado="Activo";
	if($fila['estado']==0){
	      $estado='Inactivo';
	    }
	// Softmeza, UTF-8
	$objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue("A$i", $c)
	            ->setCellValue("B$i", $fila["id_registro_compra"])
				->setCellValue("C$i", $fila["nombre_producto"])
	            ->setCellValue("D$i", $fila["divisa"])
				->setCellValue("E$i", $fila["cantidad"])
				->setCellValue("F$i", $fila["precio_unitario"])
				->setCellValue("G$i", $fila["sub_total"])
				->setCellValue("H$i", $fila["fecha_ingreso"])
	            ->setCellValue("I$i", $estado)
	            ->setCellValue("J$i", $fila["fecharegistro"])
	            ->setCellValue("K$i", $fila["id_usuarioregistro"]);
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
        'namearchivo'=>'Registro_compra'.date('dmy')."_".date('Hs')."_".rand(10, 99)
    );

die(json_encode($response));
exit;
?>
