
-- --------------------------------------------------------

--
-- Table structure for table `dta_link`
--

DROP TABLE IF EXISTS `dta_link`;
CREATE TABLE `dta_link` (
  `id` int NOT NULL,
  `id_content` int NOT NULL,
  `nama_link` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `url_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_link` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_link` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
