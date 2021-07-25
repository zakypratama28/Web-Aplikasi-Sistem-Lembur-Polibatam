<?php 
    include('koneksi.php');
    include 'cek_status_login.php';
    include 'kepalaUnitFilter.php';
    
    $NIK = $_POST['NIK'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $kategori = $_POST['kategori'];
    $rekening = $_POST['rekening'];

    $input = mysqli_query($koneksi,"UPDATE user SET nama='$nama', telp='$telp', kategori='$kategori', rekening='$rekening' where NIK='$NIK'") or die(mysqli_error($koneksi));
    if($input){
        echo "Data Berhasil Disimpan";
        header("location:data-karyawan.php"); 
    }else{
        echo "Gagal Disimpan";
    } 
?>