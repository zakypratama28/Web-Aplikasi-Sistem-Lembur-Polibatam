<?php
// include database connection file 
include 'koneksi.php';
$NIK = $_GET['NIK_karyawan'];
$result = mysqli_query($koneksi, "DELETE FROM user WHERE NIK='$NIK'"); 
header("Location:data-karyawan.php");
?>