<?php
session_start();
include "../config/koneksi.php";

if ($_GET['aksi'] == "masuk") {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    $cek = mysqli_num_rows($data);

    if ($cek > 0) {

        $row = mysqli_fetch_assoc($data);

        if ($row['role'] == "Admin") {
          // Jika level user yang login adalah admin maka arahkan user ke halaman admin
          $_SESSION['id_user'] = $row['id_user'];
          $_SESSION['username'] = $username;
          $_SESSION['fullname'] = $row['fullname'];
          $_SESSION['password'] = $row['password'];
          $_SESSION['status'] = "Login";
          $_SESSION['level'] = "Admin";

          header("location: http://localhost/project/eperpus/");
      } else if ($row['role'] == "Anggota") {
          // Jika level user yang login adalah user maka arahkan user kehalaman user
          $_SESSION['id_user'] = $row['id_user'];
          $_SESSION['username'] = $username;
          $_SESSION['fullname'] = $row['fullname'];
          $_SESSION['level'] = "Anggota";
          $_SESSION['status'] = "Login";

          header("location: http://localhost/project/eperpus/");
      } else {
          // JIka login gagal tampilkan sebuah pesan gagal login melalui session
          // Dan aktifkan session pada halaman login
          $_SESSION['user_tidak_terdaftar'] = "Maaf, User tidak terdaftar pada database !!";
    
        // Langsung mengarahkan pengguna ke halaman beranda
        header("location: http://localhost/project/eperpus/");
      }
    } else {
        // JIka login gagal tampilkan sebuah pesan gagal login melalui session
        // Dan aktifkan session pada halaman login
        $_SESSION['gagal_login'] = "Nama Pengguna atau Kata Sandi salah !!";

        header("location: ../login");
    }
    
} 

