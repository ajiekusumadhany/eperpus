<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php
    include "config/koneksi.php";

    $sql = mysqli_query($koneksi, "SELECT * FROM nama_app");
    $row1 = mysqli_fetch_assoc($sql);

    if (isset($_SESSION['berhasil'])) {
        echo '<script>alert("' . $_SESSION['berhasil'] . '");</script>';
        unset($_SESSION['berhasil']);
    }
    
    if (isset($_SESSION['gagal_login'])) {
        echo '<script>alert("' . $_SESSION['gagal_login'] . '");</script>';
        unset($_SESSION['gagal_login']);
    }
    if (isset($_SESSION['berhasil_keluar'])) {
        echo '<script>alert("' . $_SESSION['berhasil_keluar'] . '");</script>';
        unset($_SESSION['berhasil_keluar']);
    }
    if (isset($_SESSION['bukanadmin'])) {
      echo '<script>alert("' . $_SESSION['bukanadmin'] . '");</script>';
      unset($_SESSION['bukanadmin']);
  }
    ?>
    <title>Login | <?= $row1['nama_app']; ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,500,700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:400" />
  <link rel="stylesheet" href="styles/login.css" />
</head>

<body>
  <div class="login-container">
    <div class="header-section">
      <div class="welcome-text">
        <p class="welcome-heading">
          <span class="welcome-sub-0">Selamat datang di e-</span>
          <span class="welcome-sub-1">library</span>
        </p>
        <p class="login-instruction">Silahkan login menggunakan akun anda</p>
      </div>
      <form class="login-form" action="function/Process.php?aksi=masuk" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <p class="form-label">Username</p>
        <input type="text" name="username" id="username" class="input-field" placeholder="Username" required/>
        <p class="form-label">Password</p>
        <div class="password-input-group">
        <input type="password" name="password" id="password" class="password-field" placeholder="********" minlength="8" required />
        <img class="show-password-icon" id="show-password-icon" src="./assets/show.png" alt="Show Password" onclick="togglePassword()" />
    </div>
        <p class="password-info">Masukan password anda dengan benar!</p>
      <div class="login-button-section">
        <button class="login-button">Login</button>
        </form>
        <p class="register-info">
          <span class="register-info-sub-0">Sudah punya akun atau belum? </span>
          <span class="register-info-sub-1"><a href="register">Register</a></span>
        </p>
      </div>
    </div>
  </div>
</body>
<script>
        function togglePassword() {
            var passwordInput = document.getElementById('password');
            var icon = document.getElementById('show-password-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.src = './assets/show.png';
            } else {
                passwordInput.type = 'password';
                icon.src = './assets/show.png';
            }
        }
    </script>
</html>