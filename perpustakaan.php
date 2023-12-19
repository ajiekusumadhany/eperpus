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
<html lang="en">
<meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Daftar Buku | <?= $row1['nama_app']; ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans%3A400" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bakbak+One%3A400" />
  <link rel="stylesheet" href="styles/navigasi.css" />
  <link rel="stylesheet" href="styles/footer.css" />
  <link rel="stylesheet" href="styles/daftar-buku.css" />
</head>
<body>
<div class="daftar-buku-ANM">
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
  <p class="daftar-buku-ueh">Telah Dibaca</p>
        <!-- Search Form -->
  <div class="group-37-K69">
    <div class="frame-34-FkV">
    <?php
$query = "SELECT d.id_user, d.id_buku, d.waktu_baca, b.judul_buku, b.penulis_buku, b.kategori_buku, b.foto_buku, b.rating
FROM dibaca d
JOIN buku b ON d.id_buku = b.id_buku
WHERE d.id_user = '{$_SESSION['id_user']}'
GROUP BY d.id_buku
ORDER BY d.waktu_baca DESC limit 12;";

    $result = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil
if ($result) {
    echo '<div class="book-container">';
    
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

    echo '</div>'; // Close book-container

    // Bebaskan hasil query
    mysqli_free_result($result);
} else {
    echo "Gagal menjalankan query: " . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>

  </div>
  </div>
</div>
<?php 
    include "footer.php";
    ?>
</body>
</html>