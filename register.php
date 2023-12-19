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

    if (isset($_SESSION['gagal'])) {
      echo '<script>alert("' . $_SESSION['gagal'] . '");</script>';
      unset($_SESSION['gagal']);
  }

    ?>
    <title>Register | <?= $row1['nama_app']; ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,500,700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:400" />
  <link rel="stylesheet" href="styles/register.css" />
</head>

<body>
  <div class="register-container">
    <div class="header-section">
      <div class="welcome-text">
        <p class="welcome-heading">
          <span class="welcome-sub-0">Selamat datang di e-</span>
          <span class="welcome-sub-1">library</span>
        </p>
        <p class="register-instruction">Silahkan register akun e-perpus anda</p>
      </div>
      <form class="register-form" action="function/process.php?aksi=daftar" method="POST" enctype="multipart/form-data">
        <p class="form-label">Email</p>
        <input type="email" name="regis-email" id="regis-email" class="input-field" required />
        <p class="form-label">Nama Lengkap</p>
        <input type="text" name="regis-nama-lengkap" id="regis-nama-lengkap" class="input-field" required/>
        <p class="form-label">Username</p>
        <input type="text" name="regis-username" id="regis-username" class="input-field" required/>
        <p class="form-label">Password</p>
        <div class="password-input-group">
        <input type="password" name="regis-password" id="regis-password" class="password-field" placeholder="********" minlength="8" required />
        <img class="show-password-icon" id="show-password-icon" src="./assets/show.png" alt="Show Password" onclick="togglePassword()" />
    </div>
        <p class="password-info">Masukan password minimal 8 karakter</p>
      <div class="register-button-section">
        <button class="register-button">Register</button>
        </form>
        <p class="register-info">
          <span class="register-info-sub-0">Sudah punya akun atau belum?</span>
          <span class="register-info-sub-1"><a href="login">Login</a></span>
        </p>
      </div>
    </div>
  </div>
</body>
<script>
        function togglePassword() {
            var passwordInput = document.getElementById('regis-password');
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