
-- --------------------------------------------------------

--
-- Table structure for table `app_parameter`
--

DROP TABLE IF EXISTS `app_parameter`;
CREATE TABLE `app_parameter` (
  `id` int NOT NULL,
  `nama_parameter` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nilai_parameter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status_parameter` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 't',
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='~ data parameter aplikasi';
