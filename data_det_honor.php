<?php 
    include 'koneksi.php'; 
    include 'cek_status_login.php';
?>
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

    <h3 style="text-align: center;">DAFTAR PEMBERIAN LEMBUR BAGI <?= strtoupper($unit) ?> </h3>
    <h3 style="text-align: center;">POLITEKNIK NEGERI BATAM BULAN <?= strtoupper($namaBulan.' '.$tahun) ?> </h3>
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
          $query = "SELECT nama, kategori, tarif, tanggal, sum(jam_lembur) as jam_lembur, sum(uang_makan) as uang_makan, rekening FROM form_lembur JOIN honor on honor.id = form_lembur.id JOIN user on user.username = form_lembur.username join kategori on kategori.id_kategori = user.kategori where MONTH(tanggal) = $bulan and YEAR(tanggal) = $tahun and user.unit = '$unit' group by form_lembur.username, MONTH(tanggal), YEAR(tanggal)";
            
          $sql = mysqli_query($koneksi, $query);
          $i = 0; 
            while($data = mysqli_fetch_array($sql)) {
                $total_uang_lembur = $data['jam_lembur'] * $data['tarif'];
                $total_uang_lembur_makan = $total_uang_lembur + $data['uang_makan'];
                $uang_pph = round($total_uang_lembur_makan * 0.05);
              ?>
          
          <tr>
              <td><?= ++$i ?></td>
              <td><?= $data['nama'] ?></td>
              <td><?= $data['kategori']; ?></td>
              <td><?= $data['tarif']; ?></td>
              <td><?= date("m-Y", strtotime($data['tanggal'])); ?></td>
              <td><?= $data['jam_lembur'] ?></td>
              <td><?= $total_uang_lembur ?></td>
              <td><?= $data['uang_makan'] ?></td>
              <td><?= $total_uang_lembur_makan ?></td>
              <td><?= $uang_pph ?></td>
              <td><?= $total_uang_lembur_makan - $uang_pph ?></td>
              <td><?= $data['rekening'] ?></td>
          </tr>
        <?php 
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
	            <p> <strong>.......................................</strong>  
                <br><br> <span>NIP.....................................</span></p>
            </div>

            <div class="signature-right">
                <p>Bendahara Pengeluaran</p>
                <img src="data:image/png;base64,<?= $base64 ?>">
	            <p> <strong>.......................................</strong>  
                <br><br> <span>NIP.....................................</span></p>
            </div>
</body>
</html>