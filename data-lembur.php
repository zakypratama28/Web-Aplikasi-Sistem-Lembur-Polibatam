<?php 
  include 'koneksi.php';
  include 'cek_status_login.php';
  $user = $_SESSION['user'];
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
      <!-- Required meta tags -->
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <?php include "template/header.php";?>
  <title>Data Lembur</title>
</head>

<body>
  <?php include 'template/sidebar.php'; ?>
    <div class="col-md-10 p-5 pt-2">
      <h3><i class="fas fa-table mr-2"></i>Data Lembur</h3>
      <hr>
      <?php if($_SESSION['role'] != 'Karyawan'){?>
      <a href="form-tambah-lembur.php" class="btn btn-primary mb-2"> <i class="fas fa-plus-circle mr-2"></i>Add Data Lembur</a>
      <?php } ?>
      <div class="table-responsive">
      <table class="table table-striped table-bordered" id="dataTable">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>     
            <th scope="col">Jurusan</th>
            <th scope="col">Unit</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jam Mulai</th>
            <th scope="col">Jam Selesai</th>
            <th scope="col">Kegiatan</th>
            <?php if($_SESSION['role'] != 'Karyawan'){?>
            <th scope="col">Aksi</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php

              if($_SESSION['role'] == "Bagian Keuangan"){
                $query = "SELECT * FROM form_lembur join user on form_lembur.username = user.username";
              }else if($_SESSION['role'] == "Kepala Unit"){
                $query = "SELECT * FROM form_lembur join user on form_lembur.username = user.username where jurusan='".$_SESSION['jurusan']."'";
              }else{
                $query = "SELECT * FROM form_lembur join user on form_lembur.username = user.username where form_lembur.username = '".$_SESSION['user']."'";
              }

              $i = 0;
              $sql = mysqli_query($koneksi, $query);
              while($data = mysqli_fetch_array($sql)) {
            ?>
          <tr>
            <td><?= ++$i ?></td>
            
            <td><?php echo $data['NIK']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['jurusan']; ?></td>
            <td><?php echo $data['unit']; ?></td>
            <td><?php echo $data['tanggal']; ?></td>
            <td><?php echo $data['jam_mulai']; ?></td>
            <td><?php echo $data['jam_selesai']; ?></td>
            <td><?php echo $data['keterangan']; ?></td>
            <?php if($_SESSION['role'] != 'Karyawan'){?>
              <td>
              <a class="fas fa-edit bg-success p-1 text-white rounded" href="ubah_lembur.php?id=<?php echo $data['id']; ?>"></a>
              <a class="fas fa-trash-alt bg-danger p-1 text-white rounded" onclick="deleteData('hapus_lembur.php?id=<?php echo $data['id']; ?>')"></a></td>
              <?php } ?>
          </tr>
          <?php 
              }
            ?>
        </tbody>
      </table>
    </div>

  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <?php include "template/footer.php"; ?>
</body>

</html>