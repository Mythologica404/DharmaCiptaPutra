<?php
 
session_start();
 
unset($_SESSION['username']);
unset($_SESSION['level']);
 
header("Location: login.php");
    exit;
 
?>