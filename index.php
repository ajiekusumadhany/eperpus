<?php
session_start();

include "config/koneksi.php";
$sql = mysqli_query($koneksi, "SELECT * FROM nama_app");
    $row1 = mysqli_fetch_assoc($sql);
// Check if the user is not logged in
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "Login") {
    // Redirect to the login page
    header("Location: login");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Beranda | <?= $row1['nama_app']; ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans%3A400" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bakbak+One%3A400" />
  <link rel="stylesheet" href="styles/navigasi.css" />
  <link rel="stylesheet" href="styles/footer.css" />
  <link rel="stylesheet" href="styles/beranda.css" />
</head>

<body id>
  <div class="hidden" id="hidden"></div>
  <div class="beranda">
  <?php

if(isset($_SESSION['level'])) {
    if($_SESSION['level'] == "Admin") {
        include "adminnav.php";
    } elseif($_SESSION['level'] = "Anggota") {
        include "navigasi.php";
    } else {
        echo "Role tidak valid";
    }
} else {
    echo "Session role tidak diatur";
}
?>
    <!-- awal landing -->
    <div class="container-landing">
      <div class="container-kiri-kanan">
        <div class="container-kiri">
          <img class="image-landing" src="assets/group-22.png" />
        </div>
        <div class="container-kanan">
          <div class="judul">
            <p class="p2">JELAJAHI DUNIA PENGETAHUAN</p>
            <p class="p1">melalui e-library kami!</p>
          </div>
          <p
            class="p3">
            Dapatkan akses instan ke perpustakaan digital kami.
            <br />
            Pelajari, baca, dan temukan pengetahuan baru hanya dengan beberapa klik.
          </p>
          <div class="button-baca">
          <a href="#baca-buku" style="text-decoration: none; color: #ffffff;">
          <div class="button-baca">
            MULAI BACA
          </div>
          </a>
        </div>
      </div>
      </div>

      <!-- akhir landing -->

      <!-- datar buku, kategori & tentang -->
      <div class="auto-group-container" id="baca-buku">
      <div class="book-list-section">
        <p class="see-all-link"><a href="daftar-buku">Lihat Semua</a></p>
        <div class="book-list-wrapper">
          <p class="book-list-title">Daftar Buku</p>
          <p class="favorite-books-text">Yuk baca buku favorit kalian</p>
        </div>
        <div class="book-frame-container">
          
        <?php


$query = "SELECT * FROM buku ORDER BY id_buku DESC LIMIT 3";
$result = mysqli_query($koneksi, $query);
        // Periksa apakah query berhasil
if ($result) {
    // Tampilkan buku dengan menggunakan loop while
    while ($row = mysqli_fetch_assoc($result)) {
        // Ambil data buku dari hasil query
        $judulBuku = $row['judul_buku'];
        $kategoriBuku = $row['kategori_buku'];
        $gambar = $row['foto_buku'];
        $rating = $row['rating'];

        echo '<div class="book-frame">';
        echo '<a href="detail-buku.php?id_buku=' . $row['id_buku'] . '" method="POST" enctype="multipart/form-data">';
        echo '<div class="book-cover"><img src="uploads/' . $gambar . '" alt="' . $judulBuku . '" style="width: 100%; max-width: 300px; height: auto;"></div>';
        echo '<div class="book-details">';
        echo '<div class="container-judul">';
        echo '<p class="book-title">' . $judulBuku . '</p>';
        echo '</div>';
        echo '<div class="book-category">';
        echo '<div class="category-label">' . $kategoriBuku . '</div>';
        echo '<div class="rating-wrapper">';
        echo '<img class="star-icon" src="assets/ph-star-fill-bNR.png" />';
        echo '<p class="rating-text">' . $rating . ' | 5 tersisa</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }

    // Bebaskan hasil query
    mysqli_free_result($result);
} else {
    echo "Gagal menjalankan query: " . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>
        </div>
        <div class="arrow-icon-container">
          <img class="arrow-icon" src="REPLACE_IMAGE:215:460" />
        </div>
      </div>
      <!-- Other Sections (e.g., Category Selection) -->
      <div class="category-selection-section">
        <div class="arrow-icon-wrapper">
          <img class="arrow-icon" src="REPLACE_IMAGE:215:463" />
        </div>
        <div class="arrow-icon-wrapper">
          <img class="arrow-icon" src="REPLACE_IMAGE:215:463" />
        </div>
        <div class="category-container">
          <div class="header-category">
            <p class="kategori-p1">Kategori Pilihan</p>
            <p class="kategori-p2"><a href="kategori">Lihat Selengkapnya</a></p>
          </div>
          <div class="menu-kategori-container">
            <a href="" class="menu-kategori">Fiksi</a>
            <a href="" class="menu-kategori">Non-Fiksi</a>
            <a href="" class="menu-kategori">Fantasi</a>
            <a href="" class="menu-kategori">Romance</a>
          </div>
        </div>
      </div>
      <div class="about-us-section" id="tentang">
        <div class="about-us-wrapper">
          <p class="about-us-title">Tentang Kami</p>
          <div class="about-us-content">
            <p class="welcome-message">
              Selamat Datang
              <br />
              di LibraTech
            </p>
            <div class="smile-icon">
              <img class="smile-img" src="assets/auto-group-hsbj.png" />
              <img class="vector-img" src="assets/vector-8-6CH.png" />
            </div>
          </div>
        </div>
        <div class="library-info">
        <p>
          e-library adalah pangkalan pengetahuan digital yang berdedikasi untuk memberikan akses mudah ke dunia pengetahuan.
          <br />
          Tujuan LibraTech adalah memfasilitasi akses terbuka ke pengetahuan yang mendidik, menginspirasi, dan memberdayakan
          masyarakat global. Kami percaya bahwa pengetahuan adalah hak asasi manusia, dan visi kami adalah menciptakan dunia
          di mana setiap orang dapat mengakses pengetahuan tanpa hambatan.
        </p>
      </div>
      </div>
      <!-- akhir datar buku, kategori & tentang -->
      <?php 
    include "footer.php";
    ?>
</body>
</html>