
-- --------------------------------------------------------

--
-- Table structure for table `dta_banner`
--

DROP TABLE IF EXISTS `dta_banner`;
CREATE TABLE `dta_banner` (
  `id` int NOT NULL,
  `nama_banner` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image_banner` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_banner` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
