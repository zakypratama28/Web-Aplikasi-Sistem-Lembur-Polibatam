<?php 
  include 'koneksi.php';

  $user = $_POST['username'];
  $pass = $_POST['password'];

  $data = mysqli_query($koneksi, "SELECT * FROM user join role_user on user.role_id = role_user.id WHERE username='$user' AND password='$pass'") or die(mysqli_error($koneksi));
  
  if(mysqli_num_rows($data) > 0) {
    $row = mysqli_fetch_array($data);

    $data = mysqli_query($koneksi, "update user SET is_active=1 where username='".$row['username']."'") or die(mysqli_error($koneksi));
    $_SESSION['user'] = $row['username'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['status'] = 'login';

    header("location: dashboard.php");
  } else {
?>
  <script>
    alert("Data anda tidak valid");
    window.location.href = "login.php";
  </script>
<?php
  }

?>