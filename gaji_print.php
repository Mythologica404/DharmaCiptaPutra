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
    $pdf->Cell(200,10,'CV. Dharma Cipta Putra - Data Gaji',0,0,'C');
    
    $pdf->Cell(10,15,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(10,7,'ID',1,0,'C');
    $pdf->Cell(60,7,'Gaji' ,1,0,'C');
    $pdf->Cell(60,7,'Gaji Bersih',1,0,'C');
    $pdf->Cell(60,7,'Potongan',1,0,'C');
    
    
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Times','',10);
    $no=1;
    $data = mysqli_query($con,"SELECT  * FROM gaji");
    while($d = mysqli_fetch_array($data)){
    $pdf->Cell(10,6, $d['id_gaji'],1,0,'C');
    $pdf->Cell(60,6, "Rp " . number_format($d['gaji'],2,',','.'),1,0);
    $pdf->Cell(60,6, "Rp " . number_format($d['gaji_bersih'],2,',','.'),1,0);
    $pdf->Cell(60,6, "Rp " . number_format($d['potongan'],2,',','.'),1,1);
    }
    
    $pdf->Output("D", "Data_Gaji.pdf");
    
?>