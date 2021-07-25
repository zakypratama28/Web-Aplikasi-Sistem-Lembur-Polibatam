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
    <link rel="shortcut icon" href="img/SLPB.png">
    <title>Dashboard</title>

</head>

<body>
    <!-- masukin sidebar -->
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

<div class="row no-gutters mt-5">
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="dashboard.php"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                    <hr class="bg-secondary">
                </li>
                
                <?php if($_SESSION['role'] == 'Kepala Unit'){?>
                <!--<li class="nav-item">
                    <a class="nav-link text-white" href="input_lembur.php"><i class="fas fa-table mr-2"></i>Form Lembur</a>
                    <hr class="bg-secondary">
                </li>-->
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="data-lembur.php"><i class="fas fa-table mr-2"></i>Data Lembur</a>
                    <hr class="bg-secondary">
                </li>

                <?php if($_SESSION['role'] !='Karyawan'){?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="data-karyawan.php"><i class="fas fa-table mr-2"></i>Data Karyawan</a>
                    <hr class="bg-secondary">
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="data-honor.php"><i class="fas fa-table mr-2"></i>Honor</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="detail-honor.php"><i class="fas fa-table mr-2"></i>Detail Honor</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
            </ul>
        </div>
        
        <!-- content -->

        <div class="card mt-5 ml-5" style="max-width: 1080px;">
            <div class="row g-0">
                <div class="col-md-4 ml-4 mt-2 mr-5">
                    <img src="img/logo.png" alt="...">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-home"> Lemburan Polibatam Administrator</i></h4>
                        <p>Anda Masuk Sebagai <?= $_SESSION["role"]?> <?= $_SESSION['role'] != "Bagian Keuangan" ? $_SESSION['jurusan'] : '' ?>!</p>
                        <p class="card-text">Semangat bekerja!!</br>
                            Selamat datang di halaman Lemburan Politeknik Negeri Batam.</br>
                            </br>Gunakan sistem ini untuk kepentingan Politeknik Negeri Batam.</p></br>
                        <p class="card-text"><small class="text-muted">Tim Support</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div> 
                                                    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>