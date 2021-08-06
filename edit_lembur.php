<?php 
    include('koneksi.php');
    include 'cek_status_login.php';
    include 'kepalaUnitFilter.php';

    $id = $_POST['idlembur'];
    $tanggal = $_POST['tanggal'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $keterangan = $_POST['keterangan'];

    $input = mysqli_query($koneksi,"UPDATE form_lembur SET tanggal='$tanggal',jam_mulai='$jam_mulai', jam_selesai='$jam_selesai', keterangan='$keterangan' where id='$id'") or die(mysqli_error($koneksi));
    if($input){
        echo "Data Berhasil Disimpan";
          
        function timeToSecond($time){
            $parsed = date_parse($time);
            $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
            return $seconds;
        }
    
        function uangMakan($total_lembur){
            
            if($total_lembur <= 2){
                $uang_makan = 0;
              }else if($total_lembur > 5){
                $uang_makan = 30000;
              }else{
                $uang_makan = 25000;
              }
    
              return $uang_makan;
        }
    
        function hitungIstirahat($jam_lembur){
            if($jam_lembur <= 8){
                $istirahat = 0;
              }else if($jam_lembur > 16){
                $istirahat = 2;
              }else{
                $istirahat = 1;
              }
              return $istirahat;
        }
          $jam_lembur = number_format((timeToSecond($jam_selesai) - timeToSecond($jam_mulai)) / 3600, 2, '.', '');
          
          if($jam_lembur < 0){
            $today = timeToSecond("24:00") - timeToSecond($jam_mulai);
            $tomorrow = timeToSecond($jam_selesai);
            $jam_lembur = number_format(($today + $tomorrow) / 3600, 2, '.', '');
          }

          $istirahat = hitungIstirahat($jam_lembur);
          $total_lembur = number_format($jam_lembur - $istirahat, 2, '.', '');
          $uangMakan = uangMakan($total_lembur);
          
          $query = "UPDATE honor set jam_lembur='$jam_lembur', istirahat='$istirahat', total_lembur='$total_lembur', uang_makan='$uangMakan' where id=$id";
          mysqli_query($koneksi, $query);
        header("location:data-lembur.php"); 
    }else{
        echo "Gagal Disimpan";
    } 
?>