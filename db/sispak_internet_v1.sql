-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2023 pada 17.47
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispak_internet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aturan`
--

CREATE TABLE `tb_aturan` (
  `id_rule` int(11) NOT NULL,
  `penyakit` int(11) NOT NULL,
  `gejala` int(11) NOT NULL,
  `probabilitas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_aturan`
--

INSERT INTO `tb_aturan` (`id_rule`, `penyakit`, `gejala`, `probabilitas`) VALUES
(1, 1, 1, 0.2),
(2, 1, 2, 1),
(4, 1, 3, 0.2),
(5, 1, 4, 0.3),
(6, 1, 5, 0.3),
(7, 1, 6, 1),
(8, 1, 7, 1),
(9, 2, 8, 0.3),
(11, 2, 9, 1),
(12, 2, 10, 0.3),
(13, 2, 11, 0.3),
(14, 2, 12, 1),
(15, 2, 13, 0.3),
(16, 2, 16, 1),
(17, 3, 20, 0.5),
(18, 3, 21, 0.3),
(19, 3, 22, 0.4),
(20, 3, 23, 0.5),
(21, 4, 24, 1),
(22, 4, 25, 0.4),
(23, 4, 28, 1),
(24, 1, 27, 0.4),
(25, 1, 26, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id_gejala` int(22) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL,
  `kode_gejala` varchar(80) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_gejala`, `nama_gejala`, `kode_gejala`, `nilai`) VALUES
(1, 'tetap memikirkan untuk online / internetan walapun sedang offline', 'G001', 0.5),
(2, 'perlu menghabiskan waktu untuk online yang semakin lama dan semakin banyak untuk mencapai rasa puas', 'G002', 0.4),
(3, 'waktu online internetan betambah  sekarang menjadi 6 jam di luar sekolah', 'G003', 0.2),
(4, 'bila ada masalah lebih memilih istirahat dari pada internetan', 'G004', 0.2),
(5, 'tetap senang walaupu tidak bisa online atau internetan', 'G005', 0.2),
(6, 'merasah mudah menghentikan aktifitas online atau internetan yang lama', 'G006', 1),
(7, 'hidup menyenangkan walaupun tanpa andaya internetan', 'G007', 1),
(8, 'merasa cemas pada saat offline , dan perasaan itu hilang ketika sudah kembali online', 'G008', 0.3),
(9, 'merasa pusing bila tidak bisa internetan / online', 'G009', 1),
(10, 'saya akan berhenti internet sebelum mengerjakan tugas', 'G010', 0.3),
(11, 'lebih memilih menghabiskan waktu untuk internetan  / online sendiri dari pada pergi dengan orang lain', 'G011', 0.1),
(12, 'tidak bisa tidur karena saya tidak bisa internetan', 'G012', 0.3),
(13, 'saya yakin akan mampu berhenti dari akriviatas internetan yang lama', 'G013', 0.5),
(16, 'sebagian besar waktu saya dihabiskan untuk internetan', 'G014', 0.4),
(20, 'saya akan marah - marah bila saya tidak  diberi ijin untuk internetan', 'G015', 0.5),
(21, 'Walau saya sudah bertekad tidak akan internetan dalam waktu yang lama, tapi hasrat untuk internetan membuat saya kembali internetan dalam waktu yang lama', 'G016', 0.4),
(22, 'Khawatir bila hidup saya tanpa internet akan menjadi hampa dan membosankan', 'G017', 0.4),
(23, 'Tetap senang walau waktu internetan saya berkurang', 'G018', 0.3),
(24, 'Sering terlambat mengerjakan tugas karena keasyikan internetan / online', 'G019', 1),
(25, 'Tetap internetan walau mata saya sudah lelah', 'G020', 1),
(26, 'Badan terasa lebih segar bila tidak internetan', 'G021', 1),
(27, 'Tidur lebih nyenyak jika sebelumnya tidak internetan', 'G022', 1),
(28, 'Aktivitas online atau internetan mengganggu kehidupan sosial saya', 'G023', 0.4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil_diagnosa`
--

