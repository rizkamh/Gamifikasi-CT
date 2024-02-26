-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2022 pada 22.35
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbladmin`
--

CREATE TABLE `tbladmin` (
  `idadmin` int(11) NOT NULL,
  `namaadmin` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Lainnya') NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `status` enum('admin','dosen') NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbladmin`
--

INSERT INTO `tbladmin` (`idadmin`, `namaadmin`, `alamat`, `email`, `tanggallahir`, `agama`, `jekel`, `telepon`, `status`, `password`) VALUES
(123456, 'Admin', 'Banjarejo. Bojonegoro', 'lisuardidina@gmail.com', '1999-06-07', 'Islam', 'P', '081363872020', 'admin', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(107098601, 'Dr. Hartono, S.Kom., M.Kom., IPM', 'Medan,Sumatra utara', 'hartono@gmail.com', '1980-01-01', 'Buddha', 'L', '061123123', 'dosen', 'e10adc3949ba59abbe56e057f20f883e'),
(112097201, 'Sukiman, S.T., M.T., IPM', 'Medan, Sumatra Utara', 'sukman@gmail.com', '1980-01-01', 'Buddha', 'L', '06111111', 'dosen', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblbedge`
--

CREATE TABLE `tblbedge` (
  `idbedge` int(11) NOT NULL,
  `nama_bedge` varchar(100) NOT NULL,
  `gambar_bedge` varchar(100) NOT NULL,
  `nilai_bedge` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblbedge`
--

INSERT INTO `tblbedge` (`idbedge`, `nama_bedge`, `gambar_bedge`, `nilai_bedge`) VALUES
(2, 'anak baik', 'anak_baik.png', 150),
(3, 'anak cerdas', 'anak_cerdas_.png', 450),
(4, 'anak jenius', 'anak_jenius.png', 900);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblgambar`
--

CREATE TABLE `tblgambar` (
  `idgambar` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `file` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblgambar`
--

INSERT INTO `tblgambar` (`idgambar`, `nim`, `file`) VALUES
(46, '123456', '123456.jpg'),
(94, '1513121453', '1513121453.jpg'),
(95, '1513121462', '1513121462.jpg'),
(96, '1513121464', '1513121464.jpg'),
(97, '1513121526', '1513121526.jpg'),
(98, '1513121452', '1513121452.jpg'),
(99, '1513121471', '1513121471.jpg'),
(100, '1513121486', '1513121486.jpg'),
(101, '1513121502', '1513121502.jpg'),
(107, '1513121497', '1513121497.jpg'),
(108, '1513121472', '1513121472.jpg'),
(109, '1513121481', '1513121481.jpg'),
(110, '1513121499', '1513121499.jpg'),
(111, '1513121454', '1513121454.jpg'),
(112, '1234567890', '1234567890.png'),
(113, '3123313123', '3123313123.jpeg'),
(114, '1941723005', '1941723005.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblkelas`
--

CREATE TABLE `tblkelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbllevel`
--

CREATE TABLE `tbllevel` (
  `idlevel` int(10) UNSIGNED NOT NULL,
  `nama_level` varchar(100) NOT NULL,
  `minimum_point` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbllevel`
--

INSERT INTO `tbllevel` (`idlevel`, `nama_level`, `minimum_point`, `icon`) VALUES
(1, 'Siaga untuk SD', '100', 'sd.png'),
(2, 'Penegak untuk SMP', '200', 'smp.png'),
(3, 'Penggalang untuk SMA', '300', 'sma.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmahasiswa`
--

CREATE TABLE `tblmahasiswa` (
  `nim` varchar(10) NOT NULL,
  `namamhs` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Lainnya') NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `prodi` enum('TI','SI') NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `kelas` enum('P1','P2','M1') NOT NULL,
  `password` varchar(100) NOT NULL,
  `file` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmatakuliah`
--

CREATE TABLE `tblmatakuliah` (
  `kodemk` varchar(20) NOT NULL,
  `namamk` varchar(50) NOT NULL,
  `iddosen` int(11) NOT NULL,
  `namadosen` varchar(50) NOT NULL,
  `prodi` enum('TI','SI') NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblmatakuliah`
--

INSERT INTO `tblmatakuliah` (`kodemk`, `namamk`, `iddosen`, `namadosen`, `prodi`, `semester`) VALUES
('MK1', 'Pengantar Informatika', 123456, 'Admin', 'TI', '1'),
('MK2', 'PPP', 107098601, 'dddd', 'TI', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmatakuliah_sec`
--

CREATE TABLE `tblmatakuliah_sec` (
  `kodemk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblmatakuliah_sec`
--

INSERT INTO `tblmatakuliah_sec` (`kodemk`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmateri`
--

CREATE TABLE `tblmateri` (
  `idmateri` int(11) NOT NULL,
  `idpengirim` varchar(25) NOT NULL,
  `namapengirim` varchar(50) NOT NULL,
  `matakuliah` varchar(100) NOT NULL,
  `judulmateri` mediumtext NOT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `file` longtext NOT NULL,
  `tipe` enum('m','d') DEFAULT NULL,
  `prodi` enum('TI','SI') DEFAULT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') DEFAULT NULL,
  `pertemuan` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblmateri`
--

INSERT INTO `tblmateri` (`idmateri`, `idpengirim`, `namapengirim`, `matakuliah`, `judulmateri`, `tanggal`, `file`, `tipe`, `prodi`, `semester`, `pertemuan`) VALUES
(140, '123456', 'Admin', 'MK1', 'Pengantar Informatika', '2019-08-03 20:40:34', 'Pengantar_Informatika.pdf', 'm', 'TI', '1', NULL),
(141, '123456', 'Admin', 'MK1', 'Pemodelan sistem perangkat lunak', '2019-08-03 21:40:34', 'Pemodelan_sistem_perangkat_lunak.pdf', 'm', 'TI', '1', NULL),
(142, '123456', 'Admin', 'MK1', 'Strukturisasi kebutuhan', '2019-08-03 21:41:58', 'Strukturisasi_Kebutuhan.pdf', 'm', 'TI', '1', NULL),
(151, '123456', 'Admin', 'MK1', 'Bagan struktur', '2019-08-03 22:01:48', 'Bagan_Struktur.pdf', 'm', 'TI', '1', NULL),
(153, '123456', 'Admin', 'MK1', 'Perkembangan Komputer', '2019-08-04 03:28:34', '<p style=\"margin-left:160px\"><img alt=\"\" src=\"http://localhost/online/assets/ckfinder/userfiles/files/Drawing1.jpg\" style=\"height:225px; width:500px\" /></p>\r\n\r\n<p>Untuk pertemuan awal ini coba saudara diskusikan materi-materi berikut ini:</p>\r\n\r\n<ul>\r\n	<li>Pengertian Teknologi.</li>\r\n	<li>Jelaskan 3 Aspek Dasar Sistem Komputer!</li>\r\n	<li>Peranan Teknologi Informasi.</li>\r\n</ul>\r\n', 'd', 'TI', '1', '1'),
(154, '123456', 'Admin', 'MK1', 'Dasar Sistem Komputer', '2019-08-04 03:30:10', '<p>Untuk Pertemuan Minggu ke-2&nbsp;coba anda diskusikan mengenai istilah berikut:</p>\r\n\r\n<ol>\r\n	<li>CPU</li>\r\n	<li>ROM</li>\r\n	<li>RAM</li>\r\n	<li>ATM</li>\r\n	<li>PDA</li>\r\n	<li>CT Scan</li>\r\n	<li>Embedded IT System</li>\r\n	<li>Dedicated IT System</li>\r\n</ol>\r\n', 'd', 'TI', '1', '2'),
(155, '123456', 'Admin', 'MK1', 'Piranti Keras dan Cara Merakitnya', '2019-08-04 03:34:13', '<p>Komponen perakit komputer tersedia di pasaran dengan beragam pilihan kualitas dan harga. Dengan merakit sendiri komputer, kita dapat menentukan jenis komponen, kemampuan serta fasilitas dari komputer sesuai kebutuhan.Tahapan dalam perakitan komputer terdiri dari:</p>\r\n\r\n<p>A. Persiapan<br />\r\nB. Perakitan<br />\r\nC. Pengujian<br />\r\nD. Penanganan Masalah</p>\r\n\r\n<p>Coba diskusikan mengenai hal diatas</p>\r\n\r\n<p style=\"margin-left:320px\"><img alt=\"\" src=\"http://localhost/online/assets/ckfinder/userfiles/files/8310727_20160116011919.jpg\" style=\"float:left; height:221px; width:200px\" /></p>\r\n', 'd', 'TI', '1', '3'),
(156, '123456', 'Admin', 'MK1', 'Media Penyimpanan Data Berkinerja Tinggi', '2019-08-04 03:37:14', '<p style=\"margin-left:320px\"><img alt=\"\" src=\"http://localhost/online/assets/ckfinder/userfiles/files/8310727_20160116011919.jpg\" style=\"height:221px; width:200px\" /></p>\r\n\r\n<p>Diskusikan tentang:</p>\r\n\r\n<ol>\r\n	<li>&nbsp;Media Penyimpanan Magnetik (Magnetik Storage Media)</li>\r\n	<li>Media Penyimpanan Optical (Optical Disk)</li>\r\n	<li>Apa kelebihan Unicode terhadap ASCII dan EBCDIC?</li>\r\n	<li>Jelaskan perbedaan ROM dan RAM.</li>\r\n	<li>Apa yang dimaksud dengan embedded computer?</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n', 'd', 'TI', '1', '4'),
(157, '123456', 'Admin', 'MK2', 'Pengantar teknologi informatika', '2019-08-03 22:49:45', 'Pengantar_Informatika.pdf', 'm', 'SI', '1', NULL),
(158, '123456', 'Admin', 'MK2', 'Konsep sistem informasi', '2019-08-03 22:50:06', 'Konsep_Sistem_Informasi.pdf', 'm', 'SI', '1', NULL),
(159, '123456', 'Admin', 'MK2', 'Pengantar Informasi', '2019-08-04 03:51:33', '<p>Terdapat beberapa definisi, antara lain :</p>\r\n\r\n<ol start=\"1\">\r\n	<li>Data yang diolah menjadi bentuk yang lebih berguna dan lebih berarti bagi yang menerimanya.</li>\r\n	<li>Sesuatu yang nyata atau setengah nyata yang dapat mengurangi derajat ketidakpastian tentang suatu keadaan atau kejadian. Sebagai contoh, informasi yang menyatakan bahwa nilai rupiah akan naik, akan mengurangi ketidakpastian mengenai jadi tidaknya sebuah investasi akan dilakukan.</li>\r\n	<li>Data organized to help choose some current or future action or nonaction to fullfill company goals (the choice is called business decision making).</li>\r\n</ol>\r\n\r\n<p>Coba diskusikan</p>\r\n', 'd', 'SI', '1', '1'),
(160, '123456', 'Admin', 'MK2', 'Pengenalan sistem informasi', '2019-08-04 03:52:33', '<p>Coba diskusikan mengenai pemanfaatan Manajemen dan Model Keputusan!</p>\r\n', 'd', 'SI', '1', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpengumuman`
--

CREATE TABLE `tblpengumuman` (
  `idpengumuman` int(11) NOT NULL,
  `idpengirim` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi` longtext NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblpengumuman`
--

INSERT INTO `tblpengumuman` (`idpengumuman`, `idpengirim`, `nama`, `isi`, `tanggal`) VALUES
(0, '123456', 'Admin', '<p><img alt=\"\" src=\"http://localhost/online/assets/ckfinder/userfiles/files/anak%20jenius.png\" style=\"height:512px; width:512px\" /></p>\r\n\r\n<p>Berikut adalah Bedge anak jenius, ketika mahasiswa mendapat kan nilai tertinggi&nbsp;</p>\r\n', '2022-06-21 10:01:37'),
(0, '123456', 'Admin', '<p>ztxcyvuio</p>\r\n', '2022-06-21 10:02:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblriwayatnilai`
--

CREATE TABLE `tblriwayatnilai` (
  `idnilai` int(11) NOT NULL,
  `kodemk` varchar(20) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tipesoal` enum('e','p') NOT NULL,
  `tipetugas` enum('quiz','tugas','uts','kelompok') NOT NULL,
  `idsoal` varchar(50) NOT NULL,
  `nosoal` int(11) NOT NULL,
  `isisoal` longtext NOT NULL,
  `jawabesai` longtext DEFAULT NULL,
  `jawabpilgan` enum('a','b','c','d') DEFAULT NULL,
  `a` longtext DEFAULT NULL,
  `b` longtext DEFAULT NULL,
  `c` longtext DEFAULT NULL,
  `d` longtext DEFAULT NULL,
  `status` enum('proses','belum','selesai') NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `timer` varchar(10) NOT NULL,
  `kelompok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblriwayatsoal`
--

CREATE TABLE `tblriwayatsoal` (
  `idriwayatsoal` int(11) NOT NULL,
  `idsoalriw` int(11) NOT NULL,
  `tipesoal` enum('e','p') NOT NULL,
  `kodemk` varchar(20) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `namamhs` varchar(50) DEFAULT NULL,
  `tipetugas` enum('quiz','tugas','uts','kelompok') NOT NULL,
  `prodi` enum('TI','SI') NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `status` enum('selesai','belum','proses') NOT NULL,
  `tanggal` datetime NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `absensike` varchar(2) DEFAULT NULL,
  `kelompok` int(11) DEFAULT NULL,
  `timer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblsoalesai`
--

CREATE TABLE `tblsoalesai` (
  `idesai` int(11) NOT NULL,
  `idsoal` int(11) NOT NULL,
  `noesai` int(11) NOT NULL,
  `matakuliah` text NOT NULL,
  `isiesai` longtext NOT NULL,
  `jawaban` longtext DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `idlevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblsoalpilgan`
--

CREATE TABLE `tblsoalpilgan` (
  `idpilgan` int(11) NOT NULL,
  `idsoalpil` int(11) NOT NULL DEFAULT 0,
  `nopilgan` int(11) NOT NULL,
  `matakuliah` text NOT NULL,
  `isipilgan` longtext NOT NULL,
  `jawabanpilgan` varchar(10) NOT NULL,
  `a` longtext NOT NULL,
  `b` longtext NOT NULL,
  `c` longtext NOT NULL,
  `d` longtext NOT NULL,
  `tanggal` datetime NOT NULL,
  `idlevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_poin_mhs`
--

CREATE TABLE `tbl_poin_mhs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `poin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploaded_images`
--

CREATE TABLE `uploaded_images` (
  `id` int(11) NOT NULL,
  `file_dir` varchar(120) NOT NULL,
  `date_uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `tblbedge`
--
ALTER TABLE `tblbedge`
  ADD PRIMARY KEY (`idbedge`);

--
-- Indeks untuk tabel `tblgambar`
--
ALTER TABLE `tblgambar`
  ADD PRIMARY KEY (`idgambar`);

--
-- Indeks untuk tabel `tblkelas`
--
ALTER TABLE `tblkelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbllevel`
--
ALTER TABLE `tbllevel`
  ADD PRIMARY KEY (`idlevel`);

--
-- Indeks untuk tabel `tblmahasiswa`
--
ALTER TABLE `tblmahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tblmatakuliah`
--
ALTER TABLE `tblmatakuliah`
  ADD PRIMARY KEY (`kodemk`);

--
-- Indeks untuk tabel `tblmatakuliah_sec`
--
ALTER TABLE `tblmatakuliah_sec`
  ADD PRIMARY KEY (`kodemk`);

--
-- Indeks untuk tabel `tblmateri`
--
ALTER TABLE `tblmateri`
  ADD PRIMARY KEY (`idmateri`);

--
-- Indeks untuk tabel `tblriwayatnilai`
--
ALTER TABLE `tblriwayatnilai`
  ADD PRIMARY KEY (`idnilai`);

--
-- Indeks untuk tabel `tblriwayatsoal`
--
ALTER TABLE `tblriwayatsoal`
  ADD PRIMARY KEY (`idriwayatsoal`);

--
-- Indeks untuk tabel `tblsoalesai`
--
ALTER TABLE `tblsoalesai`
  ADD PRIMARY KEY (`idesai`);

--
-- Indeks untuk tabel `tblsoalpilgan`
--
ALTER TABLE `tblsoalpilgan`
  ADD PRIMARY KEY (`idpilgan`);

--
-- Indeks untuk tabel `tbl_poin_mhs`
--
ALTER TABLE `tbl_poin_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `uploaded_images`
--
ALTER TABLE `uploaded_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112097202;

--
-- AUTO_INCREMENT untuk tabel `tblbedge`
--
ALTER TABLE `tblbedge`
  MODIFY `idbedge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tblgambar`
--
ALTER TABLE `tblgambar`
  MODIFY `idgambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `tblkelas`
--
ALTER TABLE `tblkelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbllevel`
--
ALTER TABLE `tbllevel`
  MODIFY `idlevel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tblmatakuliah_sec`
--
ALTER TABLE `tblmatakuliah_sec`
  MODIFY `kodemk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tblmateri`
--
ALTER TABLE `tblmateri`
  MODIFY `idmateri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT untuk tabel `tblriwayatnilai`
--
ALTER TABLE `tblriwayatnilai`
  MODIFY `idnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT untuk tabel `tblriwayatsoal`
--
ALTER TABLE `tblriwayatsoal`
  MODIFY `idriwayatsoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=821;

--
-- AUTO_INCREMENT untuk tabel `tblsoalesai`
--
ALTER TABLE `tblsoalesai`
  MODIFY `idesai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tblsoalpilgan`
--
ALTER TABLE `tblsoalpilgan`
  MODIFY `idpilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT untuk tabel `tbl_poin_mhs`
--
ALTER TABLE `tbl_poin_mhs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `uploaded_images`
--
ALTER TABLE `uploaded_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
