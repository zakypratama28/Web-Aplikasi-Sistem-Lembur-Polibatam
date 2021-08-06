<?php
// include database connection file 
include 'koneksi.php';
include 'cek_status_login.php';
include 'kepalaUnitFilter.php';

$id = $_GET['id'];
$result = mysqli_query($koneksi, "DELETE FROM form_lembur WHERE id='$id'"); 
header("Location:data-lembur.php");
?>