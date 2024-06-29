
-- --------------------------------------------------------

--
-- Table structure for table `dta_tokoh`
--

DROP TABLE IF EXISTS `dta_tokoh`;
CREATE TABLE `dta_tokoh` (
  `id` int NOT NULL,
  `slug_tokoh` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_tokoh` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_tokoh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `detail_tokoh` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image_tokoh` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_tokoh` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
