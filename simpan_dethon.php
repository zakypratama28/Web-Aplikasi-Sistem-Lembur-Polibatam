<?php 
    include('koneksi.php');

    $username = $_POST['username'];
    $tggl = $_POST['tggl'];
    $jml_jam = str_replace(',','.',$_POST['jml_jam']); //menukar koma dengan titik
    $uang_makan = $_POST['uang_makan'];
    $persen_pph = $_POST['PPh_pasal21'];
    
    $sql = mysqli_query($koneksi, "SELECT tarif from kategori join user on user.kategori = kategori.id_kategori where user.username = '$username'") or die(mysqli_error($koneksi));

    $userData = mysqli_fetch_array($sql);
    
    $jml_uang_lembur = $jml_jam * $userData['tarif'];
    $jml_uang_lembur_makan = $uang_makan + $jml_uang_lembur;
    $PPh_pasal21 = round($jml_uang_lembur_makan*($persen_pph/100)); //round = membulatkan bilangan
    $jml_honor_pajak =  round($jml_uang_lembur_makan - $PPh_pasal21);

    $input = mysqli_query($koneksi,"INSERT INTO det_honor (username, tggl, jml_jam, jml_uang_lembur, uang_makan, jml_uang_lembur_makan, persen_pph, PPh_pasal21, jml_honor_pajak) VALUES('$username','$tggl','$jml_jam','$jml_uang_lembur','$uang_makan','$jml_uang_lembur_makan','$persen_pph','$PPh_pasal21','$jml_honor_pajak')") or die(mysqli_error($koneksi));
    if($input){
        echo "Data Berhasil Disimpan";
        header("location:detail-honor.php"); 
    }else{
        echo "Gagal Disimpan";
    }
?>