CREATE TABLE `tb_hasil_diagnosa` (
  `id_hasil` int(11) NOT NULL,
  `hasil_probabilitas` float NOT NULL,
  `penyakit` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_hasil_diagnosa`
--

INSERT INTO `tb_hasil_diagnosa` (`id_hasil`, `hasil_probabilitas`, `penyakit`, `user`, `tanggal`, `waktu`, `solusi`) VALUES
(11, 15, 'Kecanduan Ringan', 'Riza Maulana', '2023-05-21', '08:05:20', 'Kamu dapat melakukan kegiatan lain seperti berolahraga, menyanyi, memasak, menari, bermain musik, mengikuti kegiatan organisasi di tempat ibadah atau di lingkungan rumah, dan lainnya.'),
(36, 50, 'Kecanduan Ringan', 'Ummu Salama', '2023-06-07', '08:04:06', 'Kamu dapat melakukan kegiatan lain seperti berolahraga, menyanyi, memasak, menari, bermain musik, mengikuti kegiatan organisasi di tempat ibadah atau di lingkungan rumah, dan lainnya.'),
(37, 41, 'Kecanduan Berat', 'Ummu Salama', '2023-06-08', '05:45:59', 'Kurangi penggunaan internet anda dan segera pergi cek kesehatan di pakar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tipe_kecanduan`
--

CREATE TABLE `tb_tipe_kecanduan` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(55) NOT NULL,
  `kode_penyakit` char(22) NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_tipe_kecanduan`
--

INSERT INTO `tb_tipe_kecanduan` (`id_penyakit`, `nama_penyakit`, `kode_penyakit`, `keterangan`, `solusi`) VALUES
(1, 'Tidak Kecanduan', 'P001', '-', 'Gunakan Internet seperlu nyaa'),
(2, 'Kecanduan Ringan', 'P002', '-', 'Kamu dapat melakukan kegiatan lain seperti berolahraga, menyanyi, memasak, menari, bermain musik, mengikuti kegiatan organisasi di tempat ibadah atau di lingkungan rumah, dan lainnya.'),
(3, 'Kecanduan Sedang', 'P003', '-', 'Bicarakan kondisimu pada orang tua, guru, atau seorang profesional (misal psikiater dan psikolog) yang dapat membantu kamu mengatasi kecanduan internet.'),
(4, 'Kecanduan Berat', 'P004', '-', 'Kurangi penggunaan internet anda dan segera pergi cek kesehatan di pakar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1. ''Pakar'' , 2. ''Pasien''',
  `alamat` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `name`, `level`, `alamat`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Angie Nathania D. ,M.Psi.', 1, 'Palimanan'),
(2, 'user', '12dea96fec20593566ab75692c9949596833adc9', 'Ummu Salama', 2, 'Mirok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temporary`
--

CREATE TABLE `temporary` (
  `id_gejala` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `temporary`
--

INSERT INTO `temporary` (`id_gejala`, `user_id`) VALUES
(1, 2),
(8, 2),
(16, 2),
(20, 2),
(21, 2),
(25, 2),
(28, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `temporary_final`
--

CREATE TABLE `temporary_final` (
  `id` int(11) NOT NULL,
  `gejala` int(11) NOT NULL,
  `penyakit` int(11) NOT NULL,
  `probabilitas` float NOT NULL,
  `hasil_probabilitas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `temporary_final`
--

INSERT INTO `temporary_final` (`id`, `gejala`, `penyakit`, `probabilitas`, `hasil_probabilitas`) VALUES
(1, 1, 1, 0.2, 0.20512820512821),
(2, 8, 2, 0.3, 0.30769230769231),
(3, 16, 2, 1, 0.30769230769231),
(4, 20, 3, 0.5, 0.076923076923077),
(5, 21, 3, 0.3, 0.076923076923077),
(6, 25, 4, 0.4, 0.41025641025641),
(7, 28, 4, 1, 0.41025641025641);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_aturan`
--
ALTER TABLE `tb_aturan`
  ADD PRIMARY KEY (`id_rule`),
  ADD KEY `name_gejala` (`gejala`),
  ADD KEY `name_penyakit` (`penyakit`);

--
-- Indeks untuk tabel `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `tb_hasil_diagnosa`
--
ALTER TABLE `tb_hasil_diagnosa`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `tb_tipe_kecanduan`
--
ALTER TABLE `tb_tipe_kecanduan`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `temporary`
--
ALTER TABLE `temporary`
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `temporary_final`
--
ALTER TABLE `temporary_final`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyakit` (`penyakit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_aturan`
--
ALTER TABLE `tb_aturan`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id_gejala` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_hasil_diagnosa`
--
ALTER TABLE `tb_hasil_diagnosa`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_tipe_kecanduan`
--
ALTER TABLE `tb_tipe_kecanduan`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `temporary_final`
--
ALTER TABLE `temporary_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_aturan`
--
ALTER TABLE `tb_aturan`
  ADD CONSTRAINT `tb_aturan_ibfk_1` FOREIGN KEY (`gejala`) REFERENCES `tb_gejala` (`id_gejala`),
  ADD CONSTRAINT `tb_aturan_ibfk_2` FOREIGN KEY (`penyakit`) REFERENCES `tb_tipe_kecanduan` (`id_penyakit`);

--
-- Ketidakleluasaan untuk tabel `temporary`
--
ALTER TABLE `temporary`
  ADD CONSTRAINT `temporary_ibfk_1` FOREIGN KEY (`id_gejala`) REFERENCES `tb_gejala` (`id_gejala`);

--
-- Ketidakleluasaan untuk tabel `temporary_final`
--
ALTER TABLE `temporary_final`
  ADD CONSTRAINT `temporary_final_ibfk_1` FOREIGN KEY (`penyakit`) REFERENCES `tb_tipe_kecanduan` (`id_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
