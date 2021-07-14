<?php 
    include('koneksi.php');

    $NIK = $_POST['NIK'];
    $nama = $_POST['nama'];
    $unit = $_POST['unit'];
    $telp = $_POST['telp'];
    $kategori = $_POST['kategori'];
    $rekening = $_POST['rekening'];

    $input = mysqli_query($koneksi,"UPDATE user SET nama='$nama', telp='$telp', kategori='$kategori', rekening='$rekening',unit='$unit' where NIK='$NIK'") or die(mysqli_error($koneksi));
    if($input){
        echo "Data Berhasil Disimpan";
        header("location:data-karyawan.php"); 
    }else{
        echo "Gagal Disimpan";
    } 
?>