<?php
  ob_start();
  session_start();

  if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
  }
  include_once "koneksi.php";

  $id = $_GET['id'];

  $delete_data = mysqli_query($con, "DELETE FROM gaji WHERE id_gaji=$id");

  header("Location:gaji_show.php");
?>