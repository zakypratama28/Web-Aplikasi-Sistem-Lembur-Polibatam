<?php 
    include('koneksi.php');

    $id = $_POST['idlembur'];
    $tanggal = $_POST['tanggal'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $keterangan = $_POST['keterangan'];

    $input = mysqli_query($koneksi,"UPDATE form_lembur SET tanggal='$tanggal',jam_mulai='$jam_mulai', jam_selesai='$jam_selesai', keterangan='$keterangan' where id='$id'") or die(mysqli_error($koneksi));
    if($input){
        echo "Data Berhasil Disimpan";
        header("location:data-lembur.php"); 
    }else{
        echo "Gagal Disimpan";
    } 
?>