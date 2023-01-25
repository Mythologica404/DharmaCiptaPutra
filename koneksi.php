<?php
  $con = mysqli_connect("localhost", "root", "root", "dharmachiptapratama");

  if (mysqli_connect_errno()) {
    echo "Gagal Connect: " . mysqli_connect_error();
  }

  