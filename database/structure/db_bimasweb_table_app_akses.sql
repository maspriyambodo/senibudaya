
-- --------------------------------------------------------

--
-- Table structure for table `app_akses`
--

DROP TABLE IF EXISTS `app_akses`;
CREATE TABLE `app_akses` (
  `id` int NOT NULL,
  `id_group` int NOT NULL,
  `id_menu` int NOT NULL,
  `nama_akses` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_akses` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'f',
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='~ hak akses group per menu';
