
-- --------------------------------------------------------

--
-- Table structure for table `dta_berita`
--

DROP TABLE IF EXISTS `dta_berita`;
CREATE TABLE `dta_berita` (
  `id` int NOT NULL,
  `id_lama` int DEFAULT NULL,
  `slug_berita` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_berita` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_berita` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `detail_berita` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `sumber_berita` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `editor_berita` int DEFAULT NULL,
  `fg_berita` int DEFAULT NULL COMMENT 'fotografer berita',
  `image_berita` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_berita` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 't',
  `hits` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
