<?php
  session_start();

  if (!isset($_SESSION['username'])) {
    $login = false;
    header()
  }
