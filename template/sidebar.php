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
        