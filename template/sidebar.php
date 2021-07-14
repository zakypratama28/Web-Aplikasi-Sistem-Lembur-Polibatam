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
        