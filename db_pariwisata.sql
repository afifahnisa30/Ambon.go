-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2025 at 07:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nama`, `biaya`) VALUES
(1, 'Motor', 50000),
(2, 'Mobil', 150000),
(3, 'Angkutan Umum', 75000);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan_wisata`
--

CREATE TABLE `kendaraan_wisata` (
  `id` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraan_wisata`
--

INSERT INTO `kendaraan_wisata` (`id`, `id_wisata`, `id_kendaraan`, `biaya`) VALUES
(1, 1, 1, 100000),
(2, 1, 2, 200000),
(3, 1, 3, 50000),
(4, 2, 1, 50000),
(5, 2, 2, 100000),
(6, 2, 3, 30000),
(7, 3, 1, 100000),
(8, 3, 2, 160000),
(9, 3, 3, 40000),
(10, 4, 1, 50000),
(11, 4, 2, 100000),
(12, 4, 3, 30000),
(13, 5, 1, 100000),
(14, 5, 2, 170000),
(15, 5, 3, 50000),
(16, 6, 1, 70000),
(17, 6, 2, 120000),
(18, 6, 3, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `penginapan`
--

CREATE TABLE `penginapan` (
  `id` int(11) NOT NULL,
  `wisata_id` int(11) NOT NULL,
  `nama_penginapan` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `fasilitas` text DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penginapan`
--

INSERT INTO `penginapan` (`id`, `wisata_id`, `nama_penginapan`, `alamat`, `harga`, `fasilitas`, `kontak`, `gambar`) VALUES
(1, 1, 'Penginapan Liang Beach Resort', 'Jl. Pantai Liang, Salahutu, Maluku Tengah', 350000.00, 'Kamar AC, Wifi, Restoran', '081234567890', 'liang_hotel.jpg'),
(2, 2, 'Natsepa Hotel & Cottage', 'Jl. Raya Natsepa, Suli, Maluku Tengah', 500000.00, 'Kolam Renang, Restoran, Wifi', '082345678901', 'natsepa_hotel.jpg'),
(3, 3, 'Morela Guest House', 'Desa Morela, Maluku Tengah', 200000.00, 'Kamar kipas, Parkir, Sarapan', '083456789012', 'morella.jpg'),
(4, 4, 'Losmen Pintu Kota', 'Jl. Pintu Kota, Desa Airlouw, Ambon', 250000.00, 'Kamar sederhana, Parkir, Warung', '084567890123', 'losmen.jpg'),
(5, 5, 'Hotel Hila Heritage', 'Desa Hila, Leihitu, Maluku Tengah', 400000.00, 'AC, Wifi, Dekat Benteng Amsterdam', '085678901234', 'hila_heritage.jpg'),
(6, 6, 'Tulehu Hot Spring Inn', 'Jl. Pemandian Tulehu, Maluku Tengah', 300000.00, 'Kamar AC, Restoran, Kolam air panas', '086789012345', 'tulehu_inn.jpg'),
(7, 7, 'Ambon City Hotel', 'Jl. Dr. Malaiholo, Ambon', 450000.00, 'AC, Wifi, Restoran, Dekat Museum', '087890123456', 'city_hotel.jpg'),
(8, 8, 'Huluwa Beach Homestay', 'Desa Wakasihu, Leihitu Barat', 220000.00, 'Homestay, Sarapan, Pemandangan laut', '088901234567', 'huluwa_homestay.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `rute` text DEFAULT NULL,
  `waktu` varchar(100) DEFAULT NULL,
  `biaya` varchar(100) DEFAULT NULL,
  `transportasi` varchar(100) DEFAULT NULL,
  `fasilitas` text DEFAULT NULL,
  `estimasi_biaya_perjalanan` varchar(100) DEFAULT NULL,
  `makanan` text DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id`, `nama`, `deskripsi`, `gambar`, `rute`, `waktu`, `biaya`, `transportasi`, `fasilitas`, `estimasi_biaya_perjalanan`, `makanan`, `kota`) VALUES
(1, 'Pantai Liang', 'Pantai berpasir putih yang terkenal di Ambon dengan air laut jernih dan suasana tenang.', 'liang.jpg', 'Ambon → Tulehu → Pantai Liang', '45 menit dari pusat kota', 'Rp20.000', 'Mobil, Motor, Angkutan Umum', 'Kamar mandi, Tempat duduk, Gazebo, Parkir luas', 'Rp50.000 - Rp200.000', 'Tersedia warung lokal', 'Ambon'),
(2, 'Pantai Natsepa', 'Pantai berpasir putih yang terkenal di Ambon dengan air laut jernih dan suasana tenang.', 'natsepa.jpg', 'Ambon → Suli', '30 menit dari pusat kota', 'Rp20.000', 'Mobil, Motor, Angkutan Umum', NULL, NULL, NULL, NULL),
(3, 'Lubang Buaya Morella', 'Tempat berenang alami di tengah alam terbuka dengan air yang sangat jernih dan menyegarkan.', 'lb.jpg', 'Ambon → Morella → Lubang Buaya', '45 menit dari pusat kota', 'Gratis', 'Mobil, Motor', NULL, NULL, NULL, NULL),
(4, 'Pintu Kota Ambon', 'Formasi batu alami menyerupai pintu yang langsung menghadap laut lepas, cocok untuk foto.', 'pintu_kota.jpg', 'Ambon → Airlouw → Pintu Kota', '20 menit dari pusat kota', 'Gratis', 'Mobil, Motor', NULL, NULL, NULL, NULL),
(5, 'Benteng Amsterdam', 'Benteng peninggalan Belanda yang berada di Hila, penuh dengan nilai sejarah dan arsitektur khas.', 'benteng.jpg', 'Ambon → Hila → Benteng Amsterdam', '1 jam dari pusat kota', 'Gratis', 'Mobil, Motor', NULL, NULL, NULL, NULL),
(6, 'Pemandian Air Panas', 'Wisata alam dengan sumber air panas alami yang sering dikunjungi wisatawan untuk relaksasi.', 'air_panas.jpg', 'Ambon - suli - tulehu', '40menit', ' 10.000', '', 'Kamar mandi, warung makan, tempat duduk, parkiran luas', '', '', ''),
(7, 'Museum Siwalima', 'Museum yang menyimpan berbagai koleksi sejarah, budaya, dan warisan masyarakat Maluku.', 'siwalima.jpg', 'Jl. Dr. Siwabessy, Taman Makmur, Ambon', '08:00 - 16:00 WIT', 'Rp20.000', 'Angkutan umum, ojek, kendaraan pribadi', 'Area parkir, toilet, ruang pameran, pemandu wisata', 'Rp50.000 - Rp100.000', 'Kuliner khas Ambon di sekitar lokasi', 'Ambon'),
(8, 'Pantai Huluwa', 'Pantai unik di Desa Wakasihu yang terkenal dengan hamparan batu karang hitam dan air laut yang jernih. Cocok untuk bersantai, memancing, atau menikmati pemandangan sunset.', 'huluwa.jpg', 'Desa Wakasihu, Kecamatan Leihitu Barat, Pulau Ambon', '09:00 - 18:00 WIT', 'Gratis (hanya biaya parkir)', 'Kendaraan pribadi, ojek, angkutan desa', 'Gazebo sederhana, area parkir, tempat duduk', 'Rp50.000 - Rp100.000', 'Ikan bakar dan makanan laut segar khas Ambon', 'Ambon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan_wisata`
--
ALTER TABLE `kendaraan_wisata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_wisata` (`id_wisata`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indexes for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wisata_id` (`wisata_id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kendaraan_wisata`
--
ALTER TABLE `kendaraan_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `penginapan`
--
ALTER TABLE `penginapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kendaraan_wisata`
--
ALTER TABLE `kendaraan_wisata`
  ADD CONSTRAINT `kendaraan_wisata_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kendaraan_wisata_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD CONSTRAINT `penginapan_ibfk_1` FOREIGN KEY (`wisata_id`) REFERENCES `wisata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
