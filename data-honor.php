<?php 
  include 'koneksi.php';
  include 'cek_status_login.php';
  $user = $_SESSION['user'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php include 'template/header.php'; ?>
    <title>Data Honor</title>
</head>

<body>

    <?php include 'template/sidebar.php'; ?>

        <div class="col-md-10 p-4 pt-2">
            <h3><i class="fas fa-table mr-2"></i>Data Honor</h3>
            <hr>
            <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam Lembur</th>
                        <th scope="col">Istirahat Lembur</th>
                        <th scope="col">Total Jam Lembur</th>
                        <th scope="col">Uang Makan</th>
                    </tr>
                </thead>
        <tbody>
          <?php
          function timeToSecond($time){
            $parsed = date_parse($time);
            $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
            return $seconds;
        }

              $i = 0;

              if($_SESSION['role'] == "Bagian Keuangan"){
                $query = "SELECT * from honor join form_lembur on honor.id = form_lembur.id join user on form_lembur.username = user.username";
              }else if($_SESSION['role'] == "Kepala Unit"){
                $query = "SELECT * FROM honor join form_lembur on honor.id = form_lembur.id join user on form_lembur.username = user.username where user.jurusan = '".$_SESSION['jurusan']."'";
              }else{
                $query = "SELECT * FROM honor join form_lembur on honor.id = form_lembur.id join user on form_lembur.username = user.username where form_lembur.username = '".$_SESSION['user']."'";
              }

              $sql = mysqli_query($koneksi, $query);
              while($data = mysqli_fetch_array($sql)) {
            ?>
          <tr>
            <td><?= ++$i ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['keterangan']; ?></td>
            <td><?= $data['tanggal']; ?></td>
            <td><?= $data['jam_lembur'] ?></td>
            <td><?= $data['istirahat'] ?></td>
            <td><?= $data['total_lembur'] ?></td>
            <td><?= $data['uang_makan'] ?></td>
          </tr>
          <?php 
              }
            ?>
        </tbody>
              </table>
            </div>
        </div>

    </div>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include 'template/footer.php'; ?>
    
</body>

</html>