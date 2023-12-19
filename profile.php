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
  <title>Profile | <?= $row1['nama_app']; ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans%3A400" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bakbak+One%3A400" />
  <link rel="stylesheet" href="styles/navigasi.css" />
  <link rel="stylesheet" href="styles/footer.css" />
  <link rel="stylesheet" href="styles/profile.css" />
</head>
<body>
<div class="profile-i9P">
<?php
session_start();

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
  <div class="auto-group-ie8h-EYy">
    <div class="auto-group-d89w-MtV">
      <div class="ellipse-6LH">
      </div>
    <a href="logout"><img class="vector-C8R" src="./assets/logout.png"/></a>
    </div>
    <p class="nama-user-XgV"><?php echo $_SESSION['fullname']; ?></p>

    <div class="line-19-393">
    </div>
    <div class="group-36-kp9">
      <p class="tentang-JKs">Tentang</p>
      <p class="line-12-qah">Halo saya <?php echo $_SESSION['fullname']; ?>, saya adalah member e-perpus yang ke-<?php echo$_SESSION['id_user']; ?>
      </p>
      <p class="buku-oleh-user--Zmb">Terakhi dibaca:</p>
      <?php

$result = mysqli_query($koneksi, "SELECT d.id_user, d.id_buku, d.waktu_baca, b.judul_buku, b.penulis_buku, b.kategori_buku, b.foto_buku, b.rating
FROM dibaca d
JOIN buku b ON d.id_buku = b.id_buku
WHERE d.id_user = '{$_SESSION['id_user']}'
GROUP BY d.id_buku
ORDER BY d.waktu_baca DESC limit 1;");


// Loop untuk menampilkan informasi buku
while ($row = mysqli_fetch_assoc($result)) {
  // Ambil data buku dari hasil query
  $judulBuku = $row['judul_buku'];
  $kategoriBuku = $row['kategori_buku'];
  $gambar = $row['foto_buku'];
  $rating = $row['rating'];

  // Display each book;
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

// Tutup koneksi database
mysqli_close($koneksi);
?>
    </div>
  </div>
</div>
<?php 
    include "footer.php";
    ?>
</body>