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
    <title>Tambah Lembur</title>
</head>

<body>
    <?php include 'template/sidebar.php'; ?>
        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-users mr-2"></i> Input Data Baru</h3>
            <hr>
            <form action="simpan_lembur.php" method="post">

            <div class="form-group">
                <label for="nama">Pilih Nama</label>
                <select class="form-control" id="nama" name="username">
                <?php
                        $sql = mysqli_query($koneksi, "SELECT username, nama, jurusan, unit FROM user where jurusan='".$_SESSION['jurusan']."'");
                        while($data = mysqli_fetch_array($sql)) {?>
                        <option value="<?= $data['username'] ?>"><?= $data['nama']?></option>
                    <?php } ?>
                </select>
            </div>
                
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="form-control" id="jam_mulai">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="form-control" id="jam_selesai">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Kegiatan</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</body>

</html>