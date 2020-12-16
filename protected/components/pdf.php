<?php

class PDF extends FPDF
{
//Page header
function Header()
{
//Logo
$this->Image('../../banner_ministerio_salud.JPG',10,8,33);
//Arial bold 15
$this->SetFont('Arial','B',15);
//Move to the right
$this->Cell(80);
//Title
$this->Cell(30,10,'Module',1,0,'C');
//Line break
$this->Ln(20);
}

//Page footer
function Footer()
{
//Position at 1.5 cm from bottom
$this->SetY(-15);
//Arial italic 8
$this->SetFont('Arial','I',8);
//Page number
$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}

function myReport()
{
//Masukin disini your code
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
$pdf->Output();

}

}
