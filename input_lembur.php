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
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lembur.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <title>Form Lembur</title>
</head>

<body>
    
    <?php include 'template/sidebar.php'; ?>
        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-table mr-2"></i> Input Data Baru</h3>
            <hr>
            <form action="" method="post">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>NIK</label>
                        <div class="col-sm-6">
                        <input type="text" name="nik" class="form-control" onkeyup="getData()" id="nik">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" id="jurusan">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tanggal</label>
                        <input type="text" name="tanggal" class="form-control" id="tanggal">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Jam Mulai</label>
                        <input type="text" name="jam_mulai" class="form-control" id="jam_mulai">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Jam Selesai</label>
                        <input type="text" name="jam_selesai" class="form-control" id="jam_selesai">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Keterangan Lembur</label>
                        <input type="text" name="keterangan" class="form-control" id="Keterangan">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</body>
<script>
function getData()
{
    var nik = document.getElementById('nik').value;
    console.log(nik);
    $.ajax({
        url: 'http://localhost/lembur-polibatam/getDatalembur.php?nik='+nik,
        type : 'get',
        dataType : 'json',
        success: function(result){
            console.log(result);
        },
        error: function (xhr, ajaxOptions, thrownError) {
                       //alert(xhr.status);
                      //alert(thrownError);
                      }
    })
}
</script>

</html>