<!DOCTYPE html>
<html>
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
if (isset($_SESSION['subscribe-berhasil'])) {
    echo '<script>alert("' . $_SESSION['subscribe-berhasil'] . '");</script>';
    unset($_SESSION['subscribe-berhasil']);
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Langganan | <?= $row1['nama_app']; ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans%3A400" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bakbak+One%3A400" />
  <link rel="stylesheet" href="styles/navigasi.css" />
  <link rel="stylesheet" href="styles/footer.css" />
  <link rel="stylesheet" href="styles/berlangganan.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<div class="berlangganan-rUq">
  <div class="langganan-b53">
    <div class="group-27-urR">
      <div class="auto-group-bh9s-rWm">
        <div class="auto-group-aqkb-mtd">
          <div class="group-28-rQH">
            <p class="selamat-datang-di-e-library-n33">
              <span class="selamat-datang-di-e-library-n33-sub-0">Selamat datang di e-</span>
              <span class="selamat-datang-di-e-library-n33-sub-1">library</span>
            </p>
            <p class="nikmati-baca-buku-favoritmu-dimana-saja-dan-kapan-saja-KKo">
            Nikmati baca buku favoritmu 
            <br/>
            dimana saja dan kapan saja
            </p>
            <p class="ayo-berlangganan-sekarang-zB3">ayo berlangganan sekarang</p>
          </div>
          <div class="bulan-tnD">
            <p class="bulan-39K">1 Bulan</p>
            <p class="rp2000000-bulan-kJd">
            Rp<span id="hargaPerBulan">20,000</span>,00 /
            <br/>
            bulan
            </p>
            <p class="di-tagih-setiap-bulan-Ejb">Di tagih setiap bulan</p>
            <div class="rectangle-76-8KB">
            </div>
          </div>
          <div class="bulan-S4y">
            <p class="bulan-PF7">6 Bulan</p>
            <p class="rp1900000-bulan-ditagih-dua-kali-setahun-sebesar-rp11400000-6-bulan-VZ3">
              <span class="rp1900000-bulan-ditagih-dua-kali-setahun-sebesar-rp11400000-6-bulan-VZ3-sub-0">
              Rp<span id="hargaPerTahun">19,000</span>,00 /
              <br/>
              bulan
              <br/>
              
              </span>
              <span class="rp1900000-bulan-ditagih-dua-kali-setahun-sebesar-rp11400000-6-bulan-VZ3-sub-1">
              ditagih dua kali setahun sebesar
              <br/>
               Rp114.000,00 / 6 bulan
              </span>
            </p>
            <p class="di-tagih-setiap-6-bulan-8Ed">Di tagih setiap 6 bulan</p>
            <div class="rectangle-76-q93">
            </div>
          </div>
          <div class="bulan-whs">
            <div class="auto-group-cj9f-sLd">
              <p class="tahun-Cdo">1 Tahun</p>
              <p class="di-tagih-setiap-tahun-j7w">Di tagih setiap tahun</p>
            </div>
            <p class="rp1000000-bulan-ditagih-dua-kali-setahun-sebesar-rp12000000-tahun-4R7">
              <span class="rp1000000-bulan-ditagih-dua-kali-setahun-sebesar-rp12000000-tahun-4R7-sub-0">
              Rp<span id="hargaPerTahun">10,000</span>,00 /
              <br/>
              bulan
              <br/>
              
              </span>
              <span class="rp1000000-bulan-ditagih-dua-kali-setahun-sebesar-rp12000000-tahun-4R7-sub-1">
              ditagih dua kali setahun sebesar
              <br/>
               Rp120.000,00 / tahun
              </span>
            </p>
          </div>
        </div>
        <div>
          <a href="http://localhost/project/eperpus">
            <Button Click="OnClick5">
              <Image class="ph-x-bold-msF" src="./assets/ph-x-bold.png"></Image>
            </Button>
          </a>
        </div>
      </div>
      <form class="frame-4-WZw" action="function/process.php?aksi=subscribe" method="POST" enctype="multipart/form-data">
    <button href="/function/process.php" id="subscribeLink" style="text-align: center; color: #ffffff; font-family: Poppins; text-decoration: none;">COBA BERLANGGANAN</button>
      </form>
    </div>
  </div>
</div>
</body>