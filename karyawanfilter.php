<?php 
//tidak memperbolehkan karyawan
if($_SESSION['role'] == 'Karyawan'){
    header("Location:javascipt://history.back()");
}
?>