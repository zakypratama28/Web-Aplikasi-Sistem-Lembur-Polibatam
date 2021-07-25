<?php 
include 'koneksi.php';
include 'cek_status_login.php';
include 'kepalaUnitFilter.php';
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
    <title>Tambah Karyawan</title>
</head>

<body>
    <?php include 'template/sidebar.php'; ?>
        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-users mr-2"></i> Input Data Baru</h3>
            <hr>
            <form action="simpan_karyawan.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>NIK</label>
                        <input type="text" name="NIK" class="form-control" id="NIK">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Pilih Unit</label>
                    <select class="form-control" id="unit" name="unit">
                    <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM unit");
                        while($data = mysqli_fetch_array($sql)) {?>
                        <option value="<?= $data['nama_unit'] ?>"><?= $data['nama_unit']?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>No.HP</label>
                        <input type="text" name="telp" class="form-control" id="telp">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Pilih Kategori</label>
                    <select class="form-control" id="kategori" name="kategori">
                    <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM kategori");
                        while($data = mysqli_fetch_array($sql)) {?>
                        <option value="<?= $data['id_kategori'] ?>"><?= $data['id_kategori']?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>No.Rekening</label>
                        <input type="text" name="rekening" class="form-control" id="rekening">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" id="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Pilih Bagian</label>
                    <select class="form-control" id="role" name="role">
                    <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM role_user where id<>2"); // <> = tidak sama dengan dalam php
                        while($data = mysqli_fetch_array($sql)) {?>
                        <option value="<?= $data['id'] ?>"><?= $data['role']?></option>
                    <?php } ?>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</body>

</html>