<?php
ob_start();
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
    include_once "koneksi.php";

    require('assets/vendor/fpdf/fpdf.php');

    $pdf=new FPDF('L','mm','A4');
    $pdf->AddPage();
    
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(200,10,'CV. Dharma Cipta Putra - Data Pengawasan Project',0,0,'C');
    
    $pdf->Cell(10,15,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(10,7,'ID',1,0,'C');
    $pdf->Cell(50,7,'Nama Project' ,1,0,'C');
    $pdf->Cell(30,7,'Tgl. Mulai',1,0,'C');
    $pdf->Cell(30,7,'Tgl. Selesai',1,0,'C');
    $pdf->Cell(50,7,'Kemajuan',1,0,'C');
    $pdf->Cell(40,7,'Jenis Project',1,0,'C');
    $pdf->Cell(70,7,'Keterangan',1,0,'C');
    
    
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Times','',10);
    $no=1;
    $data = mysqli_query($con,"SELECT * FROM pengawasan");
    while($d = mysqli_fetch_array($data)){
    $pdf->Cell(10,6, $d['id_pengawasan'],1,0,'C');
    $pdf->Cell(50,6, $d['nama_proyek'],1,0);
    $pdf->Cell(30,6, $d['tgl_mulai'],1,0);
    $pdf->Cell(30,6, $d['tgl_selesai'],1,0);
    $pdf->Cell(50,6, $d['kemajuan'],1,0);
    $pdf->Cell(40,6, $d['jenis_proyek'],1,0);
    $pdf->Cell(70,6, $d['keterangan'],1,1);
    }
    
    $pdf->Output("D", "Data_Pengawasan_Project.pdf");
    
?>