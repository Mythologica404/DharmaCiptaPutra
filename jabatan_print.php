<?php
ob_start();
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
    include_once "koneksi.php";

    require('assets/vendor/fpdf/fpdf.php');

    $pdf=new FPDF('P','mm','A4');
    $pdf->AddPage();
    
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(200,10,'CV. Dharma Cipta Putra - Data Jabatan',0,0,'C');
    
    $pdf->Cell(10,15,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(10,7,'No.',1,0,'C');
    $pdf->Cell(180,7,'Nama Jabatan' ,1,0,'C');
    
    
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Times','',10);
    $no=1;
    $data = mysqli_query($con,"SELECT  * FROM jabatan");
    while($d = mysqli_fetch_array($data)){
    $pdf->Cell(10,6, $no++,1,0,'C');
    $pdf->Cell(180,6, $d['nama_jabatan'],1,1);
    }
    
    $pdf->Output("D", "Data_Jabatan.pdf");
    
?>