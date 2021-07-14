<?php
// include database connection file 
include 'koneksi.php';
$id_honor = $_GET['id_honor'];
$result = mysqli_query($koneksi, "DELETE FROM honor WHERE id_honor='$id_honor'"); 
header("Location:data-honor.php");
?>