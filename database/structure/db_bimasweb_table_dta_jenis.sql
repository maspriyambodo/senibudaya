
-- --------------------------------------------------------

--
-- Table structure for table `dta_jenis`
--

DROP TABLE IF EXISTS `dta_jenis`;
CREATE TABLE `dta_jenis` (
  `id` int NOT NULL,
  `nama_jenis` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_jenis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `urutan_jenis` int NOT NULL,
  `status_jenis` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
