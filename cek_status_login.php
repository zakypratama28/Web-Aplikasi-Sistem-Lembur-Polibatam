<?php 
  if($_SESSION['status'] != 'login') {
    header("location: login.php");
  }
?>