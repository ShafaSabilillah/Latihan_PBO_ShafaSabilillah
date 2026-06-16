-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2026 at 05:59 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti1c_shafasabilillah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(150) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('reguler','imax','velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(50) DEFAULT NULL,
  `layanan_butler` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'Gundala 2', '2026-07-01 13:00:00', 2, '45000.00', 'reguler', 'Dolby Atmos 7.1', 'Row E', NULL, NULL, NULL, NULL),
(2, 'KKN di Desa Penari 3', '2026-07-01 15:30:00', 1, '45000.00', 'reguler', 'Dolby Atmos 7.1', 'Row G', NULL, NULL, NULL, NULL),
(3, 'Avatar 4', '2026-07-02 12:00:00', 4, '50000.00', 'reguler', 'Standard Stereo', 'Row C', NULL, NULL, NULL, NULL),
(4, 'The Batman: Part II', '2026-07-02 19:00:00', 2, '55000.00', 'reguler', 'Dolby Atmos 7.1', 'Row F', NULL, NULL, NULL, NULL),
(5, 'Spiderman: Beyond', '2026-07-03 14:15:00', 3, '45000.00', 'reguler', 'Standard Stereo', 'Row D', NULL, NULL, NULL, NULL),
(6, 'Detektif Conan The Movie', '2026-07-03 16:45:00', 2, '45000.00', 'reguler', 'Standard Stereo', 'Row H', NULL, NULL, NULL, NULL),
(7, 'Dilan 1995', '2026-07-04 11:00:00', 1, '40000.00', 'reguler', 'Standard Stereo', 'Row J', NULL, NULL, NULL, NULL),
(8, 'Avengers: Secret Wars', '2026-07-01 14:00:00', 2, '95000.00', 'imax', 'IMAX 12-Channel', 'Row A', 'SG-3D-091', '4D-Vibration', NULL, NULL),
(9, 'Interstellar 2', '2026-07-01 20:00:00', 2, '95000.00', 'imax', 'IMAX 12-Channel', 'Row B', 'SG-3D-092', 'None', NULL, NULL),
(10, 'Dune: Part III', '2026-07-02 13:30:00', 1, '100000.00', 'imax', 'IMAX 12-Channel', 'Row A', 'SG-3D-110', '4D-Vibration & Wind', NULL, NULL),
(11, 'Star Wars: New Order', '2026-07-02 17:00:00', 3, '100000.00', 'imax', 'IMAX 12-Channel', 'Row C', 'SG-3D-115', '4D-Vibration', NULL, NULL),
(12, 'Jurassic World: Dominion 2', '2026-07-03 15:00:00', 2, '95000.00', 'imax', 'IMAX 6-Channel', 'Row B', 'SG-3D-044', '4D-Vibration', NULL, NULL),
(13, 'Inception Remastered', '2026-07-03 21:15:00', 1, '95000.00', 'imax', 'IMAX 12-Channel', 'Row D', 'SG-3D-012', 'None', NULL, NULL),
(14, 'Godzilla vs Kong 3', '2026-07-04 13:00:00', 4, '110000.00', 'imax', 'IMAX 12-Channel', 'Row A', 'SG-3D-201', 'Full Motion & Water', NULL, NULL),
(15, 'The Matrix 5', '2026-07-01 16:00:00', 2, '150000.00', 'velvet', 'Dolby Atmos 7.1', 'Suite 1', NULL, NULL, 'Premium Pack A', 'Personal Butler Service'),
(16, 'Sherlock Holmes 3', '2026-07-01 21:00:00', 2, '150000.00', 'velvet', 'Dolby Atmos 7.1', 'Suite 3', NULL, NULL, 'Premium Pack A', 'Call Button Only'),
(17, 'Titanic: Anniversary Ed.', '2026-07-02 14:00:00', 2, '160000.00', 'velvet', 'Standard Luxury', 'Suite 2', NULL, NULL, 'Premium Pack B', 'Personal Butler Service'),
(18, 'Wicked: Part Two', '2026-07-02 19:30:00', 2, '160000.00', 'velvet', 'Dolby Atmos 7.1', 'Suite 5', NULL, NULL, 'Premium Pack A', 'Personal Butler Service'),
(19, 'Frozen 3', '2026-07-03 13:00:00', 2, '150000.00', 'velvet', 'Standard Luxury', 'Suite 4', NULL, NULL, 'Standard Pack', 'Call Button Only'),
(20, 'Fast & Furious 12', '2026-07-03 18:00:00', 2, '175000.00', 'velvet', 'Dolby Atmos 7.1', 'Suite 1', NULL, NULL, 'Premium Pack B', 'VIP Butler Lounge'),
(21, 'A Quiet Place: Day One', '2026-07-04 22:00:00', 2, '175000.00', 'velvet', 'Dolby Atmos 7.1', 'Suite 2', NULL, NULL, 'Premium Pack B', 'Personal Butler Service');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
