
-- --------------------------------------------------------

--
-- Table structure for table `dta_video`
--

DROP TABLE IF EXISTS `dta_video`;
CREATE TABLE `dta_video` (
  `id` int NOT NULL,
  `id_content` int NOT NULL,
  `nama_video` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `url_video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status_video` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
