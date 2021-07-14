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
    <title>Detail Honor</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
    <a class="navbar-brand upper text-white" href="dashboard.php">
        <h8>Sistem Lembur Politeknik Negeri Batam</h8></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0 ml-auto">
            <div class="icon ml-2">
            <h5>
                <a href="logout.php" button class="btn btn-outline-success my-0 my-sm-0 bg-white" type="logout">Logout</button></a>
            </h5>
            </div>
            </form>
        </div>
    </nav>
    <?php include 'template/sidebar.php'; ?>

        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-table mr-2"></i>Detail Honor Lembur Karyawan</h3>
            <hr>
            <?php if($_SESSION['role'] == 'Kepala Unit'){?>
            <a href="form-tambah-dethon.php" class="btn btn-primary mb-2"> <i class="fas fa-plus-circle mr-2"></i>Add Detail Honor Lembur</a>
            <?php } ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tarif</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jumlah Jam</th>
                        <th scope="col">Total Lembur</th>
                        <th scope="col">Uang Makan</th>
                        <th scope="col">Total Lembur+Uang Makan</th>
                        <th scope="col">PPh Pasal21</th>
                        <th scope="col">Total Honor Setelah Pajak</th>
                        <th scope="col">No.Rekening</th>
                        <?php if($_SESSION['role'] == 'Kepala Unit'){?>
                        <th colspan="3" scope="col">Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
          <?php
              
              $sql = mysqli_query($koneksi, "SELECT * FROM det_honor join user on user.username=det_honor.username join kategori on user.kategori = kategori.id_kategori");
              while($data = mysqli_fetch_array($sql)) {
            ?>
          <tr>
            
            <td><?php echo $data['id_dethonor']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['kategori']; ?></td>
            <td><?php echo $data['tarif']; ?></td>
            <td><?php echo $data['tggl']; ?></td>
            <td><?php echo $data['jml_jam']; ?></td>
            <td><?php echo $data['jml_uang_lembur']; ?></td>
            <td><?php echo $data['uang_makan']; ?></td>
            <td><?php echo $data['jml_uang_lembur_makan']; ?></td>
            <td><?php echo $data['PPh_pasal21']; ?></td>
            <td><?php echo $data['jml_honor_pajak']; ?></td>
            <td><?php echo $data['rekening']; ?></td>
            <?php if($_SESSION['role'] == 'Kepala Unit'){?>
              <td><a class="fas fa-edit bg-success p-2 text-white rounded" href="ubah_dethonor.php?id_dethonor=<?php echo $data['id_dethonor']; ?>"></a></td>
              
              
              <td><a class="fas fa-trash-alt bg-danger p-2 text-white rounded" href="hapus_dethonor.php?id_dethonor=<?php echo $data['id_dethonor']; ?>"></a></td>
              <?php } ?>
            </td>
            
          </tr>
          <?php 
              }
            ?>
        </tbody>
            </table>
            <?php if ($_SESSION['role'] == 'Bagian Keuangan'){?>
                <a href="mpdf.php" class="btn btn-primary mb-2"> <i class="fas fa mr-2"></i>Cetak PDF</a>
            <?php } ?>
        </div>
        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>