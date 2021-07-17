<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <style>
    .pdf-header{
        text-align: center; 
        font-weight: bold; 
        font-size:14px;
    }
    table {
            margin-top: 50px;
        }

        .table,
        .table td,
        .table th {
            text-align: center;
            border: 1px solid black;
        }

        .table {
            margin-top: 30px;
            margin-bottom: 50px;
            width: 100%;
            border-collapse: collapse;
        }
        .signature-right {
            display: block;
            margin-left: auto;
            text-align: left;
            width: 200px;
            float: right;
        }

        .signature-right img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100px
        }

        .signature-left {
            display: block;
            margin-left: auto;
            text-align: left;
            width: 200px;
            float: left;
        }

        .signature-left img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100px
        }
    </style>
    <title>Data Detail Honor</title>
</head>
<body>
    <p class="pdf-header">DAFTAR PEMBERIAN LEMBUR BAGI TENAGA KEPENDIDIKAN</p>
    <p class="pdf-header">POLITEKNIK NEGERI BATAM BULAN DESEMBER 2021</p>
    <div class="col-md-10 p-5 pt-2">
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

            $query ="SELECT user.username as username, sum(jam_lembur) as jam_lembur, sum(istirahat) as istirahat, kategori, tarif, nama, tanggal, sum(uang_makan) as uang_makan, rekening FROM honor join user on user.username=honor.username join kategori on user.kategori = kategori.id_kategori where MONTH(tanggal) = $x and YEAR(tanggal) <= date('Y') and jurusan = '".$_SESSION['jurusan']."'";
            
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
            <div class="signature-left">
                <?php
                    $path = 'img/putih.png';
                    $data = file_get_contents($path);
                    $base64 = base64_encode($data);
                ?>
                <p class="">Pejabat Pembuat Komitmen</p>
                <img src="data:image/png;base64,<?= $base64 ?>">
	            <p> <strong>Bambang Hendrawan</strong>  <br> <span>NIP.197706252012121003</span></p>
            </div>

            <div class="signature-right">
                <p>Pejabat Pembuat Komitmen</p>
                <img src="data:image/png;base64,<?= $base64 ?>">
	            <p> <strong>Ratna Juwita</strong>  <br> <span> NIP.198602202015042003</span></p>
            </div>
</body>
</html>