<?php
session_start();
$anio=$_REQUEST["slt_anio"];

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

require_once('../excel.php');
/*Activar Errores*/
activar_errores_reporte();
/*Validar Web*/
nocli();

/** Include libreria PHPExcel */
require_once  '../../lib/PHPExcel_1_8/Classes/PHPExcel.php';

include_once("../../model_class/representante.php");
include_once("../../model_class/trama_registro_ventas.php");
include_once("../../model_class/cabecera_comisiones_venta.php");
include_once("../../model_class/detalle_comisiones_venta.php");
$obj=new representante();
$objtov=new trama_registro_ventas();
$objcco=new cabecera_comisiones_venta();
$objdco=new detalle_comisiones_venta();

// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades del documento
$objPHPExcel->getProperties()->setCreator("Wisbac - Sergio lira")
							 ->setLastModifiedBy("Wisbac - Sergio lira")
							 ->setTitle("Documento de comisiones de Office 2007 XLSX")
							 ->setSubject("Documento de comisiones de Office 2007 XLSX")
							 ->setDescription("Documento de comisiones para Office 2007 XLSX, generado usando clases PHP.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Archivo de resultados de comisiones");


// Agrega algunos datos (Titulos)
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'N°')
            ->setCellValue('B1', 'N° Solicitud')
            ->setCellValue('C1', 'Asesor')
            ->setCellValue('D1', 'N° Documento')
            ->setCellValue('E1', 'Correo')
            ->setCellValue('F1', 'Cod sponsor')
            ->setCellValue('G1', 'Comisión total')
            ->setCellValue('H1', 'Rango semanal')
            ->setCellValue('I1', 'Mes')
            ->setCellValue('J1', 'Año');

$objPHPExcel->getActiveSheet()->getStyle("A1:J1")->getFont()->setBold(true);

/*Dimension de Columna*/
foreach(range('A','J') as $columnID) {
	    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
	        ->setAutoSize(true);
	}

$objcco->anio=$anio;


$filtro="";

if(trim($_REQUEST["slt_mes"])!="0" && trim($_REQUEST["slt_mes"])!="" && trim($_REQUEST["slt_mes"])!="null"){
  $mes=$_REQUEST["slt_mes"];
  $filtro.=" and cco.mes='".$_REQUEST["slt_mes"]."' ";
}
if(trim($_REQUEST["slt_semana"])!="0" && trim($_REQUEST["slt_semana"])!="" && trim($_REQUEST["slt_semana"])!="null"){
   $semana=$_REQUEST["slt_semana"];
  $filtro.=" and cco.semana_detalle='".$_REQUEST["slt_semana"]."'";
}

/*Listado de Representantes Lideres */
if($_SESSION["id_rol"]=="3"){
  $objcco->nro_documento=$_SESSION["nro_documento"];
  $rs=$objcco->list_comisiones_x_representante($filtro);
}else{
    $rs=$objcco->list_comisiones($filtro);
}

$i=2;
$c=0;
while($fila=mysqli_fetch_assoc($rs))
{
  $c++;
$objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue("A$i", $c)
              ->setCellValue("B$i", $fila["id_cabacera_comisiones_venta"])
              ->setCellValue("C$i", $fila["representante"])
              ->setCellValue("D$i", $fila["nro_documento"] )
              ->setCellValue("E$i", $fila["correo"] )
              ->setCellValue("F$i", $fila["patrocinador_directo"])
              ->setCellValue("G$i", "$ ".number_format($fila["comision_total"],2,'.',''))
              ->setCellValue("H$i", $fila["semana_detalle"])
              ->setCellValue("I$i", $fila["mes"])
              ->setCellValue("J$i", $fila["anio"]);
              $i++;
}

// Cambiar nombre de hoja de trabajo
$objPHPExcel->getActiveSheet()->setTitle('Comisiones');

// Establezca el índice de hoja activa en la primera hoja, por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);
/******Detalles****////
// Create a new worksheet, after the default sheet
$objPHPExcel->createSheet();


$objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue('A1', 'N°')
            ->setCellValue('B1', 'Asesor')
            ->setCellValue('C1', 'N° Solicitud')
            ->setCellValue('D1', 'Asesor de red')
            ->setCellValue('E1', 'N° Documento')
            ->setCellValue('F1', 'Cod Sponsor')
            ->setCellValue('G1', 'Nivel')
            ->setCellValue('H1', 'Tipo de venta')
            ->setCellValue('I1', 'Cantidad')
            ->setCellValue('J1', 'Comisión')
            ->setCellValue('K1', 'Comisión total');

$objPHPExcel->getActiveSheet()->getStyle("A1:K1")->getFont()->setBold(true);

/*Dimension de Columna*/
foreach(range('A','K') as $columnID) {
      $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
          ->setAutoSize(true);
  }

$objdco->anio=$anio;



$filtro="";

