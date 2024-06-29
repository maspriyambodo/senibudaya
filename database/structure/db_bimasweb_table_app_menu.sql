
-- --------------------------------------------------------

--
-- Table structure for table `app_menu`
--

DROP TABLE IF EXISTS `app_menu`;
CREATE TABLE `app_menu` (
  `id` int NOT NULL,
  `induk_menu` int NOT NULL,
  `nama_menu` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_menu` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `folder_menu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `target_menu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `icon_menu` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `akses_menu` int NOT NULL DEFAULT '1000',
  `urutan_menu` int NOT NULL DEFAULT '1',
  `status_menu` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 't',
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='~ data menu aplikasi';
