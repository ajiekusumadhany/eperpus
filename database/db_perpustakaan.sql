-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 02:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(125) NOT NULL,
  `kategori_buku` varchar(125) NOT NULL,
  `penerbit_buku` varchar(125) NOT NULL,
  `penulis_buku` varchar(50) NOT NULL,
  `jumlah_halaman` int(50) NOT NULL,
  `ringkasan_buku` varchar(800) NOT NULL,
  `foto_buku` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `rating` float NOT NULL DEFAULT 4.5,
  `link_buku` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `kategori_buku`, `penerbit_buku`, `penulis_buku`, `jumlah_halaman`, `ringkasan_buku`, `foto_buku`, `rating`, `link_buku`) VALUES
(9, 'The First 20 Hourst', 'Non Fiksi', 'first20hours.com', 'Josh Kaufman', 274, ' Luangkan waktu sejenak untuk mempertimbangkan berapa banyak hal yang ingin Anda pelajari untuk dilakukan. Apa yang ada di daftar Anda? Apa yang menahan Anda untuk memulai? Apakah Anda khawatir tentang waktu dan upaya yang di', 'book-1.jpg', 4.5, ''),
(10, 'Seni Mengelola Waktu', 'Non Fiksi', 'Bright Publisher', 'Brian Adam', 184, ' Satu-saruna hal yang tidak berhenti di dunia ini adalah waktu. la terus bcrjalan tanpa mengenal lelah, bahkan ia bisa terlewat bcgiru saja ketika kita lengah atau terlena karena sangat menikmati suatu momen atau mungkin keti', 'book-4.jpg', 4.5, ''),
(11, 'Kesetiaan Mr. X', 'Fiksi', ' Penerbit Gramedia Pustaka Utama', 'Keigo Higashino', 324, ' Ketika si mantan suami muncul lagi untuk memeras Yasuko Hanaoka dan putrinya, keadaan menjadi tak terkendali, hingga si mantan suami terbujur kaku di lantai apartemen. Yasuko berniat menghubungi polisi, tetapi mengurungkan n', 'kesetiaan_mr_x.jpg', 4.5, ''),
(13, 'Saat Saat Jauh', 'Romance', 'Gramedia Pustaka Utama', 'Lia Seplia', 279, ' Novel ini mengisahkan tentang Aline, yang mengabdikan dirinya untuk mengurus Panti Jompo J&J di Kota Teduh. Aline rela menunggu Alex, sang kekasih, untuk mengejar impiannya menjadi dokter di Kota Terik. ', 'saat saat jauh.jpg', 4.5, ''),
(14, 'How To Win Friends and Influence People', 'Non Fiksi', 'Gramedia Pustaka Utama', 'Dale Carnegie', 332, 'Nasihat-nasihat Dale Carnegie yang teruji waktu telah membawa hingga tidak terhitung banyaknya orang yang berhasil mendaki tangga kesuksesan dalam kehidupan pribadi dan bisnis. Salah satu buku terlaris sepanjang masa yang menjadi landasan buku-buku laris lainnya, How to Win Friends and Influence Peo', 'how to win.jpeg', 4.5, 'https://heyzine.com/flip-book/ea522b7d3f.html'),
(15, 'Mein Kampf - English - Adolf Hitler', 'Non Fiksi', '	Franz Eher', 'Adolf Hitler', 720, ' Mein Kampf adalah buku otobiografi dan manifesto buatan Adolf Hitler dari 1924 sampai 1925. Buku ini berisi proses di mana Hitler mulai bersifat antisemit dan menguraikan ideologi politiknya dan rencana masa depan untuk Jerman. Volume 1 Mein Kampf diterbitkan pada 1925 dan Volume 2 pada 1926', 'adolf.png', 4.5, 'https://heyzine.com/flip-book/d4ed09af09.html'),
(16, 'Rapunzel', 'Fantasi', 'Gramedia Pustaka Utama ', 'Disney', 48, ' Tangled merupakan film animasi musikal tahun 2010 yang disutradarai oleh Nathan Greno dan Byron Howard dan diproduksi oleh Roy Conli, John Lasseter dan Glen Keane dari Walt Disney Animation Studios. Naskah film ini ditulis oleh Dan Fogelman berdasarkan dongeng dari Jerman berjudul Rapunzel karya Br', 'rapunzel.jpg', 4.5, 'https://heyzine.com/flip-book/9fabc21c5d.html'),
(17, 'Beauty and The Best', 'Fiksi', 'Gramedia Pustaka Utama', 'Luna Torashyngu', 308, 'Ira punya semua yang diinginkan cewek seusianya: kecantikan, profesi model, kepopuleran di sekolah, dan cowok yang keren dan tajir. Cuma satu kelemahan Ira: kalo ulangan pelajaran eksakta, nilainya nggak pernah lebih dari empat! Ini jelas lampu kuning buat Ira, apalagi dia udah kelas tiga SMA.\r\n', 'ID_GPU2013MTH09BATB_B.jpg', 4.5, 'https://heyzine.com/flip-book/dd791fa437.html'),
(18, 'Berani Tidak Disukai', 'Fiksi', 'Gramedia Pustaka Utama', 'Ichiro Kishimi dan Fumitake Koga', 350, 'Berani Tidak Disukai memiliki judul asli \"The Courage to be Disliked: How to Free Yourself, Change Your Life and Achieve Real Happiness\". Buku karangan Ichiro kishimi dan Fumitake Koga ini telah terjual sebanyak lebih dari 3,5 juta eksemplar. Buku ini laris di pasaran hingga diterjemahkan ke dalam berbagai bahasa, salah satunya bahasa Indonesia. Berani Tidak Disukai merupakan buku yang berisikan dialog antara seorang filsuf dengan seorang pemuda. Dialog yang dilakukan selama lima malam ini, berisi percakapan dari seorang pemuda yang tidak puas dengan kehidupannya dan seorang filsuf yang mengajarkannya tentang bagaimana cara mendapatkan kebahagiaan di dunia. Dialog-dialog tersebut dibingkai menjadi lima percakapan yang tiap percakapannya memuat satu inti menarik tentang hidup.', '9786020633213.jpg', 4.5, 'https://heyzine.com/flip-book/990aea8bfe.html'),
(19, 'Thinking, Fast and Slow', 'Fiksi', 'Gramedia Pustaka Utama', 'Daniel Kahneman', 652, ' Daniel Kahneman adalah salah satu pemikir paling penting abad ini. Gagasannya berdampak mendalam dan luas di berbagai bidang termasuk ekonomi, pengobatan, dan politik. Dalam buku yang sangat dinanti-nantikan ini, Kahneman menjelaskan dua sistem yang mendorong cara kita berpikir. Sistem 1 bersifat cepat, intuitif, dan emosional; Sistem 2 lebih pelan, lebih bertujuan, dan lebih logis.\r\n\r\nBuku ini menyajikan pemahaman penulis mengenai pertimbangan dan pengambilan keputusan, yang telah dibentuk oleh ', '9786020637181_THINKING_FAST_AND_SLOW_C_1_4-1.jpg', 4.5, 'https://heyzine.com/flip-book/4e893c3a15.html');

