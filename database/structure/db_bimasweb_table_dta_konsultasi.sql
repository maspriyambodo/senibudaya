
-- --------------------------------------------------------

--
-- Table structure for table `dta_konsultasi`
--

DROP TABLE IF EXISTS `dta_konsultasi`;
CREATE TABLE `dta_konsultasi` (
  `id` int NOT NULL,
  `id_jenis` int NOT NULL,
  `nama_konsultasi` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_konsultasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kota_konsultasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kelamin_konsultasi` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usia_konsultasi` int NOT NULL,
  `judul_konsultasi` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `detail_konsultasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawab_konsultasi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status_konsultasi` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
