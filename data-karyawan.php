<?php
    include 'koneksi.php';
    include 'cek_status_login.php';
    include 'karyawanfilter.php';
    $user = $_SESSION['user'];
?>
<!doctype html>
<html lang="en">

<head>
    <?php include 'template/header.php'; ?>
    
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
            <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Unit</th>
                        <th scope="col">No. HP</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">No.Rekening</th>
                        <?php if($_SESSION['role'] == 'Kepala Unit'){?>
                        <th scope="col">Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
          <?php
            if($_SESSION['role'] == 'Bagian Keuangan'){
                $query = "SELECT * FROM user";
            }else{
                $query = "SELECT * FROM user where jurusan = '".$_SESSION['jurusan']."'";
            }

              $sql = mysqli_query($koneksi, $query);
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
              <td>
                <a class="fas fa-edit bg-success p-1 text-white rounded" href="ubah_karyawan.php?NIK_karyawan=<?php echo $data['NIK']; ?>"></a>
                <a class="fas fa-trash-alt bg-danger p-1 text-white rounded" onclick="deleteData('hapus_karyawan.php?NIK_karyawan=<?php echo $data['NIK']; ?>')"></a></td>
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
    <?php include 'template/footer.php'; ?>
    
</body>

</html>