-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2023 pada 14.32
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_aturan`
--

INSERT INTO `tb_aturan` (`id_rule`, `penyakit`, `gejala`, `probabilitas`) VALUES
(1, 1, 1, 0.00001),
(2, 1, 2, 1),
(4, 1, 3, 0.98),
(5, 1, 4, 0.78),
(6, 1, 5, 0.86),
(7, 1, 6, 1),
(8, 1, 7, 1),
(9, 2, 8, 0.92),
(11, 2, 9, 1),
(12, 2, 10, 0.23),
(13, 2, 11, 0.63),
(14, 2, 12, 1),
(15, 2, 13, 0.57),
(16, 2, 16, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id_gejala` int(22) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `kode_gejala` varchar(80) NOT NULL,
  `penyakit` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_gejala`, `nama_gejala`, `kode_gejala`, `penyakit`, `nilai`) VALUES
(1, 'tetap memikirkan untuk online / internetan walapun sedang offline', 'G001', 1, 0.9),
(2, 'perlu menghabiskan waktu untuk online yang semakin lama dan semakin banyak untuk mencapai rasa puas', 'G002', 1, 0.86),
(3, 'waktu online internetan betambah  sekarang menjadi 6 jam di luar sekolah', 'G003', 1, 0.92),
(4, 'bila ada masalah lebih memilih istirahat dari pada internetan', 'G004', 1, 0.86),
(5, 'tetap senang walaupu tidak bisa online atau internetan', 'G005', 1, 0.82),
(6, 'merasah mudah menghentikan aktifitas online atau internetan yang lama', 'G006', 1, 1),
(7, 'hidup menyenangkan walaupun tanpa andaya internetan', 'G007', 1, 1),
(8, 'merasa cemas pada saat offline , dan perasaan itu hilang ketika sudah kembali online', 'G008', 2, 1),
(9, 'merasa pusing bila tidak bisa internetan / online', 'G009', 2, 1),
(10, 'saya akan berhenti internet sebelum mengerjakan tugas', 'G010', 2, 0.87),
(11, 'lebih memilih menghabiskan waktu untuk internetan  / online sendiri dari pada pergi dengan orang lai', 'G011', 2, 0.89),
(12, 'tidak bisa tidur karena saya tidak bisa internetan', 'G012', 2, 0.98),
(13, 'saya yakin akan mampu berhenti dari akriviatas internetan yang lama', 'G013', 2, 0.83),
(16, 'sebagian besar waktu saya dihabiskan untuk internetan', 'G014', 2, 0.82);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hasil_diagnosa`
--

INSERT INTO `tb_hasil_diagnosa` (`id_hasil`, `hasil_probabilitas`, `penyakit`, `user`, `tanggal`, `waktu`, `solusi`) VALUES
(10, 22, 'Kecanduan Ringan', 'Ummu Salama', '2023-05-21', '07:55:40', 'Kamu dapat melakukan kegiatan lain seperti berolahraga, menyanyi, memasak, menari, bermain musik, mengikuti kegiatan organisasi di tempat ibadah atau di lingkungan rumah, dan lainnya.'),
(11, 15, 'Kecanduan Ringan', 'Riza Maulana', '2023-05-21', '08:05:20', 'Kamu dapat melakukan kegiatan lain seperti berolahraga, menyanyi, memasak, menari, bermain musik, mengikuti kegiatan organisasi di tempat ibadah atau di lingkungan rumah, dan lainnya.'),
(14, 17, 'Tidak Kecanduan', 'ummu salama', '2023-05-22', '08:17:04', 'Gunakan Internet seperlu nyaa'),
(15, 6, 'Kecanduan Ringan', 'Ummu Salama', '2023-05-22', '07:42:49', 'Kamu dapat melakukan kegiatan lain seperti berolahraga, menyanyi, memasak, menari, bermain musik, mengikuti kegiatan organisasi di tempat ibadah atau di lingkungan rumah, dan lainnya.'),
(16, 99, 'Kecanduan Ringan', 'Ummu Salama', '2023-05-22', '07:45:38', 'Kamu dapat melakukan kegiatan lain seperti berolahraga, menyanyi, memasak, menari, bermain musik, mengikuti kegiatan organisasi di tempat ibadah atau di lingkungan rumah, dan lainnya.'),
(17, 99, 'Kecanduan Ringan', 'Ummu Salama', '2023-05-22', '07:48:11', 'Kamu dapat melakukan kegiatan lain seperti berolahraga, menyanyi, memasak, menari, bermain musik, mengikuti kegiatan organisasi di tempat ibadah atau di lingkungan rumah, dan lainnya.'),
(18, 99, 'Kecanduan Ringan', 'Ummu Salama', '2023-05-22', '07:48:33', 'Kamu dapat melakukan kegiatan lain seperti berolahraga, menyanyi, memasak, menari, bermain musik, mengikuti kegiatan organisasi di tempat ibadah atau di lingkungan rumah, dan lainnya.'),
(19, 0, 'Tidak Kecanduan', 'Ummu Salama', '2023-05-22', '07:49:02', 'Gunakan Internet seperlu nyaa'),
(20, 99, 'Kecanduan Ringan', 'Ummu Salama', '2023-05-22', '07:49:33', 'Kamu dapat melakukan kegiatan lain seperti berolahraga, menyanyi, memasak, menari, bermain musik, mengikuti kegiatan organisasi di tempat ibadah atau di lingkungan rumah, dan lainnya.'),
(21, 57, 'Tidak Kecanduan', 'Ummu Salama', '2023-05-22', '07:49:51', 'Gunakan Internet seperlu nyaa'),
(22, 99, 'Kecanduan Ringan', 'Ummu Salama', '2023-06-02', '02:12:49', 'Kamu dapat melakukan kegiatan lain seperti berolahraga, menyanyi, memasak, menari, bermain musik, mengikuti kegiatan organisasi di tempat ibadah atau di lingkungan rumah, dan lainnya.');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `name`, `level`, `alamat`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Fansyah Dwi Krisnady', 1, 'Palimanan'),
(2, 'user', '12dea96fec20593566ab75692c9949596833adc9', 'Ummu Salama', 2, 'Mirok'),
(7, 'rizamaulana@gmail.com', 'd7316a3074d562269cf4302e4eed46369b523687', 'Riza Maulana', 2, 'Rajagalu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temporary`
--

CREATE TABLE `temporary` (
  `id_gejala` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `temporary`
--

INSERT INTO `temporary` (`id_gejala`, `user_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(6, 2),
(7, 2),
(12, 2),
(13, 2),
(16, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `temporary_final`
--

INSERT INTO `temporary_final` (`id`, `gejala`, `penyakit`, `probabilitas`, `hasil_probabilitas`) VALUES
(1, 1, 1, 0.00001, 0.000017192686862577),
(2, 2, 1, 1, 0.000017192686862577),
(3, 3, 1, 0.98, 0.000017192686862577),
(4, 6, 1, 1, 0.000017192686862577),
(5, 7, 1, 1, 0.000017192686862577),
(6, 12, 2, 1, 0.99998280731314),
(7, 13, 2, 0.57, 0.99998280731314),
(8, 16, 2, 1, 0.99998280731314);

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
  ADD PRIMARY KEY (`id_gejala`),
  ADD KEY `penyakit` (`penyakit`);

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
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id_gejala` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_hasil_diagnosa`
--
ALTER TABLE `tb_hasil_diagnosa`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
