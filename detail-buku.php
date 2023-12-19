<?php
session_start();

include "config/koneksi.php";
$sql = mysqli_query($koneksi, "SELECT * FROM nama_app");
    $row1 = mysqli_fetch_assoc($sql);
// Check if the user is not logged in
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "Login") {
    // Redirect to the login page
    header("Location: login.php");
    exit();
}

// Tentukan variabel yang menunjukkan apakah tombol "BACA" ditekan atau tidak
$dibacaPressed = isset($_POST['dibaca']);

// Jika tombol "BACA" ditekan, sembunyikan <div> dan tampilkan formulir

if ($dibacaPressed) {
    if (!isset($_SESSION['status']) || $_SESSION['status'] !== "Login") {
    // Redirect to the login page
    header("Location: login.php");
    exit();
}
$id_user = $_SESSION['id_user'];
$idbuku = $_SESSION['id_buku'];
$judulbuku = $_SESSION['judul_buku'];
$kategoribuku = $_SESSION['kategori_buku'];
$gambar = $_SESSION['foto_buku'];
$penulisbuku = $_SESSION['penulis_buku'];
$ringkasanbuku = $_SESSION['ringkasan_buku'];
$jumlahhalaman = $_SESSION['jumlah_halaman'];
$penerbitbuku = $_SESSION['penerbit_buku'];

        // Menambahkan waktu
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y');
        $jam = date('H:i:s');

// Lakukan penyisipan data ke dalam tabel
$query = "INSERT INTO dibaca(id_user,id_buku,judul_buku,kategori_buku,penerbit_buku,penulis_buku,jumlah_halaman,ringkasan_buku, foto_buku, waktu_baca)
  VALUES('" . $id_user . "','" . $idbuku . "','" . $judulbuku . "','" . $kategoribuku . "','" . $penerbitbuku . "','" . $penulisbuku . "','" . $jumlahhalaman . "','" . $ringkasanbuku . "','". $gambar ."','$tanggal ( $jam )')";
$hasil = mysqli_query($koneksi, $query);

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

    if (isset($_GET['id_buku'])) {
            $bookId = mysqli_real_escape_string($koneksi, $_GET['id_buku']);
        
            $query = "SELECT * FROM buku WHERE id_buku = ?";
            $stmt = mysqli_prepare($koneksi, $query);
        
            // Bind parameter
            mysqli_stmt_bind_param($stmt, "i", $bookId);
        
            // Eksekusi pernyataan
            mysqli_stmt_execute($stmt);
        
            // Dapatkan hasil
            $result = mysqli_stmt_get_result($stmt);
        }
        
        // Periksa apakah query berhasil
        if ($result) {
        
        while ($row = mysqli_fetch_assoc($result)) {
            // Ambil data buku dari hasil query
            $idbuku = $row['id_buku'];
            $judulBuku = $row['judul_buku'];
            $kategoriBuku = $row['kategori_buku'];
            $gambar = $row['foto_buku'];
            $rating = $row['rating'];
            $penulisBuku = $row['penulis_buku'];
            $deskripsiBuku = $row['ringkasan_buku'];
            $halamanBuku = $row['jumlah_halaman'];
            $penerbitBuku = $row['penerbit_buku'];
            $linkFromDatabase = $row['link_buku']; 

    // Kemudian gunakan dalam iframe
    echo '<iframe allowfullscreen="" scrolling="no" class="fp-iframe" style="margin-top:20rem; border: 1px solid lightgray; width: 100%; height: 600px;" src="' . $linkFromDatabase . '"></iframe>';
        include "footer.php";
    
        }
    } 
}
      
    else {

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
        <div class="tampilan-buku-5eH">
        <?php
        if (isset($_GET['id_buku'])) {
            $bookId = mysqli_real_escape_string($koneksi, $_GET['id_buku']);
        
            $query = "SELECT * FROM buku WHERE id_buku = ?";
            $stmt = mysqli_prepare($koneksi, $query);
        
            // Bind parameter
            mysqli_stmt_bind_param($stmt, "i", $bookId);
        
            // Eksekusi pernyataan
            mysqli_stmt_execute($stmt);
        
            // Dapatkan hasil
            $result = mysqli_stmt_get_result($stmt);
        }
        
        // Periksa apakah query berhasil
        if ($result) {
        echo '<div class="book-container">';
        
        while ($row = mysqli_fetch_assoc($result)) {
            // Ambil data buku dari hasil query
            $idbuku = $row['id_buku'];
            $judulBuku = $row['judul_buku'];
            $kategoriBuku = $row['kategori_buku'];
            $gambar = $row['foto_buku'];
            $rating = $row['rating'];
            $penulisBuku = $row['penulis_buku'];
            $deskripsiBuku = $row['ringkasan_buku'];
            $halamanBuku = $row['jumlah_halaman'];
            $penerbitBuku = $row['penerbit_buku'];
        
            $_SESSION['id_buku'] = $row['id_buku'];
            $_SESSION['judul_buku'] = $row['judul_buku'];
            $_SESSION['kategori_buku'] = $row['kategori_buku'];
            $_SESSION['foto_buku'] = $row['foto_buku'];
            $_SESSION['penulis_buku'] = $row['penulis_buku'];
            $_SESSION['jumlah_halaman'] = $row['jumlah_halaman'];
            $_SESSION['penerbit_buku'] = $row['penerbit_buku'];
            $_SESSION['ringkasan_buku'] = $row['ringkasan_buku'];
        
            
            echo '<div class="auto-group-qztj-p9w">';
            echo '<div class="auto-group-zwds-KcV">';
            echo '<div class="gambar-detail">';
            echo '<img class="rectangle-78-EDf" src="uploads/' . $gambar . '" alt="' . $judulBuku . '" style="width: 100%; max-width: 300px; height: 400px; object-fit: cover;">';
            echo '</div>';
            
        
        echo '<form action="" method="post">
                <button type="submit" name="dibaca" class="frame-8-yBF">BACA</button>
              </form>';
            echo '</div>';
            echo '<div class="group-33-Pkm">';
            echo '<div class="frame-39-9jw">';
            echo '<p class="penulis-VYu">' . $penulisBuku . '</p>';
            echo '<div class="container-judul">';
            echo '<p class="judul-buku-1n9">' . $judulBuku . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="frame-38-wQu">';
            echo '<p class="deskripsi-buku-sJZ">Deskripsi Buku</p>';
            echo '<p class="deskripsi-info-buku">';
            echo $deskripsiBuku;
            echo '</p>';
            echo '</div>';
            echo '<div class="group-34-vAM">';
            echo '<p class="detail-wr9">Detail</p>';
            echo '<div class="auto-group-skzd-fGM">';
            echo '<div class="halaman">';
            echo '<p class="jumlah-halaman-au7">Jumlah Halaman</p>';
            echo '<p class="detail-info-buku">' . $halamanBuku . '</p>';
            echo '</div>';
            echo '<div class="kategori">';
            echo '<p class="kategori-uwP">Kategori</p>';
            echo '<p class="detail-info-buku">' . $kategoriBuku . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="penerbit">';
            echo '<p class="penerbit-LWu">Penerbit</p>';
            echo '<p class="detail-info-buku">' . $penerbitBuku . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        
        echo '</div>'; // Close book-container
        // Bebaskan hasil query
        mysqli_free_result($result);
        }
        
        // Tutup koneksi
        mysqli_close($koneksi);
        ?>
        </div>
        <?php
        include "footer.php";
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Detail Buku | <?= $row1['nama_app']; ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans%3A400" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bakbak+One%3A400" />
  <link rel="stylesheet" href="styles/navigasi.css" />
  <link rel="stylesheet" href="styles/footer.css" />
  <link rel="stylesheet" href="styles/detail-buku.css" />
</head>
<body>

</body>