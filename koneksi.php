<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dblembur"; //Nama Database
// melakukan koneksi ke db
$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    echo "Gagal connected: " . die(mysqli_error($koneksi));
}
