<?php 
    include('koneksi.php');

    $nama = $_POST['username'];
    $tanggal = $_POST['tanggal'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $keterangan = $_POST['keterangan'];

    $input = mysqli_query($koneksi,"INSERT INTO form_lembur (username, tanggal, jam_mulai, jam_selesai, keterangan) VALUES('$nama','$tanggal','$jam_mulai','$jam_selesai','$keterangan')") or die(mysqli_error($koneksi));
    if($input){
        echo "Data Berhasil Disimpan";
        header("location:data-lembur.php"); 
    }else{
        echo "Gagal Disimpan";
    }   
?>