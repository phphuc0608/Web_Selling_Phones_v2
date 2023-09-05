<?php
  session_start();
  include '../module/javascript.php';
  if(!isset($_SESSION['dang_nhap'])){
    location('../dang_nhap/dang_nhap.php');
    return;
  }
?>