<?php 
  include 'koneksi.php';
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
    <title>Tambah Honor</title>
</head>

<body>
    <?php include 'template/sidebar.php'; ?>
        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-users mr-2"></i> Input Data Baru</h3>
            <hr>
            <form action="simpan_honor.php" method="post">
                <div class="form-group">
                    <label for="nama">Pilih Nama</label>
                    <select class="form-control" id="nama" name="username">
                    <?php
                            $sql = mysqli_query($koneksi, "SELECT username, nama FROM user where jurusan='".$_SESSION['jurusan']."'");
                            while($data = mysqli_fetch_array($sql)) {?>
                            <option value="<?= $data['username'] ?>"><?= $data['nama']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Kegiatan Lembur</label>
                        <input type="text" name="kegiatan" class="form-control" id="kegiatan">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Jam Lembur</label>
                        <input type="text" name="jam_lembur" class="form-control" id="jam_lembur">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Istirahat Lembur</label>
                        <input type="text" name="istirahat" class="form-control" id="istirahat">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Uang Makan</label>
                        <input type="text" name="uang_makan" class="form-control" id="uang_makan">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</body>

</html>