<?php 
  include 'koneksi.php';

$id_honor = $_GET['id_honor'];
$result = mysqli_query($koneksi, "SELECT * FROM honor join user on user.username = honor.username WHERE id_honor='$id_honor'");
while($user_data = mysqli_fetch_array($result)) {
    $nama = $user_data['nama'];
    $kegiatan = $user_data['kegiatan'];
    $tanggal = $user_data['tanggal'];
    $jam_lembur = $user_data['jam_lembur'];
    $Istirahat = $user_data['istirahat'];
    $jml_jam_lembur = $user_data['jml_jam_lembur'];
    $uang_makan = $user_data['uang_makan'];}
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
    <title>Ubah Honor</title>
</head>

<body>
        <?php include 'template/sidebar.php'; ?>
        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-users mr-2"></i> Input Data Honor</h3>
            <hr>
            <form action="edit_dethon.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="text" style="display:none" name="id_honor" class="form-control" id="id_honor"value="<?php echo $id_honor;?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama"value="<?php echo $nama;?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Kegiatan Lembu</label>
                        <input type="text" name="kegiatan" class="form-control" id="kegiatan"value="<?php echo $kegiatan;?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal"value="<?php echo $tanggal;?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Jam Lembur</label>
                        <input type="text" name="jam_lembur" class="form-control" id="jam_lembur"value="<?php echo $jam_lembur;?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Istirahat Lembur</label>
                        <input type="text" name="istirahat" class="form-control" id="istirahat"value="<?php echo $Istirahat;?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Total Jam Lembur</label>
                        <input type="text" name="jml_jam_lembur" class="form-control" id="jam_lembur"value="<?php echo $jml_jam_lembur;?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Uang Makan</label>
                        <input type="text" name="uang_makan" class="form-control" id="uang_makan"value="<?php echo $uang_makan;?>">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</body>

</html>