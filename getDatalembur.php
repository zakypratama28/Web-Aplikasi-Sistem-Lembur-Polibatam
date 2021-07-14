<?php 
include 'koneksi.php';
$nik = $_GET['nik'];
$sql = mysqli_query($koneksi, "SELECT * FROM input_lembur where nik like '%$nik%'");
if($data = mysqli_fetch_array($sql)){
    return json_encode($data);
}
else{
    $error['error']  = 'error';
    return json_encode($error);
}


              