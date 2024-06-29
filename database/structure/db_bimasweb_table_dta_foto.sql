
-- --------------------------------------------------------

--
-- Table structure for table `dta_foto`
--

DROP TABLE IF EXISTS `dta_foto`;
CREATE TABLE `dta_foto` (
  `id` int NOT NULL,
  `id_content` int NOT NULL,
  `nama_foto` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image_foto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_foto` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
