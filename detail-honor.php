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
    <title>Detail Honor</title>
</head>

<body>
    
    <?php include 'template/sidebar.php'; ?>

        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-table mr-2"></i>Detail Honor Lembur Karyawan</h3>
            <hr>
            <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tarif</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jmlh Jam</th>
                        <th scope="col">Total Lembur</th>
                        <th scope="col">Uang Makan</th>
                        <th scope="col">Total Uang Lembur+Makan</th>
                        <th scope="col">PPh Pasal21</th>
                        <th scope="col">Total Honor Setelah Pajak</th>
                        <th scope="col">No.Rekening</th>
                    </tr>
                </thead>
                <tbody>
          <?php

            if($_SESSION['role'] == "Bagian Keuangan"){ 
                $query = "SELECT nama, kategori, tarif, tanggal, sum(jam_lembur) as jam_lembur, sum(uang_makan) as uang_makan, rekening FROM form_lembur JOIN honor on honor.id = form_lembur.id JOIN user on user.username = form_lembur.username join kategori on kategori.id_kategori = user.kategori group by form_lembur.username, MONTH(tanggal), YEAR(tanggal)";
            }else if($_SESSION['role'] == "Kepala Unit"){
                $query = "SELECT nama, kategori, tarif, tanggal, sum(jam_lembur) as jam_lembur, sum(uang_makan) as uang_makan, rekening FROM honor JOIN form_lembur on honor.id = form_lembur.id JOIN user on user.username = form_lembur.username join kategori on kategori.id_kategori = user.kategori where user.jurusan = '".$_SESSION['jurusan']."' group by form_lembur.username, MONTH(tanggal), YEAR(tanggal)";
            }else{
                $query = "SELECT nama, kategori, tarif, tanggal, sum(jam_lembur) as jam_lembur, sum(uang_makan) as uang_makan, rekening FROM honor JOIN form_lembur on honor.id = form_lembur.id JOIN user on user.username = form_lembur.username join kategori on kategori.id_kategori = user.kategori where form_lembur.username = '".$_SESSION['user']."'group by form_lembur.username, MONTH(tanggal), YEAR(tanggal)";
            }
            
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
            <?php if ($_SESSION['role'] == 'Bagian Keuangan'){?>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cetakPdfModal">
                <i class="fas fa mr-2"></i>Cetak PDF</a>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="cetakPdfModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Download Detail Honor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="mpdf.php" method="post">
                        <div class="form-row">
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
                            <div class="form-group col-md-6">
                                <label>Bulan</label>
                                <input type="month" name="bulan" class="form-control" id="bulan">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Download Data</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            <?php } ?>
        </div>
        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include 'template/footer.php'; ?>
</body>

</html>