<?php
    include 'koneksi.php';
    include 'cek_status_login.php';
    include 'karyawanfilter.php';
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
    <title>Data Karyawan</title>
</head>

<body>

    <?php include 'template/sidebar.php'; ?>
        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-table mr-2"></i>Data Karyawan</h3>
            <hr>
            <?php if($_SESSION['role'] == 'Kepala Unit'){?>
            <a href="form-tambah-karyawan.php" class="btn btn-primary mb-2"> <i class="fas fa-plus-circle mr-2"></i>Add Data Karyawan</a>
            <?php } ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Unit</th>
                        <th scope="col">No. HP</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">No.Rekening</th>
                        <?php if($_SESSION['role'] == 'Kepala Unit'){?>
                        <th colspan="3" scope="col">Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
          <?php
              //$no = 1;
              $sql = mysqli_query($koneksi, "SELECT * FROM user where jurusan = '".$_SESSION['jurusan']."'");
              while($data = mysqli_fetch_array($sql)) {
            ?>
          <tr>
            
            <td><?php echo $data['NIK']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['unit']; ?></td>
            <td><?php echo $data['telp']; ?></td>
            <td><?php echo $data['kategori']; ?></td>
            <td><?php echo $data['rekening']; ?></td>
            <?php if($_SESSION['role'] == 'Kepala Unit'){?>
              <td><a class="fas fa-edit bg-success p-1 text-white rounded" href="ubah_karyawan.php?NIK_karyawan=<?php echo $data['NIK']; ?>"></a></td>
              
              <td><a class="fas fa-trash-alt bg-danger p-1 text-white rounded" href="hapus_karyawan.php?NIK_karyawan=<?php echo $data['NIK']; ?>"></a></td>
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