elseif ($_GET['aksi'] == "daftar") {
    $fullname = $_POST['regis-nama-lengkap'];
    $username = addslashes(strtolower($_POST['regis-username']));
    $username1 = str_replace(' ', '', $username);
    $password = $_POST['regis-password'];
    $email = $_POST['regis-email'];
    $role = "Anggota";
    $join_date = date('d-m-Y');

    $query = mysqli_query($koneksi, "SELECT max(kode_user) as kodeTerakhir FROM user");
    $data = mysqli_fetch_array($query);
    $kodeTerakhir = $data['kodeTerakhir'];

    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodeTerakhir, 3, 3);

    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;

    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "AP";
    $Anggota = $huruf . sprintf("%03s", $urutan);

    $sql = "INSERT INTO user(kode_user,fullname,username,password,email,role,join_date)
            VALUES('" . $Anggota . "','" . $fullname . "','" . $username1 . "','" . $password . "','" . $email . "','" . $role . "','" . $join_date . "')";
    $sql .= mysqli_query($koneksi, $sql);
    if ($sql) {
        $_SESSION['berhasil'] = "Selamat bergabung di e-perpus " . $fullname . "!";
        header("location: ../login");
    } else {
        $_SESSION['gagal'] = "Pendaftaran Gagal !";
        header("location: ../register");
    }
}
elseif ($_GET['aksi'] == "tambah-buku") {
    $judulbuku = $_POST['judulBuku'];
    $kategoribuku = $_POST['kategoriBuku'];
    $ringkasanbuku = $_POST['ringkasanBuku'];
    $penulisbuku = $_POST['penulisBuku'];
    $penerbitbuku = $_POST['penerbitBuku'];
    $halamanbuku = $_POST['halamanBuku'];
    $urlbuku = $_POST['urlBuku'];

 // Ambil Data yang Dikirim dari Form
$nama_file = $_FILES['gambar']['name'];
$tmp_file = $_FILES['gambar']['tmp_name'];
$tipe_file = $_FILES['gambar']['type'];
// Set path folder tempat menyimpan gambarnya
$path = "../uploads/".$nama_file;
if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
  // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
  if($ukuran_file <= 5000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
    // Proses upload
    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
      // Jika gambar berhasil diupload, Lakukan :  
      // Proses simpan ke Database
      $query = "INSERT INTO buku(judul_buku,kategori_buku,penerbit_buku,penulis_buku,jumlah_halaman,ringkasan_buku, foto_buku, link_buku)
      VALUES('" . $judulbuku . "','" . $kategoribuku . "','" . $penerbitbuku . "','" . $penulisbuku . "','" . $halamanbuku . "','" . $ringkasanbuku . "','". $nama_file ."','" . $urlbuku . "')";
      $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
      
      if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        $_SESSION['berhasil-tambah-buku'] = "Buku " . $judulbuku . " Berhasil di Tambahkan";
        header("location: ../tambah-buku"); 
      }else{
        // Jika Gagal, Lakukan :
        $_SESSION['gagal-tambah-buku'] = "Buku " . $judulbuku . " Gagal di Tambahkan";
        header("location: ../tambah-buku"); 
      }
    }else{
      // Jika gambar gagal diupload, Lakukan :
      echo "Maaf, Gambar gagal untuk diupload.";
      echo "<br><a href='../tambah-buku'>Kembali Ke Halaman Tambah Buku</a>";
    }
  }else{
    // Jika ukuran file lebih dari 1MB, lakukan :
    echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 5MB";
    echo "<br><a href='../tambah-buku'>Kembali Ke Halaman Tambah Buku</a>";
  }
}else{
  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
  echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
  echo "<br><a href='../tambah-buku'>Kembali Ke Halaman Tambah Buku</a>";
}
}
elseif ($_GET['aksi'] == "subscribe") {
  $userId = $_SESSION['id_user'];
  $lamaLangganan = 365;
  $statusSubscribe = 'Aktif';

  // Hitung masa aktif langganan
  $masaAktifLangganan = date('Y-m-d', strtotime("+$lamaLangganan days"));

  // Periksa apakah langganan sudah aktif sebelumnya
  $stmtCheck = $koneksi->prepare("SELECT * FROM subscribe WHERE id_user = ? AND status_subscribe = 'Aktif'");
  $stmtCheck->bind_param("s", $userId);
  $stmtCheck->execute();
  $resultCheck = $stmtCheck->get_result();

  if ($resultCheck->num_rows > 0) {
    // Jika sudah aktif, lakukan UPDATE
    $stmtUpdate = $koneksi->prepare("UPDATE subscribe SET masa_aktif = DATE_ADD(masa_aktif, INTERVAL ? DAY) WHERE id_user = ?");
    $stmtUpdate->bind_param("ss", $lamaLangganan, $userId);
    $resultUpdate = $stmtUpdate->execute();

    if ($resultUpdate) {
      // Ambil nilai masa_aktif terkini
      $stmtGetMasaAktif = $koneksi->prepare("SELECT masa_aktif FROM subscribe WHERE id_user = ?");
      $stmtGetMasaAktif->bind_param("s", $userId);
      $stmtGetMasaAktif->execute();
      $resultMasaAktif = $stmtGetMasaAktif->get_result();
  
      if ($resultMasaAktif->num_rows > 0) {
        $rowMasaAktif = $resultMasaAktif->fetch_assoc();
        $_SESSION['masa_aktif'] = $rowMasaAktif['masa_aktif'];
      }
  
      $_SESSION['subscribe-berhasil'] = "Langganan berhasil diperpanjang! sampai: " . $_SESSION['masa_aktif'];
      header("location: ../berlangganan");
    } else {
      $_SESSION['subscribe-gagal'] = "Gagal memperpanjang langganan. Error: " . mysqli_error($koneksi);
      header("location: ../berlangganan");
    }
  } else {
    // Jika belum aktif, lakukan INSERT
    $stmtInsert = $koneksi->prepare("INSERT INTO subscribe (id_user, masa_aktif, status_subscribe) VALUES (?, ?, ?)");
    $stmtInsert->bind_param("sss", $userId, $masaAktifLangganan, $statusSubscribe);
    $resultInsert = $stmtInsert->execute();

    if ($resultInsert) {
      $_SESSION['masa_aktif'] = $masaAktifLangganan;
      $_SESSION['subscribe-berhasil'] = "Langganan telah Aktif, sampai: ". $_SESSION['masa_aktif'] ."";
      header("location: ../berlangganan");
    } else {
      $_SESSION['subscribe-gagal'] = "Gagal melakukan langganan. Error: " . $stmtInsert->error;
      header("location: ../berlangganan");
    }

    $stmtInsert->close();
  }

  $stmtCheck->close();
} else {
  echo "Aksi tidak valid.";
}


