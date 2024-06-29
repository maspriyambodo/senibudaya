
-- --------------------------------------------------------

--
-- Table structure for table `dta_dokumen`
--

DROP TABLE IF EXISTS `dta_dokumen`;
CREATE TABLE `dta_dokumen` (
  `id` int NOT NULL,
  `id_content` int NOT NULL,
  `nama_dokumen` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_dokumen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `file_dokumen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_dokumen` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
