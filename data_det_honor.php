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
                        <th scope="col">Total Lembur+Makan</th>
                        <th scope="col">PPh Pasal21</th>
                        <th scope="col">Total Honor Setelah Pajak</th>
                        <th scope="col">No.Rekening</th>
                    </tr>
                </thead>
                <tbody>
          <?php
              
              $sql = mysqli_query($koneksi, "SELECT * FROM det_honor join user on user.username=det_honor.username");
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
        </tr>
              <?php } ?>
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