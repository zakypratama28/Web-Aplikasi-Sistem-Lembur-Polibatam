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
    
    <?php include 'template/sidebar.php'; ?>

        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-table mr-2"></i>Detail Honor Lembur Karyawan</h3>
            <hr>
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
                    </tr>
                </thead>
                <tbody>
          <?php
           $i = 0;
           for($x = 0; $x < date('m'); $x++){

            $query ="SELECT user.username as username, sum(jam_lembur) as jam_lembur, sum(istirahat) as istirahat, kategori, tarif, nama, tanggal, sum(uang_makan) as uang_makan, rekening FROM honor  join user on user.username=honor.username join kategori on user.kategori = kategori.id_kategori where MONTH(tanggal) = $x and YEAR(tanggal) <= date('Y') and jurusan = '".$_SESSION['jurusan']."' group by honor.username";
            
            $sql = mysqli_query($koneksi, $query);
            
              while($data = mysqli_fetch_array($sql)) {
                  if(isset($data['username'])){
                      $jml_jam_lembur = $data['jam_lembur'] - $data['istirahat'];
                      $jml_uang_lembur = $jml_jam_lembur * $data['tarif'];
                      $jml_uang_makan_lembur = $data['uang_makan'] + $jml_uang_lembur;
                      $uang_pph = $jml_uang_makan_lembur*0.05;
                      $jml_honor_pajak = $jml_uang_makan_lembur - $uang_pph;

                      ?>
                    
                    <tr>
                        <td><?= ++$i ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['kategori']; ?></td>
                        <td><?= $data['tarif']; ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td><?= $jml_jam_lembur ?></td>
                        <td><?= $jml_uang_lembur ?></td>
                        <td><?= $data['uang_makan'] ?></td>
                        <td><?= $jml_uang_makan_lembur?></td>
                        <td><?= $uang_pph ?></td>
                        <td><?= $jml_honor_pajak ?></td>
                        <td><?= $data['rekening'] ?></td>
                    </tr>
          <?php 
                  }
            }
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