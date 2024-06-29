
-- --------------------------------------------------------

--
-- Table structure for table `dta_pengaduan`
--

DROP TABLE IF EXISTS `dta_pengaduan`;
CREATE TABLE `dta_pengaduan` (
  `id` int NOT NULL,
  `nama_pengaduan` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik_pengaduan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telepon_pengaduan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_pengaduan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_pengaduan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `detail_pengaduan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
