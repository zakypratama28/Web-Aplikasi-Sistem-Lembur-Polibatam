<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "dblembur"; //Nama Database
// melakukan koneksi ke db
$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    echo "Gagal connected: " .mysqli_connect_error();
    die;
}
