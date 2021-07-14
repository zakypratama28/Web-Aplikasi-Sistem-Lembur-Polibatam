<?php 
    include('koneksi.php');

    $id_dethonor = $_POST['id_dethonor'];

    $tggl = $_POST['tggl'];
    $jml_jam = str_replace(',','.',$_POST['jml_jam']); //menukar koma dengan titik
    $uang_makan = $_POST['uang_makan'];
    $persen_pph = $_POST['PPh_pasal21'];

    $sql = mysqli_query($koneksi, "SELECT tarif from det_honor join user on user.username = det_honor.username join kategori on user.kategori = kategori.id_kategori where det_honor.id_dethonor = '$id_dethonor'") or die(mysqli_error($koneksi));

    $userData = mysqli_fetch_array($sql);
    
    $jml_uang_lembur = $jml_jam * $userData['tarif'];
    $jml_uang_lembur_makan = $uang_makan + $jml_uang_lembur;

    $PPh_pasal21 = round($jml_uang_lembur_makan*($persen_pph/100)); //round = pembulatan
    
    $jml_honor_pajak = round($jml_uang_lembur_makan - $PPh_pasal21);
    

    $input = mysqli_query($koneksi,"UPDATE det_honor SET tggl='$tggl',jml_jam='$jml_jam', uang_makan='$uang_makan', jml_uang_lembur='$jml_uang_lembur', jml_uang_lembur_makan='$jml_uang_lembur_makan', persen_pph='$persen_pph', PPh_pasal21='$PPh_pasal21', jml_honor_pajak='$jml_honor_pajak' where id_dethonor='$id_dethonor'") or die(mysqli_error($koneksi));
    if($input){
        echo "Data Berhasil Disimpan";
        header("location:detail-honor.php"); 
    }else{
        echo "Gagal Disimpan";
    }
?>