-- --------------------------------------------------------

--
-- Table structure for table `dibaca`
--

CREATE TABLE `dibaca` (
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(125) NOT NULL,
  `penerbit_buku` varchar(125) NOT NULL,
  `kategori_buku` varchar(125) NOT NULL,
  `penulis_buku` varchar(50) NOT NULL,
  `jumlah_halaman` int(50) NOT NULL,
  `ringkasan_buku` varchar(300) NOT NULL,
  `foto_buku` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `rating` float NOT NULL DEFAULT 4.5,
  `waktu_baca` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dibaca`
--

INSERT INTO `dibaca` (`id_user`, `id_buku`, `judul_buku`, `penerbit_buku`, `kategori_buku`, `penulis_buku`, `jumlah_halaman`, `ringkasan_buku`, `foto_buku`, `rating`, `waktu_baca`) VALUES
(2, 12, ' Tangis Di Rinai Gerimis Cries In The Drizzle', 'Gramedia Pustaka Utama', 'Fiksi', 'Yu Hua', 312, 'Sejak masih kecil, Sun Guanglin, anak kedua dari tiga bersaudara yang selalu diabaikan oleh orangtuanya dan kedua saudara laki-lakinya. Saat umurnya enam tahun, ia dititipkan kepada keluarga lain yang jauh lebih mapan dan pulang ke rumahnya enam tahun kemudian.', 'tangis_di_rinai_gerimis.jpg', 4.5, '19-12-2023 ( 00:39:25 )'),
(2, 12, ' Tangis Di Rinai Gerimis Cries In The Drizzle', 'Gramedia Pustaka Utama', 'Fiksi', 'Yu Hua', 312, 'Sejak masih kecil, Sun Guanglin, anak kedua dari tiga bersaudara yang selalu diabaikan oleh orangtuanya dan kedua saudara laki-lakinya. Saat umurnya enam tahun, ia dititipkan kepada keluarga lain yang jauh lebih mapan dan pulang ke rumahnya enam tahun kemudian.', 'tangis_di_rinai_gerimis.jpg', 4.5, '19-12-2023 ( 00:39:26 )'),
(2, 12, ' Tangis Di Rinai Gerimis Cries In The Drizzle', 'Gramedia Pustaka Utama', 'Fiksi', 'Yu Hua', 312, 'Sejak masih kecil, Sun Guanglin, anak kedua dari tiga bersaudara yang selalu diabaikan oleh orangtuanya dan kedua saudara laki-lakinya. Saat umurnya enam tahun, ia dititipkan kepada keluarga lain yang jauh lebih mapan dan pulang ke rumahnya enam tahun kemudian.', 'tangis_di_rinai_gerimis.jpg', 4.5, '19-12-2023 ( 00:43:03 )'),
(2, 12, ' Tangis Di Rinai Gerimis Cries In The Drizzle', 'Gramedia Pustaka Utama', 'Fiksi', 'Yu Hua', 312, 'Sejak masih kecil, Sun Guanglin, anak kedua dari tiga bersaudara yang selalu diabaikan oleh orangtuanya dan kedua saudara laki-lakinya. Saat umurnya enam tahun, ia dititipkan kepada keluarga lain yang jauh lebih mapan dan pulang ke rumahnya enam tahun kemudian.', 'tangis_di_rinai_gerimis.jpg', 4.5, '19-12-2023 ( 00:43:06 )'),
(2, 11, 'Kesetiaan Mr. X', ' Penerbit Gramedia Pustaka Utama', 'Fiksi', 'Keigo Higashino', 324, ' Ketika si mantan suami muncul lagi untuk memeras Yasuko Hanaoka dan putrinya, keadaan menjadi tak terkendali, hingga si mantan suami terbujur kaku di lantai apartemen. Yasuko berniat menghubungi polisi, tetapi mengurungkan n', 'kesetiaan_mr_x.jpg', 4.5, '19-12-2023 ( 00:43:25 )'),
(2, 12, ' Tangis Di Rinai Gerimis Cries In The Drizzle', 'Gramedia Pustaka Utama', 'Fiksi', 'Yu Hua', 312, 'Sejak masih kecil, Sun Guanglin, anak kedua dari tiga bersaudara yang selalu diabaikan oleh orangtuanya dan kedua saudara laki-lakinya. Saat umurnya enam tahun, ia dititipkan kepada keluarga lain yang jauh lebih mapan dan pulang ke rumahnya enam tahun kemudian.', 'tangis_di_rinai_gerimis.jpg', 4.5, '19-12-2023 ( 00:49:47 )'),
(2, 13, 'Saat Saat Jauh', 'Gramedia Pustaka Utama', 'Romance', 'Lia Seplia', 279, ' Novel ini mengisahkan tentang Aline, yang mengabdikan dirinya untuk mengurus Panti Jompo J&J di Kota Teduh. Aline rela menunggu Alex, sang kekasih, untuk mengejar impiannya menjadi dokter di Kota Terik. ', 'saat saat jauh.jpg', 4.5, '19-12-2023 ( 01:14:11 )'),
(1, 9, 'The First 20 Hourst', 'first20hours.com', 'Non Fiksi', 'Josh Kaufman', 274, ' Luangkan waktu sejenak untuk mempertimbangkan berapa banyak hal yang ingin Anda pelajari untuk dilakukan. Apa yang ada di daftar Anda? Apa yang menahan Anda untuk memulai? Apakah Anda khawatir tentang waktu dan upaya yang di', 'book-1.jpg', 4.5, '19-12-2023 ( 01:23:31 )'),
(1, 8, 'Belajar Python', 'hyou studio', 'Non Fiksi', 'oreki', 567, ' belajar python terbaik', 'book-6.jpg', 4.5, '19-12-2023 ( 03:56:46 )'),
(1, 13, 'Saat Saat Jauh', 'Gramedia Pustaka Utama', 'Romance', 'Lia Seplia', 279, ' Novel ini mengisahkan tentang Aline, yang mengabdikan dirinya untuk mengurus Panti Jompo J&J di Kota Teduh. Aline rela menunggu Alex, sang kekasih, untuk mengejar impiannya menjadi dokter di Kota Terik. ', 'saat saat jauh.jpg', 4.5, '19-12-2023 ( 05:00:14 )'),
(1, 13, 'Saat Saat Jauh', 'Gramedia Pustaka Utama', 'Romance', 'Lia Seplia', 279, ' Novel ini mengisahkan tentang Aline, yang mengabdikan dirinya untuk mengurus Panti Jompo J&J di Kota Teduh. Aline rela menunggu Alex, sang kekasih, untuk mengejar impiannya menjadi dokter di Kota Terik. ', 'saat saat jauh.jpg', 4.5, '19-12-2023 ( 05:01:59 )'),
(1, 13, 'Saat Saat Jauh', 'Gramedia Pustaka Utama', 'Romance', 'Lia Seplia', 279, ' Novel ini mengisahkan tentang Aline, yang mengabdikan dirinya untuk mengurus Panti Jompo J&J di Kota Teduh. Aline rela menunggu Alex, sang kekasih, untuk mengejar impiannya menjadi dokter di Kota Terik. ', 'saat saat jauh.jpg', 4.5, '19-12-2023 ( 05:02:02 )'),
(1, 13, 'Saat Saat Jauh', 'Gramedia Pustaka Utama', 'Romance', 'Lia Seplia', 279, ' Novel ini mengisahkan tentang Aline, yang mengabdikan dirinya untuk mengurus Panti Jompo J&J di Kota Teduh. Aline rela menunggu Alex, sang kekasih, untuk mengejar impiannya menjadi dokter di Kota Terik. ', 'saat saat jauh.jpg', 4.5, '19-12-2023 ( 05:02:29 )'),
(1, 13, 'Saat Saat Jauh', 'Gramedia Pustaka Utama', 'Romance', 'Lia Seplia', 279, ' Novel ini mengisahkan tentang Aline, yang mengabdikan dirinya untuk mengurus Panti Jompo J&J di Kota Teduh. Aline rela menunggu Alex, sang kekasih, untuk mengejar impiannya menjadi dokter di Kota Terik. ', 'saat saat jauh.jpg', 4.5, '19-12-2023 ( 05:02:36 )'),
(1, 13, 'Saat Saat Jauh', 'Gramedia Pustaka Utama', 'Romance', 'Lia Seplia', 279, ' Novel ini mengisahkan tentang Aline, yang mengabdikan dirinya untuk mengurus Panti Jompo J&J di Kota Teduh. Aline rela menunggu Alex, sang kekasih, untuk mengejar impiannya menjadi dokter di Kota Terik. ', 'saat saat jauh.jpg', 4.5, '19-12-2023 ( 05:04:27 )'),
(1, 13, 'Saat Saat Jauh', 'Gramedia Pustaka Utama', 'Romance', 'Lia Seplia', 279, ' Novel ini mengisahkan tentang Aline, yang mengabdikan dirinya untuk mengurus Panti Jompo J&J di Kota Teduh. Aline rela menunggu Alex, sang kekasih, untuk mengejar impiannya menjadi dokter di Kota Terik. ', 'saat saat jauh.jpg', 4.5, '19-12-2023 ( 05:04:37 )'),
(1, 11, 'Kesetiaan Mr. X', ' Penerbit Gramedia Pustaka Utama', 'Fiksi', 'Keigo Higashino', 324, ' Ketika si mantan suami muncul lagi untuk memeras Yasuko Hanaoka dan putrinya, keadaan menjadi tak terkendali, hingga si mantan suami terbujur kaku di lantai apartemen. Yasuko berniat menghubungi polisi, tetapi mengurungkan n', 'kesetiaan_mr_x.jpg', 4.5, '19-12-2023 ( 07:02:08 )'),
(2, 14, 'How To Win Friends and Influence People', 'Gramedia Pustaka Utama', 'Non Fiksi', 'Dale Carnegie', 332, 'Nasihat-nasihat Dale Carnegie yang teruji waktu telah membawa hingga tidak terhitung banyaknya orang yang berhasil mendaki tangga kesuksesan dalam kehidupan pribadi dan bisnis. Salah satu buku terlaris sepanjang masa yang menjadi landasan buku-buku laris lainnya, How to Win Friends and Influence Peo', 'how to win.jpeg', 4.5, '19-12-2023 ( 07:04:00 )'),
(2, 9, 'The First 20 Hourst', 'first20hours.com', 'Non Fiksi', 'Josh Kaufman', 274, ' Luangkan waktu sejenak untuk mempertimbangkan berapa banyak hal yang ingin Anda pelajari untuk dilakukan. Apa yang ada di daftar Anda? Apa yang menahan Anda untuk memulai? Apakah Anda khawatir tentang waktu dan upaya yang di', 'book-1.jpg', 4.5, '19-12-2023 ( 07:04:17 )'),
(2, 10, 'Seni Mengelola Waktu', 'Bright Publisher', 'Non Fiksi', 'Brian Adam', 184, ' Satu-saruna hal yang tidak berhenti di dunia ini adalah waktu. la terus bcrjalan tanpa mengenal lelah, bahkan ia bisa terlewat bcgiru saja ketika kita lengah atau terlena karena sangat menikmati suatu momen atau mungkin keti', 'book-4.jpg', 4.5, '19-12-2023 ( 07:04:59 )'),
(1, 15, 'Mein Kampf - English - Adolf Hitler', '	Franz Eher', 'Non Fiksi', 'Adolf Hitler', 720, ' Mein Kampf adalah buku otobiografi dan manifesto buatan Adolf Hitler dari 1924 sampai 1925. Buku ini berisi proses di mana Hitler mulai bersifat antisemit dan menguraikan ideologi politiknya dan rencana masa depan untuk Jerman. Volume 1 Mein Kampf diterbitkan pada 1925 dan Volume 2 pada 1926', 'adolf.png', 4.5, '19-12-2023 ( 07:15:00 )'),
(1, 16, 'Rapunzel', 'Gramedia Pustaka Utama ', 'Fantasi', 'Disney', 48, ' Tangled merupakan film animasi musikal tahun 2010 yang disutradarai oleh Nathan Greno dan Byron Howard dan diproduksi oleh Roy Conli, John Lasseter dan Glen Keane dari Walt Disney Animation Studios. Naskah film ini ditulis oleh Dan Fogelman berdasarkan dongeng dari Jerman berjudul Rapunzel karya Br', 'rapunzel.jpg', 4.5, '19-12-2023 ( 07:20:25 )');

-- --------------------------------------------------------

--
-- Table structure for table `nama_app`
--

CREATE TABLE `nama_app` (
  `id_app` int(11) NOT NULL,
  `nama_app` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nama_app`
--

INSERT INTO `nama_app` (`id_app`, `nama_app`) VALUES
(1, 'E - Perpus');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id_user` int(11) NOT NULL,
  `masa_aktif` varchar(225) NOT NULL,
  `status_subscribe` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id_user`, `masa_aktif`, `status_subscribe`) VALUES
(1, '2026-12-17', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `kode_user` varchar(25) NOT NULL,
  `fullname` varchar(125) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(225) NOT NULL,
  `role` varchar(50) NOT NULL,
  `join_date` varchar(125) NOT NULL,
  `terakhir_login` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `kode_user`, `fullname`, `username`, `password`, `email`, `role`, `join_date`, `terakhir_login`) VALUES
(1, '-', 'Administrator', 'admin', 'adminno1', '-', 'Admin', '04-05-2021', '18-12-2023 ( 20:39:16 )'),
(2, 'AP001', 'Ajie Ikrus Kusumadhany', 'ajiekusumadhany', 'anggotano1', 'ajiekusumadhany@gmail.com', 'Anggota', '16-12-2023', '19-12-2023 ( 00:45:04 )'),
(11, 'AP003', 'Ajie Kusumadhany', 'cobaeperpus', 'cobaeperpus123', 'cobaeperpus@gmail.com', 'Anggota', '18-12-2023', '18-12-2023 ( 20:54:01 )');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `nama_app`
--
ALTER TABLE `nama_app`
  ADD PRIMARY KEY (`id_app`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nama_app`
--
ALTER TABLE `nama_app`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
