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
  <title>Kategori | <?= $row1['nama_app']; ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans%3A400" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bakbak+One%3A400" />
  <link rel="stylesheet" href="styles/navigasi.css" />
  <link rel="stylesheet" href="styles/footer.css" />
  <link rel="stylesheet" href="styles/kategori.css" />
</head>
<body>
<div class="daftar-buku-ANM">
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
<?php
// List of categories
$categories = ["Fiksi", "Non Fiksi", "Fantasi", "Romance"];

// Loop through each category
foreach ($categories as $category) {
    // Retrieve books for the current category
    $query = "SELECT * FROM buku WHERE kategori_buku = '$category' ORDER BY id_buku DESC LIMIT 10";
    $result = mysqli_query($koneksi, $query);

    // Display category title
    echo '<div class="category-container">';
    echo '<p class="daftar-buku-ueh" id="' . $category . '">' . $category . '</p>';

    // Display books for the current category
    if ($result) {
        echo '<div class="book-container">';

        while ($row = mysqli_fetch_assoc($result)) {
                 // Ambil data buku dari hasil query
                 $judulBuku = $row['judul_buku'];
                 $kategoriBuku = $row['kategori_buku'];
                 $gambar = $row['foto_buku'];
                 $rating = $row['rating'];
         
                 // Display each book
                 echo '<a href="detail-buku.php?id_buku=' . $row['id_buku'] . '" method="POST" enctype="multipart/form-data">';
                 echo '<div class="book-frame" style="margin-right: 30px;">';
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
                 echo '</div>';
                 echo '</a>';
        }
        echo '</div>'; // Close book-container

        // Bebaskan hasil query
        mysqli_free_result($result);
    } else {
        echo "Gagal menjalankan query: " . mysqli_error($koneksi);
    }

    echo '</div>'; // Close category-container
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