<?php
// include database connection file 
include 'koneksi.php';
$NIK_karyawan = $_POST['NIK_karyawan'];
$nama = $_POST['nama'];
$unit = $_POST['unit'];
$telp = $_POST['telp'];
$rekening = $_POST['rekening'];
$result = mysqli_query($koneksi, "UPDATE karyawan SET nama='$nama',unit='$unit',telp='$telp',rekening='$rekening' WHERE NIK_karyawan='$NIK_karyawan'") or die(mysqli_error($koneksi));
// Redirect to homepage to display updated user in list
if($result) {
    header("Location: data-karyawan.php");
} else {
    echo "gagal";
}

?>
