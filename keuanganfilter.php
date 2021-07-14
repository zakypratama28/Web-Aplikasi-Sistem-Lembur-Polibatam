<?php 
//tidak memperbolehkan keuangan
if($_SESSION['role'] != 'Bagian Keuangan'){
    header("Location:javascipt://history.back()");
}
?>