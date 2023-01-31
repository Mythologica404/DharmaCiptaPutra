<?php
ob_start();
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

if ($_SESSION['level'] == "pegawai") {
  header("Location: index.php");
  exit;
}
  
  include_once "koneksi.php";

  $id = $_GET['id'];

  $delete_data = mysqli_query($con, "DELETE FROM jabatan WHERE id_jabatan=$id");

  header("Location:jabatan_show.php");
