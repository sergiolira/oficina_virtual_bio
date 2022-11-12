<?php
require('../../lib/fpdf181/fpdf.php');
include_once("../../model_class/perfil_usuario.php");
$obj=new perfil_usuario();
$rs=$obj->list_perfiles_usuarios();

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../../imas/logo/logo.png',10,5,50);
        // Arial bold 15
        $this->SetFont('Arial','B',16);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(70,10,'Reporte - Perfil de usuarios',0,0,'C');
        // Salto de línea
        $this->Ln(20);

        

        $this->SetFillColor(7, 94, 130);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial','B',12);
       



        $this->Cell(20,10,utf8_decode('N°'),1,0,'C',true);
        $this->Cell(80,10,'Perfil de usuario',1,0,'C',true);
        $this->Cell(30,10,'Estado',1,0,'C',true);
        $this->Cell(60,10,utf8_decode('Fecha Creación'),1,1,'C',true);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);

$c=0;
while($fila=mysqli_fetch_assoc($rs))
    {
        $c++;
        $estado="Activo";
        if($fila['estado']==0){
              $estado='Inactivo';
            }
        $pdf->Cell(20,10,$c,1,0,'C',0);
        $pdf->Cell(80,10,$fila["perfil_usuario"],1,0,'C',0);
        $pdf->Cell(30,10,$estado,1,0,'C',0);
        $pdf->Cell(60,10,$fila["fecharegistro"],1,1,'C',0);
    }

$pdf->Output('Perfilusuario.pdf', 'D');
?>