if(trim($_REQUEST["slt_mes"])!="0" && trim($_REQUEST["slt_mes"])!="" && trim($_REQUEST["slt_mes"])!="null"){
  $mes=$_REQUEST["slt_mes"];
  $filtro.=" and cco.mes='".$_REQUEST["slt_mes"]."' ";
}
if(trim($_REQUEST["slt_semana"])!="0" && trim($_REQUEST["slt_semana"])!="" && trim($_REQUEST["slt_semana"])!="null"){
   $semana=$_REQUEST["slt_semana"];
  $filtro.=" and cco.semana_detalle='".$_REQUEST["slt_semana"]."'";
}


/*Listado de Representantes Lideres */
if($_SESSION["id_rol"]=="3"){
  $objdco->nro_documento=$_SESSION["nro_documento"];
  $rs_d=$objdco->list_detalles_comissiones_x_representante($filtro);
}else{
$rs_d=$objdco->list_detalles_comisiones($filtro);
}

$i_d=2;
$c_d=0;
$rep_cab="";
$rep_cab_texto="";
while($fila_d=mysqli_fetch_assoc($rs_d))
{
  $c_d++;
if($rep_cab!=""){
  if($fila_d["representante_cabecera"]==$rep_cab){
  $rep_cab_texto="";
  }else{
    $objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue("A$i_d", '')
            ->setCellValue("B$i_d", '')
            ->setCellValue("C$i_d", '')
            ->setCellValue("D$i_d", '')
            ->setCellValue("E$i_d", '')
            ->setCellValue("F$i_d", '')
            ->setCellValue("G$i_d", '')
            ->setCellValue("H$i_d", '')
            ->setCellValue("I$i_d", '')
            ->setCellValue("J$i_d", '')
            ->setCellValue("K$i_d", '');
            $i_d++;
  $objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue("A$i_d", '')
            ->setCellValue("B$i_d", 'Asesor')
            ->setCellValue("C$i_d", 'N° Solicitud')
            ->setCellValue("D$i_d", 'Asesor de red')
            ->setCellValue("E$i_d", 'N° Documento')
            ->setCellValue("F$i_d", 'Cod Sponsor')
            ->setCellValue("G$i_d", 'Nivel')
            ->setCellValue("H$i_d", 'Tipo de venta')
            ->setCellValue("I$i_d", 'Cantidad')
            ->setCellValue("J$i_d", 'Comisión')
            ->setCellValue("K$i_d", 'Comisión total');
            $objPHPExcel->getActiveSheet()->getStyle("A$i_d:K$i_d")->getFont()->setBold(true);

          /*Dimension de Columna*/
          foreach(range("A$i_d","K$i_d") as $columnID) {
                $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }
            $i_d++;

  $rep_cab_texto=$fila_d["representante_cabecera"];
  $rep_cab=$fila_d["representante_cabecera"];
  }
}else{
  $rep_cab=$fila_d["representante_cabecera"];
  $rep_cab_texto=$fila_d["representante_cabecera"];
}
$objPHPExcel->setActiveSheetIndex(1)
              ->setCellValue("A$i_d", $c_d)
              ->setCellValue("B$i_d", $rep_cab_texto)
              ->setCellValue("C$i_d", $fila_d["id_cabacera_comisiones_venta"] )
              ->setCellValue("D$i_d", $fila_d["razon_social"])
              ->setCellValue("E$i_d", $fila_d["nro_documento"])
              ->setCellValue("F$i_d", $fila_d["patrocinador_directo"])
              ->setCellValue("G$i_d", $fila_d["nivel"])
              ->setCellValue("H$i_d", $fila_d["tipo_venta"])
              ->setCellValue("I$i_d", $fila_d["cantidad"])
              ->setCellValue("J$i_d", "$ ".number_format($fila_d["comision"],2,'.',''))
              ->setCellValue("K$i_d", "$ ".number_format($fila_d["comision_subtotal"],2,'.',''));
              $i_d++;
}

// Rename 2nd sheet
$objPHPExcel->getActiveSheet()->setTitle('Detalles');

$nombre_archivo_excel="";
if(trim($_REQUEST["slt_mes"])!="0" && trim($_REQUEST["slt_mes"])!="" && trim($_REQUEST["slt_mes"])!="null"){
    $nombre_archivo_excel='ComisionesBio'.$mes.$anio;

}
if(trim($_REQUEST["slt_semana"])!="0" && trim($_REQUEST["slt_semana"])!="" && trim($_REQUEST["slt_semana"])!="null"){
    $nombre_archivo_excel='ComisionesBio'.$mes.$anio.$semana;
}
if(trim($_REQUEST["slt_mes"])=="0" || trim($_REQUEST["slt_mes"])=="" || trim($_REQUEST["slt_mes"])=="null"){
  $nombre_archivo_excel='ComisionesBio'.$anio;
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_start();
$objWriter->save('php://output');

$xlsData = ob_get_contents();
ob_end_clean();

$response =  array(
        'op' => 'ok',
        'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData),
        'namearchivo'=>$nombre_archivo_excel
    );

die(json_encode($response));

?>