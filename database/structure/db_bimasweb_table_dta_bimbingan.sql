
-- --------------------------------------------------------

--
-- Table structure for table `dta_bimbingan`
--

DROP TABLE IF EXISTS `dta_bimbingan`;
CREATE TABLE `dta_bimbingan` (
  `id` int NOT NULL,
  `slug_bimbingan` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_bimbingan` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_bimbingan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `detail_bimbingan` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `sumber_bimbingan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image_bimbingan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_bimbingan` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
