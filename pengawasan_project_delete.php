<?php
ob_start();
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
  
  include_once "koneksi.php";

  $id_project = $_GET['id'];
  $id_pegawai = $_GET['id_pegawai'];
  $id_pengawasan = $_GET['id_pengawasan'];

  $delete_data = mysqli_query($con, "DELETE FROM pengawasan_pegawai WHERE id_pengawasan=$id_pengawasan AND id_pegawai=$id_pegawai");

  header("Location:pengawasan_project.php?id=$id_project");
?>