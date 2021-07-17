<?php 
  include 'koneksi.php';
  include 'cek_status_login.php';
  $user = $_SESSION['user'];
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
    <title>Data Honor</title>
</head>

<body>

    <?php include 'template/sidebar.php'; ?>

        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-table mr-2"></i>Data Honor</h3>
            <hr>
            <?php if($_SESSION['role'] == 'Kepala Unit'){?>
            <a href="form-tambah-honor.php" class="btn btn-primary mb-2"> <i class="fas fa-plus-circle mr-2"></i>Add Data Honor</a>
            <?php } ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kegiatan Lembur</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam Lembur</th>
                        <th scope="col">Istirahat Lembur</th>
                        <th scope="col">Total Jam Lembur</th>
                        <th scope="col">Uang Makan</th>
                        <?php if($_SESSION['role'] == 'Kepala Unit'){?>
                        <th colspan="3" scope="col">Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
        <tbody>
          <?php
              $i = 0;
              $sql = mysqli_query($koneksi, "SELECT * FROM honor join user on user.username = honor.username where user.jurusan ='".$_SESSION['jurusan']."'  order by tanggal");
              while($data = mysqli_fetch_array($sql)) {
            ?>
          <tr>
            
            <td><?= ++$i ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['kegiatan']; ?></td>
            <td><?php echo $data['tanggal']; ?></td>
            <td><?php echo $data['jam_lembur']; ?></td>
            <td><?php echo $data['istirahat']; ?></td>
            <td><?php echo $data['jml_jam_lembur']; ?></td>
            <td><?php echo $data['uang_makan']; ?></td>
            <?php if($_SESSION['role'] == 'Kepala Unit'){?>
              <td><a class="fas fa-edit bg-success p-2 text-white rounded" href="ubah_honor.php?id_honor=<?php echo $data['id_honor']; ?>"></a></td>
              
              
              <td><a class="fas fa-trash-alt bg-danger p-2 text-white rounded" href="hapus_honor.php?id_honor=<?php echo $data['id_honor']; ?>"></a></td>
              <?php } ?>
            </td>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>