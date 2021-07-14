<?php 
    include('koneksi.php');

    $id_honor = $_POST['id_honor'];
    $kegiatan = $_POST['kegiatan'];
    $tanggal = $_POST['tanggal'];
    $jam_lembur = $_POST['jam_lembur'];
    $istirahat = $_POST['istirahat'];
    $jml_jam_lembur = $_POST['jml_jam_lembur'];
    $uang_makan = $_POST['uang_makan'];

    $input = mysqli_query($koneksi,"UPDATE honor SET kegiatan='$kegiatan',tanggal='$tanggal',jam_lembur='$jam_lembur', istirahat='$istirahat', jml_jam_lembur='$jml_jam_lembur', uang_makan='$uang_makan' where id_honor='$id_honor'") or die(mysqli_error($koneksi));
    if($input){
        echo "Data Berhasil Disimpan";
        header("location:data-honor.php"); 
    }else{
        echo "Gagal Disimpan";
    } 
?>