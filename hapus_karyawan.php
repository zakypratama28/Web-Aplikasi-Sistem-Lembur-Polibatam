<?php
// include database connection file 
include 'koneksi.php';
include 'cek_status_login.php';
include 'kepalaUnitFilter.php';

$NIK = $_GET['NIK_karyawan'];
$result = mysqli_query($koneksi, "DELETE FROM user WHERE NIK='$NIK' and jurusan='".$_SESSION['jurusan']."'"); 
header("Location:data-karyawan.php");
?>