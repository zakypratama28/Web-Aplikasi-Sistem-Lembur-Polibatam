<?php
// include database connection file 
include 'koneksi.php';
$id_dethonor = $_GET['id_dethonor'];
$result = mysqli_query($koneksi, "DELETE FROM det_honor WHERE id_dethonor='$id_dethonor'"); 
header("Location:detail-honor.php");
?>