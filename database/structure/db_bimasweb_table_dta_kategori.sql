
-- --------------------------------------------------------

--
-- Table structure for table `dta_kategori`
--

DROP TABLE IF EXISTS `dta_kategori`;
CREATE TABLE `dta_kategori` (
  `id` int NOT NULL,
  `nama_kategori` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_kategori` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status_kategori` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
