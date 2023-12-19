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
if (isset($_SESSION['berhasil-tambah-buku'])) {
    echo '<script>alert("' . $_SESSION['berhasil-tambah-buku'] . '");</script>';
    unset($_SESSION['berhasil-tambah-buku']);
}

if (isset($_SESSION['gagal-tambah-buku'])) {
    echo '<script>alert("' . $_SESSION['gagal-tambah-buku'] . '");</script>';
    unset($_SESSION['gagal-tambah-buku']);
}
if (!isset($_SESSION['level']) || $_SESSION['level'] !== "Admin") {
  // Redirect to the login page
  $_SESSION['bukanadmin'] = "Maaf, kamu perlu akses sebagai Admin untuk menambah buku!, silahkan login sebagai Admin! ";
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
  <title>Tambah Buku | <?= $row1['nama_app']; ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans%3A400" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bakbak+One%3A400" />
  <link rel="stylesheet" href="styles/navigasi.css" />
  <link rel="stylesheet" href="styles/footer.css" />
  <link rel="stylesheet" href="styles/tambah-buku.css" />
</head>

<body>
  <div class="beranda">
  <?php 
    include "adminnav.php";
    ?>
<form class="register-form" action="function/process.php?aksi=tambah-buku" method="POST" enctype="multipart/form-data">
  <div class="group-15-QFb">
    <div class="auto-group-ujds-KdT">
      <p class="buat-cerita-du3">Buat Cerita</p>
      <p class="silahkan-lengkapi-data-buku-di-bawah-ini-YWD">Silahkan lengkapi data buku di bawah ini</p>
    </div>
    <div class="auto-group-5feh-5FF">
      <div class="auto-group-fqeu-R4D">
        <div class="auto-group-keot-8jK">
          <p class="upload-file-fUM">Upload File</p>
          <div class="auto-group-grch-zFj">
            <input name="gambar" id="gambar" type="file" class="auto-group-fziu-hA9" accept=".png, .jpg"  onchange="displayFileName()">
            <p name="fileName" id="fileName" class="tidak-ada-file-yang-dipilih-3dK">Tidak ada file yang dipilih</p>
          </div>
          <p class="kategori-Y4H">Kategori</p>
        </div>
        <div class="auto-group-mw8m-Th3">
          <p class="ringkasan-CPj">
            <span class="ringkasan-CPj-sub-0">Ringkasan</span>
            <textarea name="ringkasanBuku" id="ringkasanBuku" class="ringkasan-CPj-sub-1" maxlength="500"> </textarea>
          </p>
          <div class="rectangle-61-Nb3">
          </div>
          <label for="kategoriBuku"></label>
                <select name="kategoriBuku" id="kategoriBuku" class="pilih-kategori-buku-Hxu">
                <option value="">Pilih kategori buku</option>
                <option value="Fiksi">Fiksi</option>
                <option value="Non Fiksi">Non Fiksi</option>
                <option value="Fantasi">Fantasi</option>
                <option value="Romance">Romance</option>
                </select>
        </div>
        <div class="rectangle-57-yKw">
        </div>
      </div>
      <div class="line-4-i2d">
      </div>
      <div class="auto-group-r2p1-F2Z">
        <div class="auto-group-qur7-A9X">
          <p class="judul-gtZ">
            <span class="judul-gtZ-sub-0">Judul </span>
          </p>
          <input name="judulBuku" id="judulBuku" type="text" class="rectangle-53-CVX">
          </input>
          <p class="penulis-vRX">Penulis</p>
          <input name="penulisBuku" id="penulisBuku" type="text" class="rectangle-55-f8D">
          </input>
          <p class="penulis-vRX">Url Buku</p>
          <input name="urlBuku" id="urlBuku" type="text" class="rectangle-55-f8D">
          </input>
          <p class="penerbit-nid">Penerbit</p>
        </div>
        <div class="auto-group-uwvy-vK3">
          <p class="jumlah-halaman-fXX">
            <span class="jumlah-halaman-fXX-sub-0">Jumlah Halaman </span>
            <span class="jumlah-halaman-fXX-sub-1"> </span>
          </p>
          <input name="penerbitBuku" id="penerbitBuku" type="text" class="rectangle-56-BeH">
          </input>
        </div>
        <input name="halamanBuku" id="halamanBuku" type="number" class="rectangle-59-i8R">
        </input>
      </div>
    </div>
    <div class="auto-group-1g3k-eGy">
      <button class="auto-group-xsuf-Nyf">Simpan</button>
</form>
      <a href="/project/ajie-eperpus/" style="color: #344c2a; text-decoration: none;">
      <div class="auto-group-gzwb-57P">
        Kembali
      </div>
</a>
    </div>
  </div>
  <?php 
    include "footer.php";
    ?>

<script>
    function displayFileName() {
        const fileInput = document.getElementById('gambar');
        const fileNameElement = document.getElementById('fileName');

        if (fileInput.files.length > 0) {
            fileNameElement.textContent = `File dipilih: ${fileInput.files[0].name}`;
        } else {
            fileNameElement.textContent = 'Tidak ada file yang dipilih';
        }
    }
</script>
</body>
</html>
    