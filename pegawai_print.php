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
    $pdf->Cell(200,10,'CV. Dharma Cipta Putra - Data Pegawai',0,0,'C');
    
    $pdf->Cell(10,15,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(10,7,'ID',1,0,'C');
    $pdf->Cell(30,7,'Nama' ,1,0,'C');
    $pdf->Cell(30,7,'Jenis Kelamin',1,0,'C');
    $pdf->Cell(30,7,'Agama',1,0,'C');
    $pdf->Cell(30,7,'Alamat',1,0,'C');
    $pdf->Cell(30,7,'No. Telp',1,0,'C');
    $pdf->Cell(30,7,'Email',1,0,'C');
    $pdf->Cell(30,7,'Jabatan',1,0,'C');
    $pdf->Cell(30,7,'Gaji',1,0,'C');
    $pdf->Cell(30,7,'Username',1,0,'C');
    
    
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Times','',10);
    $no=1;
    $data = mysqli_query($con,"SELECT id_pegawai, nama, jenis_kelamin, agama, alamat, no_telp, email, nama_jabatan, gaji, username FROM pegawai JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan JOIN gaji ON pegawai.id_gaji = gaji.id_gaji JOIN pengguna ON pegawai.id_user = pengguna.id_user");
    while($d = mysqli_fetch_array($data)){
    $pdf->Cell(10,6, $d['id_pegawai'],1,0,'C');
    $pdf->Cell(30,6, $d['nama'],1,0);
    $pdf->Cell(30,6, $d['jenis_kelamin'],1,0);
    $pdf->Cell(30,6, $d['agama'],1,0);
    $pdf->Cell(30,6, $d['alamat'],1,0);
    $pdf->Cell(30,6, $d['no_telp'],1,0);
    $pdf->Cell(30,6, $d['email'],1,0);
    $pdf->Cell(30,6, $d['nama_jabatan'],1,0);
    $pdf->Cell(30,6, "Rp " . number_format($d['gaji'],2,',','.'),1,0);
    $pdf->Cell(30,6, $d['username'],1,1);
    }
    
    $pdf->Output("D", "Data_Pegawai.pdf");
    
?>