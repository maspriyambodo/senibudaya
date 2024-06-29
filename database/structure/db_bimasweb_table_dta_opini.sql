
-- --------------------------------------------------------

--
-- Table structure for table `dta_opini`
--

DROP TABLE IF EXISTS `dta_opini`;
CREATE TABLE `dta_opini` (
  `id` int NOT NULL,
  `slug_opini` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_opini` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_opini` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `detail_opini` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `sumber_opini` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image_opini` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_opini` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
