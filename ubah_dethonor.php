<?php 
  include 'koneksi.php';

$id_dethonor = $_GET['id_dethonor'];
$result = mysqli_query($koneksi, "SELECT * FROM det_honor join user on user.username = det_honor.username WHERE id_dethonor='$id_dethonor'");
while($user_data = mysqli_fetch_array($result)) {
    $nama = $user_data['nama'];
    $kategori = $user_data['kategori'];
    $tggl = $user_data['tggl'];
    $jml_jam = $user_data['jml_jam'];
    $uang_makan = $user_data['uang_makan'];
    $rekening = $user_data['rekening'];
    $PPh_pasal21 = $user_data['persen_pph'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lembur.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <title>Ubah Detail Honor</title>
</head>

<body>
    <?php include 'template/sidebar.php'; ?>
        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-users mr-2"></i> Ubah Data Detail Honor</h3>
            <hr>
            <form action="edit_dethon.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="text" style="display:none" name="id_dethonor" class="form-control" id="id_dethonor"value="<?php echo $id_dethonor;?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nama Karyawan</label>
                        <input type="text" name="nama" class="form-control" id="nama"value="<?php echo $nama;?>" disabled>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Tanggal</label>
                        <input type="date" name="tggl" class="form-control" id="tggl"value="<?php echo $tggl;?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Jumlah Jam</label>
                        <input type="text" name="jml_jam" class="form-control" id="jml_jam"value="<?php echo $jml_jam;?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Uang Makan</label>
                        <input type="text" name="uang_makan" class="form-control" id="uang_makan"value="<?php echo $uang_makan;?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>PPh Pasal21</label>
                        <input type="number" name="PPh_pasal21" class="form-control" id="PPh_pasal21"value="<?php echo $PPh_pasal21;?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>No. Rekening</label>
                        <input type="text" name="rekening" class="form-control" id="rekening"value="<?php echo $rekening;?>"disabled>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</body>

</html>