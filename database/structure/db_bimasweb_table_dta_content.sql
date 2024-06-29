
-- --------------------------------------------------------

--
-- Table structure for table `dta_content`
--

DROP TABLE IF EXISTS `dta_content`;
CREATE TABLE `dta_content` (
  `id` int NOT NULL,
  `id_kategori` int NOT NULL,
  `induk_content` int NOT NULL,
  `nama_content` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `label_content` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `detail_content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `redirect_content` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link_content` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hide_content` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `urutan_content` int NOT NULL,
  `level_content` int NOT NULL,
  `icon_content` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_content` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_content` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
