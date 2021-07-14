<?php 
    include('koneksi.php');
    

    $NIK = $_POST['NIK'];
    $nama = $_POST['nama'];
    $unit = $_POST['unit'];
    $telp = $_POST['telp'];
    $kategori = $_POST['kategori'];
    $rekening = $_POST['rekening'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $input = mysqli_query($koneksi,"INSERT INTO user (NIK,nama,username,password,role_id,unit,telp, kategori,rekening) VALUES('$NIK','$nama','$username','$password','$role','$unit','$telp','$kategori','$rekening')") or die(mysqli_error($koneksi));
    if($input){
        echo "Data Berhasil Disimpan";
        header("location:data-karyawan.php"); 
    }else{
        echo "Gagal Disimpan";
    }   
?>