<?php
//hanya memperbolehkan kepala unit
if($_SESSION['role'] != 'Kepala Unit'){
    header("Location:javascipt://history.back()");
}
?>