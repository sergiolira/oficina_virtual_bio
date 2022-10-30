<?php
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

include_once("../../model_class/candidato.php");
$obj=new candidato();
$rs=$obj->list();

// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades del documento
$objPHPExcel->getProperties()->setCreator("Prolife")
							 ->setLastModifiedBy("Prolife")
							 ->setTitle("Documento candidatos para Office 2007 XLSX")
							 ->setSubject("Documento de candidatos para Office 2007 XLSX")
							 ->setDescription("Documento de candidatos para Office 2007 XLSX, generado usando clases PHP.")
							 ->setKeywords("Office 2007 openxml php")
							 ->setCategory("Documento de candidatos");


// Agrega algunos datos (Titulos)
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nº')
            ->setCellValue('B1', 'Nombres')
            ->setCellValue('C1', 'Nro documento')
            ->setCellValue('D1', 'Correo electronico')
            ->setCellValue('E1', 'Teléfono')
            ->setCellValue('F1', 'Género')
            ->setCellValue('G1', 'Fecha nacimiento')
            ->setCellValue('H1', 'Edad')
            ->setCellValue('I1', 'Fecha de registro')
            ->setCellValue('J1', 'Estado')
            ->setCellValue('K1', 'Observación');

$objPHPExcel->getActiveSheet()->getStyle("A1:K1")->getFont()->setBold(true);

/*Dimension de Columna*/
foreach(range('A','K') as $columnID) {
	    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
	        ->setAutoSize(true);
	}

$c=0;
$i=2;
while($fila=mysqli_fetch_assoc($rs)){
	$c++;
	switch ($fila["estado"]) {
        case '0':
          $estado='Inactivo';
          break;
          case '1':
            $estado='Activo';
            
      }
	// Softmeza, UTF-8
	$objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue("A$i", $c)
	            ->setCellValue("B$i", $fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"])
	            ->setCellValue("C$i", $fila["nro_documento"])
	            ->setCellValue("D$i", $fila["correo"])
	            ->setCellValue("E$i", $fila["telefono"])
	            ->setCellValue("F$i", $fila["genero"])
	            ->setCellValue("G$i", $fila["fecha_nacimiento"])
	            ->setCellValue("H$i", $fila["edad"])
	            ->setCellValue("I$i", $fila["fecharegistro"])
	            ->setCellValue("J$i", $estado)
	            ->setCellValue("K$i", $fila["observacion"]);
	            $i++;
}


// Cambiar nombre de hoja de trabajo
$objPHPExcel->getActiveSheet()->setTitle('Candidatos');


// Establezca el índice de hoja activa en la primera hoja, por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);

getheaders("Candidatos_".date('dmy')."_".date('Hs')."_".rand(10, 99));

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;