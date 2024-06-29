
-- --------------------------------------------------------

--
-- Table structure for table `dta_direktorat`
--

DROP TABLE IF EXISTS `dta_direktorat`;
CREATE TABLE `dta_direktorat` (
  `id` int NOT NULL,
  `parent_id` int DEFAULT '0',
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_kategori` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
