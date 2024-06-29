
-- --------------------------------------------------------

--
-- Table structure for table `app_group`
--

DROP TABLE IF EXISTS `app_group`;
CREATE TABLE `app_group` (
  `id` int NOT NULL,
  `nama_group` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_group` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_group` char(1) CHARACTER SET latin1 NOT NULL DEFAULT 't',
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='~ data user group';
