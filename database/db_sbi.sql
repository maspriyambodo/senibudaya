/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : db_sbi

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 04/09/2024 20:14:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for app_akses
-- ----------------------------
DROP TABLE IF EXISTS `app_akses`;
CREATE TABLE `app_akses`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_group` int NOT NULL,
  `id_menu` int NOT NULL,
  `nama_akses` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_akses` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'f',
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 117 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '~ hak akses group per menu' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of app_akses
-- ----------------------------
INSERT INTO `app_akses` VALUES (1, 2, 1, 'view', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (2, 2, 1, 'input', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (3, 2, 1, 'edit', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (4, 2, 1, 'delete', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (5, 2, 2, 'view', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (6, 2, 2, 'input', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (7, 2, 2, 'edit', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (8, 2, 2, 'delete', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (9, 2, 3, 'view', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (10, 2, 3, 'input', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (11, 2, 3, 'edit', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (12, 2, 3, 'delete', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (13, 2, 4, 'view', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (14, 2, 4, 'input', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (15, 2, 4, 'edit', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (16, 2, 4, 'delete', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (17, 2, 6, 'view', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (18, 2, 6, 'input', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (19, 2, 6, 'edit', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (20, 2, 6, 'delete', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (29, 2, 19, 'view', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (30, 2, 19, 'input', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (31, 2, 19, 'edit', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (32, 2, 19, 'delete', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (33, 2, 20, 'view', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (34, 2, 20, 'input', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (35, 2, 20, 'edit', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (36, 2, 20, 'delete', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (37, 2, 22, 'view', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (38, 2, 22, 'input', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (39, 2, 22, 'edit', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (40, 2, 22, 'delete', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (41, 2, 23, 'view', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (42, 2, 23, 'input', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (43, 2, 23, 'edit', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (44, 2, 23, 'delete', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (45, 2, 24, 'view', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (46, 2, 24, 'input', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (47, 2, 24, 'edit', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (48, 2, 24, 'delete', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (49, 2, 25, 'view', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (50, 2, 25, 'input', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (51, 2, 25, 'edit', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (52, 2, 25, 'delete', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (57, 5, 1, 'view', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (58, 5, 1, 'input', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (59, 5, 1, 'edit', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (60, 5, 1, 'delete', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (61, 5, 4, 'view', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (62, 5, 4, 'input', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (63, 5, 4, 'edit', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (64, 5, 4, 'delete', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (65, 5, 19, 'view', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (66, 5, 19, 'input', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (67, 5, 19, 'edit', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (68, 5, 19, 'delete', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (69, 5, 22, 'view', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (70, 5, 22, 'input', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (71, 5, 22, 'edit', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (72, 5, 22, 'delete', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (73, 5, 2, 'view', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (74, 5, 2, 'input', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (75, 5, 2, 'edit', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (76, 5, 2, 'delete', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (77, 5, 3, 'view', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (78, 5, 3, 'input', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (79, 5, 3, 'edit', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (80, 5, 3, 'delete', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (81, 5, 25, 'view', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (82, 5, 25, 'input', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (83, 5, 25, 'edit', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (84, 5, 25, 'delete', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (85, 5, 6, 'view', 't', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (86, 5, 6, 'input', 't', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (87, 5, 6, 'edit', 't', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (88, 5, 6, 'delete', 't', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (101, 5, 20, 'view', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (102, 5, 20, 'input', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (103, 5, 20, 'edit', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (104, 5, 20, 'delete', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (105, 5, 23, 'view', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (106, 5, 23, 'input', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (107, 5, 23, 'edit', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (108, 5, 23, 'delete', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (109, 5, 24, 'view', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (110, 5, 24, 'input', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (111, 5, 24, 'edit', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (112, 5, 24, 'delete', 'f', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');

-- ----------------------------
-- Table structure for app_group
-- ----------------------------
DROP TABLE IF EXISTS `app_group`;
CREATE TABLE `app_group`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_group` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_group` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_group` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 't',
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `nama_group`(`nama_group` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '~ data user group' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of app_group
-- ----------------------------
INSERT INTO `app_group` VALUES (1, 'Developer', 'Group Developer', 't', 1, '2022-10-17 16:20:38', 1, '2022-10-23 01:34:58');
INSERT INTO `app_group` VALUES (2, 'Administrator', 'Group Administrator', 't', 1, '2022-10-18 11:12:07', 1, '2022-12-07 16:13:36');
INSERT INTO `app_group` VALUES (5, 'penulis', 'grup user penulis/wartawan', 't', 4, '2023-06-07 21:06:44', 4, '2023-06-07 21:06:44');
INSERT INTO `app_group` VALUES (7, 'Auditor', 'group user untuk auditor', 't', 4, '2023-08-01 11:38:16', 4, '2023-08-01 11:38:16');

-- ----------------------------
-- Table structure for app_menu
-- ----------------------------
DROP TABLE IF EXISTS `app_menu`;
CREATE TABLE `app_menu`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `induk_menu` int NOT NULL,
  `nama_menu` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_menu` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `folder_menu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `target_menu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icon_menu` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `akses_menu` int NOT NULL DEFAULT 1000,
  `urutan_menu` int NOT NULL DEFAULT 1,
  `status_menu` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 't',
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `target_menu`(`target_menu` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '~ data menu aplikasi' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of app_menu
-- ----------------------------
INSERT INTO `app_menu` VALUES (1, 0, 'Konten', '', '', 'konten', 'fas fa-th-large', 1000, 1, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (2, 1, 'Parameter', '', 'content', 'parameter', '', 1111, 1, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (3, 1, 'Menu', '', 'content', 'menu', '', 1111, 2, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (4, 0, 'Infomasi', '', '', 'informasi', 'fas fa-clone', 1000, 2, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (6, 4, 'Jurnal', '', 'information', 'news', '', 1111, 2, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (19, 0, 'Kontak', '', '', 'kontak', 'fas fa-address-book', 1000, 6, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (20, 19, 'Hubungi Kami', '', 'contact', 'contact', '', 1001, 1, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (22, 0, 'User', '', '', 'setting', 'fas fa-cog', 1000, 7, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (23, 22, 'Daftar User', '', 'setting', 'user', '', 1111, 1, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (24, 22, 'Group User', '', 'setting', 'group', '', 1111, 2, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (25, 4, 'Banner', '', 'information', 'banner', '', 1111, 0, 't', 1, '2022-10-02 10:43:25', 1, '2023-12-14 10:49:09');

-- ----------------------------
-- Table structure for app_parameter
-- ----------------------------
DROP TABLE IF EXISTS `app_parameter`;
CREATE TABLE `app_parameter`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_parameter` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nilai_parameter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status_parameter` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 't',
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `nama_parameter`(`nama_parameter` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '~ data parameter aplikasi' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of app_parameter
-- ----------------------------
INSERT INTO `app_parameter` VALUES (1, 'Title', 'REPOSITORI SENI BUDAYA ISLAM', 't', 1, '2022-10-16 01:33:54', 4, '2024-06-27 20:12:15');
INSERT INTO `app_parameter` VALUES (2, 'Author', 'Direktorat Jenderal Bimbingan Masyarakat Islam', 't', 1, '2022-10-16 01:36:02', 1, '2023-01-12 12:07:58');
INSERT INTO `app_parameter` VALUES (3, 'Description', 'Direktorat Jenderal Bimbingan Masyarakat Islam Kementerian Agama Republik Indonesia', 't', 1, '2022-10-16 01:36:02', 1, '2023-01-12 12:08:03');
INSERT INTO `app_parameter` VALUES (4, 'Keywords', 'Bimas Islam, Direktorat Jenderal Bimbingan Masyarakat Islam, Kementerian Agama', 't', 1, '2022-10-16 01:36:02', 1, '2022-12-07 16:05:21');
INSERT INTO `app_parameter` VALUES (5, 'Icon', 'favicon.ico', 'i', 1, '2022-10-16 01:35:13', 4, '2023-06-12 10:16:20');
INSERT INTO `app_parameter` VALUES (6, 'Logo Header', 'logo.png', 'i', 1, '2022-10-16 01:35:13', 4, '2023-06-12 10:16:36');
INSERT INTO `app_parameter` VALUES (7, 'Logo Pusaka', 'pusaka.png', 'i', 1, '2022-10-16 01:35:13', 4, '2023-06-12 10:16:36');
INSERT INTO `app_parameter` VALUES (8, 'Logo Footer', 'logo2.png', 'i', 1, '2022-10-16 01:35:13', 4, '2023-06-12 10:17:10');
INSERT INTO `app_parameter` VALUES (9, 'Footer', '\n© Direktorat Jenderal Bimbingan Masyarakat Islam 2023', 't', 1, '2022-10-16 01:36:02', 1, '2022-12-08 23:52:14');
INSERT INTO `app_parameter` VALUES (10, 'Hunting', '0811-1068-3146', 't', 1, '2022-10-16 01:36:02', 1, '2023-01-10 07:56:52');
INSERT INTO `app_parameter` VALUES (11, 'Phone', '146', 't', 1, '2022-10-16 01:36:02', 1, '2023-01-10 11:15:46');
INSERT INTO `app_parameter` VALUES (12, 'Fax', '', 't', 1, '2022-10-16 01:36:02', 1, '2023-01-10 11:15:54');
INSERT INTO `app_parameter` VALUES (13, 'Email', ' layanan@kemenag.go.id', 't', 1, '2022-10-16 01:36:02', 1, '2023-01-10 07:56:40');
INSERT INTO `app_parameter` VALUES (14, 'Address', 'GEDUNG KEMENTERIAN AGAMA RI\r\nJl. M. H. Thamrin No.6 lantai 6, Jakarta Pusat 10340\r\nPO.BOX. 3733 JKP 10037', 't', 1, '2022-10-16 01:36:02', 4, '2023-10-24 14:09:04');
INSERT INTO `app_parameter` VALUES (15, 'Facebook', 'https://www.facebook.com/Ditjen.Bimas.Islam', 't', 1, '2022-10-16 01:36:02', 1, '2023-01-10 07:57:12');
INSERT INTO `app_parameter` VALUES (16, 'Twitter', 'https://twitter.com/BimasIslam', 't', 1, '2022-10-16 01:36:02', 1, '2023-01-10 07:57:25');
INSERT INTO `app_parameter` VALUES (17, 'Instagram', 'https://www.instagram.com/bimasislam/', 't', 1, '2022-10-16 01:36:02', 1, '2023-01-10 07:57:33');
INSERT INTO `app_parameter` VALUES (18, 'Youtube', 'https://www.youtube.com/channel/UCMDwUz44x_O10PRlm_vsYog', 't', 1, '2022-10-16 01:36:02', 1, '2023-01-10 07:57:42');
INSERT INTO `app_parameter` VALUES (19, 'Pusaka', 'https://pusaka.kemenag.go.id', 't', 1, '2022-10-16 01:36:02', 1, '2023-01-10 07:57:42');
INSERT INTO `app_parameter` VALUES (20, 'API', 'https://dev.alfabet.io/bimas-islam/api/', 't', 1, '2023-01-20 03:18:27', 1, '2023-01-20 03:29:54');
INSERT INTO `app_parameter` VALUES (21, 'Token', 'v2y10N6aO6jvYfANhIBITpCxu8SLj9ijX9w42YFAkP4vIkli3ytNAakW', 't', 1, '2023-01-19 04:13:27', 1, '2023-01-19 04:13:27');

-- ----------------------------
-- Table structure for app_user
-- ----------------------------
DROP TABLE IF EXISTS `app_user`;
CREATE TABLE `app_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_android` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_token` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_random` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_fcm` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_imei` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_group` int NOT NULL,
  `id_user` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_user` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto_user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_user` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 't',
  `login_user` datetime NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id_user`(`id_user` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '~ data user aplikasi' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of app_user
-- ----------------------------
INSERT INTO `app_user` VALUES (4, NULL, NULL, NULL, NULL, NULL, 2, 'admin@dev.com', '$2y$10$NoO/e4BBXRJ3nxjqwMPGreotpWSzdMfD7tv7KB1WEhj6GfBVpGCEq', 'Administrator', 'admin@default.template', NULL, 'img_1723346979292.jpg', 't', NULL, 1, '2022-10-18 16:07:40', 4, '2024-08-11 10:29:39');
INSERT INTO `app_user` VALUES (61, NULL, NULL, NULL, NULL, NULL, 5, 'info@scentivaid.com', '$2y$10$FvghNbRPlB4kzZ52PIv/8u60u3uaJ3AWYvlhCK1bn0pJO.B4mmxHW', 'priyambodo', 'maspriyambodo@gmail.com', NULL, NULL, 't', NULL, NULL, '2024-08-11 08:24:01', 4, '2024-08-11 19:20:58');
INSERT INTO `app_user` VALUES (63, NULL, NULL, NULL, NULL, NULL, 5, 'casugi.cabiku@gmail.com', '$2y$10$QhD0Vwx9lTb1FQ6xcqXkjem571.p3OAZFIcxehA8VKuNnUI7gH41O', 'priyambodo', 'casugi.cabiku@gmail.com', NULL, NULL, 't', NULL, NULL, '2024-08-22 10:02:50', NULL, '2024-08-22 10:07:42');

-- ----------------------------
-- Table structure for dta_banner
-- ----------------------------
DROP TABLE IF EXISTS `dta_banner`;
CREATE TABLE `dta_banner`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_banner` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `image_banner` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_banner` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dta_banner
-- ----------------------------
INSERT INTO `dta_banner` VALUES (1, 'Hari Amal Bhakti', NULL, 'img_1705570627169.jpeg', 't', 1, '2023-07-11 12:01:00', 1, '2024-01-18 16:37:07');
INSERT INTO `dta_banner` VALUES (2, 'Download Pusaka Apps', NULL, 'img_1705570604597.jpeg', 't', 1, '2023-07-11 12:01:07', 1, '2024-01-18 16:36:44');

-- ----------------------------
-- Table structure for dta_berita
-- ----------------------------
DROP TABLE IF EXISTS `dta_berita`;
CREATE TABLE `dta_berita`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_lama` int NULL DEFAULT NULL,
  `slug_berita` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_berita` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_berita` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `detail_berita` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `image_berita` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_berita` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 't',
  `hits` int NOT NULL,
  `status_approval` int NULL DEFAULT NULL COMMENT '0. ditolak\r\n1. menunggu persetujuan\r\n2. disetujui',
  `user_approval` int NULL DEFAULT NULL,
  `date_approval` datetime NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dta_berita
-- ----------------------------
INSERT INTO `dta_berita` VALUES (1, NULL, 'what-is-lorem-ipsum', 'What is Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'img_1721754068466.jpg', 't', 0, 2, 4, '2024-08-12 02:12:12', 4, '2024-07-24 00:01:08', 4, '2024-08-12 02:12:12');
INSERT INTO `dta_berita` VALUES (2, NULL, 'seni-dan-kebudayaan-dalam-perspektif-pendidikan-islam', 'Seni dan Kebudayaan dalam Perspektif Pendidikan Islam', 'Islam adalah agama yang fleksibel dan cakupannya pun sangat luas, sangat tidak bisa kalau hanya dilihat dari satu sudut pandang saja.', 'Islam adalah agama yang fleksibel dan cakupannya pun sangat luas, sangat tidak bisa kalau hanya dilihat dari satu sudut pandang saja. Yang mana dalam Islam sendiri tidak ada pemaksaan ataupun keterpaksaan bagi umatnya.<br><br>Semua aspek kehidupan sudah diatur dalam Islam. Cakupan yang diajarkan dalam kajian agama islam sangatlah luas dan tak ada satupun ilmu yang terlewati dalam kajian agama islam semua terjawab dalam islam.<br><br>Bahkan Islam sangat menghargai seni dan kebudayaan. Sesuai dengan sistem penyebaran Islam zaman dahulu, seni dan kebudayaan dianggap cara yang paling efektif dalam berdakwah. Melalui sistem tersebut masyarakat lebih mudah memahami nilai – nilai Islam melalui seni tanpa adanya kekerasan.<br><br>Seiring perkembangan Islam, kebudayaan mulai muncul dengan berbagai jenis. Bahkan dalam setiap daerah memiliki kebudayaannya masing – masing. Kebuadayaan mengalami perkembangan yang sangat pesat dan signifikan. Hal ini memberikan dampak pada perkembangan kebudayaan islam.<br><br>Kebudayaan Islam adalah peradaban yang berlandaskan pada nilai – nilai ajaran Islam. Nilai kebudayaan ini dapat dilihat dari tokoh – tokoh terdahulu yang telah menyebarkan agama islam baik dalam bidang sains maupun teknologi. Dalam kebudayaan juga terdapat nilai – nilai yang dijadikan landasan pokok guna menentukan sikap untuk dunia luarnya, bahkan untuk mendasari langkah yang hendak dilakukannya sehubungan dengan pola hidup dan tata cara bermasyarakat.<br><br>Islam rahmatan lil alamin atau rahmat bagi seluruh alam semesta. Kalau di tafsiri atau diterjemahkan islam rahmatan lil alamin sangat luas sekali. Karena ajaran agama islam sendiri tampil menjadi pemecah solusi untuk segala permasalahan yang menimpa manusia.<br><br>Upaya – upaya islam rahmatan lil alamin dibuktikan oleh peran penyebar agama islam yaitu para wali songo yang sangat berperan besar dalam penyebaran agama islam di pulau Jawa. Salah satu upaya yang dilakukan wali songo dalam menyebarkan agama islam di tanah Jawa yaitu dengan berkesenian dan berkebudayaan.<br><br>Hal ini menunjukkan bahwa seni adalah cara paling efektif&nbsp; untuk para wali songo berdakwah menyebarkan agama islam di tanah Jawa. Karena islam akan membawa kemaslahatan bagi manusia di bumi ini. Islam sebagai agama yang sempurna, rahmat bagi seluruh alam, kebeneran dan penunjuk jalan bagi umat manusia guna memperoleh kebahagiaan hidup di dunia dan akhirat, tentu mempunyai sikap dalam dinamika budaya umat manuisa.<br><br>Dinamika budaya yang dikehendaki Islam adalah dinamika yang positif, yaitu bermanfaat tanpa menimbulkan malapetaka dan aniaya bagi manusia. Karena memang seni dalam islam lahir dari suatu proses pembelajaran pendidikan yang positif dan tidak keluar dari batas – batas syariat.<br><br>Seni Islam merupakan seni yang berpedoman pada aqidah Islam yaitu pengesaan kepada Allah dan tidak keluar dari aqidah dan akhlak. M. Abdul Jabbar Beg berpendapat, suatu seni akan menjadi islamis, jika seni mengungkapkan pandangan kehidupan muslimin yaitu dengan konsep tauhid (Beg, 1981: 2-3).<br><br>Tujuan dari seni Islam tidak lain hanya karena mencari keridhoaan Allah SWT semata, sedangkan kesenian yang tidak berkonsep Islam hanya semata – mata untuk dunia sebagai hiburan atau kesenangan saja tak ada manfaatnya. Quraish Shihab mengemukakan pandangannya, Seni Islam adalah ekspresi tentang keindahan wujud dari sisi pandangan Islam tentang Islam, hidup dan manusia yang mengantar menuju pertemuan sempurna antara kebenaran dan keindahan (Shihab, 1996: 398).<br><br>Kesenian atau seni dalam Islam berperan untuk membimbing manusia kepada akhlak yang mulia dengan pembelajaran positif yang tidak keluar dari syariat – syariat Islam. Adanya kesenian dalam Islam bertujuan untuk mengesakan Allah SWT dan mencari keridhoan-Nya. Seni dalam Islam juga digunakan untuk sarana dakwah guna menebarkan kebaikan dan mengingatkan manusia untuk beribadah kepada Allah SWT.<br><br>Jadi, antara Islam dan kebudayaan bersifat saling mempengaruhi. Islam dan Kebudayaan juga saling mewarnai satu sama lain. Ketentuan harus dijaga oleh umat Islam adalah ajaran Islam yang tetap dan abadi tidak dihilangkan atau dikorbankan dan harus diimplementasikan secara efektif di masyarakat. Nilai – nilai budaya juga dapat dipraktekkan dalam ajaran agama. Nilai Budaya yang tidak sesuai dengan Islam, dapat diubah secara berangsur – angsur atau bertahap.', 'img_1723383172805.jpg', 't', 0, 1, NULL, NULL, 61, '2024-08-11 20:32:52', 61, '2024-08-11 20:32:52');

-- ----------------------------
-- Table structure for dta_categories_our_collection
-- ----------------------------
DROP TABLE IF EXISTS `dta_categories_our_collection`;
CREATE TABLE `dta_categories_our_collection`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `urutan` int NOT NULL,
  `icon_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status` tinyint NOT NULL,
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dta_categories_our_collection
-- ----------------------------
INSERT INTO `dta_categories_our_collection` VALUES (1, 'Audio', 'audio', 1, 'cms/images/icon/audio.png', 1, NULL, '2024-08-17 17:19:13', NULL, '0000-00-00 00:00:00');
INSERT INTO `dta_categories_our_collection` VALUES (2, 'Video', 'video', 2, 'cms/images/icon/videos.png', 1, NULL, '2024-08-17 17:19:13', NULL, '0000-00-00 00:00:00');
INSERT INTO `dta_categories_our_collection` VALUES (3, 'Gambar', 'gambar', 3, 'cms/images/icon/photos.png', 1, NULL, '2024-08-17 17:19:13', NULL, '0000-00-00 00:00:00');
INSERT INTO `dta_categories_our_collection` VALUES (4, 'Tulisan', 'tulisan', 4, 'cms/images/icon/news.png', 1, NULL, '2024-08-17 17:19:13', NULL, '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for dta_content
-- ----------------------------
DROP TABLE IF EXISTS `dta_content`;
CREATE TABLE `dta_content`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kategori` int NOT NULL,
  `induk_content` int NOT NULL,
  `nama_content` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `label_content` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `detail_content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `redirect_content` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link_content` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hide_content` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `urutan_content` int NOT NULL,
  `level_content` int NOT NULL,
  `icon_content` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_content` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_content` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_hidden` int NULL DEFAULT 1 COMMENT '0. hidden\r\n1. show',
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 107 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dta_content
-- ----------------------------
INSERT INTO `dta_content` VALUES (26, 2, 0, 'Jurnal', NULL, NULL, NULL, 'f', 'f', 'f', 2, 1, 'ico_1692345530396.png', '', 't', 1, 1, '2023-01-10 08:32:24', 4, '2023-08-18 14:58:50');
INSERT INTO `dta_content` VALUES (90, 0, 0, 'Galeri', NULL, NULL, NULL, 'f', 't', 'f', 5, 1, '', '', 't', 1, 1, '2023-01-10 10:01:24', 1, '2023-01-10 13:46:19');
INSERT INTO `dta_content` VALUES (91, 5, 90, 'Foto', NULL, NULL, NULL, 'f', 'f', 'f', 1, 2, '', '', 't', 1, 1, '2023-01-10 10:01:36', 1, '2023-01-10 10:01:36');
INSERT INTO `dta_content` VALUES (92, 6, 90, 'Video', NULL, NULL, NULL, 'f', 'f', 'f', 2, 2, '', '', 't', 1, 1, '2023-01-10 10:01:50', 1, '2023-01-10 10:01:50');
INSERT INTO `dta_content` VALUES (95, 13, 0, 'Tentang Kami', NULL, NULL, '<iframe src=\"//www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.599726583545!2d106.82012327418211!3d-6.1842902605925145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5cc30747451%3A0x91e768f59b726b41!2sDitjen%20Bimas%20Islam!5e0!3m2!1sen!2sid!4v1691737525827!5m2!1sen!2sid\" style=\"border:0;margin-bottom:40px\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\" width=\"100%\" height=\"250\"></iframe><div class=\"axil-single-widget widget widget_postlist mb--30\"><small><i class=\"fas fa-phone\"></i> Telepon (+6221) 3920129 <br><i class=\"fas fa-envelope\"></i> Email bimasislam@kemenag.go.id<br><i class=\"fas fa-map-marker\"></i> Alamat GEDUNG KEMENTRIAN AGAMA RI<br>Jl. M. H. Thamrin No.6 lantai 6<br>Jakarta Pusat 10340<br>PO.BOX. 3733 JKP 10037</small></div>', 'f', 't', 'f', 6, 1, 'ico_1673447461437.png', '', 't', 1, 1, '2023-01-10 10:02:44', 1, '2024-01-18 16:43:43');
INSERT INTO `dta_content` VALUES (104, 0, 0, 'Cookie Policy', NULL, NULL, '<style> a.cky-banner-element { padding: 8px 30px; background: #F8F9FA; color: #858A8F; border: 1px solid #DEE2E6; box-sizing: border-box; border-radius: 2px; cursor: pointer;}</style><p> Effective Date: 22-Aug-2023 <br> Last Updated: 22-Aug-2023</p>&nbsp;<h5>What are cookies?</h5><div class=\"cookie-policy-p\"><p>This Cookie Policy explains what cookies are and how we use them, the types of cookies we use i.e, the information we collect using cookies and how that information is used, and how to manage the cookie settings.</p> <p>Cookies are small text files that are used to store small pieces of information. They are stored on your device when the website is loaded on your browser. These cookies help us make the website function properly, make it more secure, provide better user experience, and understand how the website performs and to analyze what works and where it needs improvement.</p></div>&nbsp;<h5>How do we use cookies?</h5><div class=\"cookie-policy-p\"><p>As most of the online services, our website uses first-party and third-party cookies for several purposes. First-party cookies are mostly necessary for the website to function the right way, and they do not collect any of your personally identifiable data.</p> <p>The third-party cookies used on our website are mainly for understanding how the website performs, how you interact with our website, keeping our services secure, providing advertisements that are relevant to you, and all in all providing you with a better and improved user experience and help speed up your future interactions with our website.</p></div>&nbsp; <h5>Types of Cookies we use</h5> <div class=\"cky-audit-table-element\"></div>&nbsp; <h5 style=\"margin-bottom:20px;\">Manage cookie preferences</h5> <a class=\"cky-banner-element\">Cookie Settings</a> <br> <div><p><br></p><p>You can change your cookie preferences any time by clicking the above button. This will let you revisit the cookie consent banner and change your preferences or withdraw your consent right away. </p> <p>In addition to this, different browsers provide different methods to block and delete cookies used by websites. You can change the settings of your browser to block/delete the cookies. Listed below are the links to the support documents on how to manage and delete cookies from the major web browsers.</p> <p>Chrome: <a href=\"//support.google.com/accounts/answer/32050\" target=\"_blank\">//support.google.com/accounts/answer/32050</a></p><p>Safari: <a href=\"//support.apple.com/en-in/guide/safari/sfri11471/mac\" target=\"_blank\">//support.apple.com/en-in/guide/safari/sfri11471/mac</a></p><p>Firefox: <a href=\"//support.mozilla.org/en-US/kb/clear-cookies-and-site-data-firefox?redirectslug=delete-cookies-remove-info-websites-stored&amp;redirectlocale=en-US\" target=\"_blank\">//support.mozilla.org/en-US/kb/clear-cookies-and-site-data-firefox?redirectslug=delete-cookies-remove-info-websites-stored&amp;redirectlocale=en-US</a></p><p>Internet Explorer: <a href=\"//support.microsoft.com/en-us/topic/how-to-delete-cookie-files-in-internet-explorer-bca9446f-d873-78de-77ba-d42645fa52fc\" target=\"_blank\">//support.microsoft.com/en-us/topic/how-to-delete-cookie-files-in-internet-explorer-bca9446f-d873-78de-77ba-d42645fa52fc</a></p><p>If you are using any other web browser, please visit your browser’s official support documents.</p></div>&nbsp;<p class=\"cookie-policy-p\"> Cookie Policy Generated By <a target=\"_blank\" href=\"//www.cookieyes.com/?utm_source=CP&amp;utm_medium=footer&amp;utm_campaign=UW\" rel=\"”nofollow”\">CookieYes - Cookie Policy Generator</a>.</p>', 'f', 'f', 'f', 7, 1, '', '', 't', 0, 4, '2023-08-22 13:43:13', 4, '2023-08-22 13:58:52');
INSERT INTO `dta_content` VALUES (105, 0, 0, 'Privacy Policy', NULL, NULL, '<span>Last Updated On 22-Aug-2023</span><br><span>Effective Date 22-Aug-2023</span><p class=\"privacy-policy-p mt-4\"> This Privacy Policy describes the policies of Bimas Islam, Jl. M. H. Thamrin No.6 lantai 7, DKI JAKARTA 10340, Indonesia, email: bimasislam022@gmail.com, phone: 081282309100 on the collection, use and disclosure of your information that we collect when you use our website ( bimasislam.kemenag.go.id ). (the “Service”). By accessing or using the Service, you are consenting to the collection, use and disclosure of your information in accordance with this Privacy Policy. If you do not consent to the same, please do not access or use the Service.</p><p class=\"privacy-policy-p\"> We may modify this Privacy Policy at any time without any prior notice to you and will post the revised Privacy Policy on the Service. The revised Policy will be effective 180 days from when the revised Policy is posted in the Service and your continued access or use of the Service after such time will constitute your acceptance of the revised Privacy Policy. We therefore recommend that you periodically review this page.</p><ol class=\"privacy-policy-ol\"> <li> <h2 class=\"privacy-policy-h2\"> How We Share Your Information: </h2> <p class=\"privacy-policy-p\"> We will not transfer your personal information to any third party without seeking your consent, except in limited circumstances as described below: </p> <ol class=\"privacy-policy-ol\"> <li>Analytics</li> <li>Data collection &amp; process</li> </ol> <p class=\"privacy-policy-p\"> We require such third party’s to use the personal information we transfer to them only for the purpose for which it was transferred and not to retain it for longer than is required for fulfilling the said purpose. </p> <p class=\"privacy-policy-p\"> We may also disclose your personal information for the following: (1) to comply with applicable law, regulation, court order or other legal process; (2) to enforce your agreements with us, including this Privacy Policy; or (3) to respond to claims that your use of the Service violates any third-party rights. If the Service or our company is merged or acquired with another company, your information will be one of the assets that is transferred to the new owner. </p> </li> <li> <h2 class=\"privacy-policy-h2\"> Your Rights: </h2> <p class=\"privacy-policy-p\"> Depending on the law that applies, you may have a right to access and rectify or erase your personal data or receive a copy of your personal data, restrict or object to the active processing of your data, ask us to share (port) your personal information to another entity, withdraw any consent you provided to us to process your data, a right to lodge a complaint with a statutory authority and such other rights as may be relevant under applicable laws. To exercise these rights, you can write to us at layanan@kemenag.go.id. We will respond to your request in accordance with applicable law. </p> <p class=\"privacy-policy-p\"> You may opt-out of direct marketing communications or the profiling we carry out for marketing purposes by writing to us at layanan@kemenag.go.id. </p> <p class=\"privacy-policy-p\"> Do note that if you do not allow us to collect or process the required personal information or withdraw the consent to process the same for the required purposes, you may not be able to access or use the services for which your information was sought. </p> </li> <li> <h2 class=\"privacy-policy-h2\"> Cookies Etc. </h2> <p class=\"privacy-policy-p\"> To learn more about how we use these and your choices in relation to these tracking technologies, please refer to our <a href=\"//bimasislam.kemenag.go.id/cookie-policy\">Cookie Policy.</a> </p> </li> <li> <h2 class=\"privacy-policy-h2\"> Security: </h2> <p class=\"privacy-policy-p\"> The security of your information is important to us and we will use reasonable security measures to prevent the loss, misuse or unauthorized alteration of your information under our control. However, given the inherent risks, we cannot guarantee absolute security and consequently, we cannot ensure or warrant the security of any information you transmit to us and you do so at your own risk. </p> </li> <li> <h2 class=\"privacy-policy-h2\"> Third Party Links &amp; Use Of Your Information: </h2> <p class=\"privacy-policy-p\"> Our Service may contain links to other websites that are not operated by us. This Privacy Policy does not address the privacy policy and other practices of any third parties, including any third party operating any website or service that may be accessible via a link on the Service. We strongly advise you to review the privacy policy of every site you visit. We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services. </p> </li> <li> <h2 class=\"privacy-policy-h2\"> Grievance / Data Protection Officer: </h2> <p class=\"privacy-policy-p\"> If you have any queries or concerns about the processing of your information that is available with us, you may email our Grievance Officer at Bimas Islam, Jl. M. H. Thamrin No.6 lantai 7 JAKARTA PUSAT, email: layanan@kemenag.go.id. We will address your concerns in accordance with applicable law. </p> </li></ol><p class=\"privacy-policy-p\"> Privacy Policy generated with <a target=\"_blank\" href=\"//www.cookieyes.com/?utm_source=PP&amp;utm_medium=footer&amp;utm_campaign=UW\" rel=\"nofollow\">CookieYes</a>.</p>', 'f', 'f', 'f', 8, 1, '', '', 't', 0, 4, '2023-08-22 13:55:49', 4, '2023-08-22 14:03:29');
INSERT INTO `dta_content` VALUES (106, 19, 0, 'Audio', NULL, NULL, NULL, 'f', 'f', 'f', 9, 1, '', '', 't', 1, 4, '2024-08-18 16:34:14', 4, '2024-08-18 16:34:14');

-- ----------------------------
-- Table structure for dta_foto
-- ----------------------------
DROP TABLE IF EXISTS `dta_foto`;
CREATE TABLE `dta_foto`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_content` int NOT NULL,
  `nama_foto` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `image_foto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_foto` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_approval` int NULL DEFAULT NULL COMMENT '0. ditolak\r\n1. menunggu persetujuan\r\n2. disetujui',
  `user_approval` int NULL DEFAULT NULL,
  `date_approval` datetime NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dta_foto
-- ----------------------------

-- ----------------------------
-- Table structure for dta_jenis
-- ----------------------------
DROP TABLE IF EXISTS `dta_jenis`;
CREATE TABLE `dta_jenis`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_jenis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `urutan_jenis` int NOT NULL,
  `status_jenis` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dta_jenis
-- ----------------------------
INSERT INTO `dta_jenis` VALUES (1, 'Al Quran dan Hadist', NULL, 1, 't', NULL, '2023-01-13 02:37:37', NULL, '2023-01-13 02:37:37');
INSERT INTO `dta_jenis` VALUES (2, 'Aqidah (Paham Keagamaan)', NULL, 2, 't', NULL, '2023-01-13 02:37:37', NULL, '2023-01-13 02:37:37');
INSERT INTO `dta_jenis` VALUES (3, 'Aqidah (Aliran Keagamaan)', NULL, 3, 't', NULL, '2023-01-13 02:37:37', NULL, '2023-01-13 02:37:37');
INSERT INTO `dta_jenis` VALUES (4, 'Aqidah (Gerakan Keagamaan)', NULL, 4, 't', NULL, '2023-01-13 02:37:37', NULL, '2023-01-13 02:37:37');
INSERT INTO `dta_jenis` VALUES (5, 'Fiqih (Ibadah)', NULL, 5, 't', NULL, '2023-01-13 02:37:37', NULL, '2023-01-13 02:37:37');
INSERT INTO `dta_jenis` VALUES (6, 'Fiqih (Muamalah)', NULL, 6, 't', NULL, '2023-01-13 02:37:37', NULL, '2023-01-13 02:37:37');
INSERT INTO `dta_jenis` VALUES (7, 'Fiqih (Munakahat)', NULL, 7, 't', NULL, '2023-01-13 02:37:37', NULL, '2023-01-13 02:37:37');
INSERT INTO `dta_jenis` VALUES (8, 'Fiqih (Produk Halal)', NULL, 8, 't', NULL, '2023-01-13 02:37:37', NULL, '2023-01-13 02:37:37');
INSERT INTO `dta_jenis` VALUES (9, 'Fiqih (Haji)', NULL, 9, 't', NULL, '2023-01-13 02:37:37', NULL, '2023-01-13 02:37:37');
INSERT INTO `dta_jenis` VALUES (10, 'Fiqih (Zakat dan Wakaf)', NULL, 10, 't', NULL, '2023-01-13 02:37:37', NULL, '2023-01-13 02:37:37');
INSERT INTO `dta_jenis` VALUES (11, 'Fiqih (Waris)', NULL, 11, 't', NULL, '2023-01-13 02:37:37', NULL, '2023-01-13 02:37:37');
INSERT INTO `dta_jenis` VALUES (12, 'Fiqih (Hisab Rukyat)', NULL, 12, 't', NULL, '2023-01-13 02:37:37', NULL, '2023-01-13 02:37:37');
INSERT INTO `dta_jenis` VALUES (13, 'Akhlak dan Tasawuf', NULL, 13, 't', NULL, '2023-01-13 02:37:37', NULL, '2023-01-13 02:37:37');
INSERT INTO `dta_jenis` VALUES (14, 'Umum', NULL, 14, 't', NULL, '2023-01-13 02:37:37', NULL, '2023-01-13 02:37:37');

-- ----------------------------
-- Table structure for dta_kategori
-- ----------------------------
DROP TABLE IF EXISTS `dta_kategori`;
CREATE TABLE `dta_kategori`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_kategori` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status_kategori` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dta_kategori
-- ----------------------------
INSERT INTO `dta_kategori` VALUES (1, 'Dokumen', NULL, 'f', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (2, 'Berita', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (3, 'Opini', NULL, 'f', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (4, 'Tokoh', NULL, 'f', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (5, 'Foto', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (6, 'Video', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (8, 'Link', NULL, 'f', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (9, 'Jadwal', NULL, 'f', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (10, 'Pertanyaan', NULL, 'f', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (11, 'Konsultasi', NULL, 'f', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (12, 'Bimbingan', NULL, 'f', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (13, 'Kontak', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (14, 'Pengaduan', NULL, 'f', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (17, 'Sejarah', NULL, 'f', NULL, '2023-09-25 14:14:44', NULL, '2023-09-25 14:14:49');
INSERT INTO `dta_kategori` VALUES (18, 'Umum', NULL, 'f', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (19, 'Audio', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');

-- ----------------------------
-- Table structure for dta_kontak
-- ----------------------------
DROP TABLE IF EXISTS `dta_kontak`;
CREATE TABLE `dta_kontak`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kontak` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_kontak` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `detail_kontak` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dta_kontak
-- ----------------------------

-- ----------------------------
-- Table structure for dta_our_collections
-- ----------------------------
DROP TABLE IF EXISTS `dta_our_collections`;
CREATE TABLE `dta_our_collections`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_category` int NOT NULL,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `banner_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `pencipta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kd_prov` bigint NULL DEFAULT NULL,
  `kd_kabkota` bigint NULL DEFAULT NULL,
  `status` tinyint NOT NULL COMMENT '1. aktif 0. draft',
  `status_approval` int NULL DEFAULT NULL COMMENT '0. ditolak\r\n1. menunggu persetujuan\r\n2. disetujui',
  `user_approval` int NULL DEFAULT NULL,
  `date_approval` datetime NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `idx_slug`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dta_our_collections
-- ----------------------------
INSERT INTO `dta_our_collections` VALUES (1, 1, 'Tari Saman', 'tari-saman', 'Tari tradisional dari Aceh', 'landing/img/photos/b1.jpg', 'Masyarakat Gayo', 11, 1101, 1, 1, 61, '2024-08-17 10:00:00', 61, '2024-08-17 09:00:00', 1, '2024-08-17 09:00:00');
INSERT INTO `dta_our_collections` VALUES (2, 1, 'Wayang Kulit', 'wayang-kulit', 'Seni pertunjukan tradisional Jawa', 'landing/img/photos/b1.jpg', 'Kebudayaan Jawa', 31, 3171, 1, 1, 61, '2024-08-17 11:00:00', 61, '2024-08-17 10:00:00', 2, '2024-08-17 10:00:00');
INSERT INTO `dta_our_collections` VALUES (3, 1, 'Angklung', 'angklung', 'Alat musik tradisional dari bambu', 'landing/img/photos/b1.jpg', 'Masyarakat Sunda', 32, 3273, 1, 1, 61, '2024-08-17 12:00:00', 61, '2024-08-17 11:00:00', 3, '2024-08-17 11:00:00');
INSERT INTO `dta_our_collections` VALUES (4, 1, 'Batik', 'batik', 'Seni kerajinan kain tradisional', 'landing/img/photos/b1.jpg', 'Berbagai daerah di Indonesia', 33, 3301, 1, 1, 61, '2024-08-17 13:00:00', 61, '2024-08-17 12:00:00', 4, '2024-08-17 12:00:00');
INSERT INTO `dta_our_collections` VALUES (5, 1, 'Reog Ponorogo', 'reog-ponorogo', 'Tarian tradisional dari Jawa Timur', 'landing/img/photos/b1.jpg', 'Masyarakat Ponorogo', 35, 3502, 1, 1, 61, '2024-08-17 14:00:00', 61, '2024-08-17 13:00:00', 5, '2024-08-17 13:00:00');
INSERT INTO `dta_our_collections` VALUES (6, 2, 'Gamelan', 'gamelan', 'Ensembel musik tradisional', 'landing/img/photos/b1.jpg', 'Kebudayaan Jawa dan Bali', 51, 5101, 1, 1, 61, '2024-08-17 15:00:00', 61, '2024-08-17 14:00:00', 6, '2024-08-17 14:00:00');
INSERT INTO `dta_our_collections` VALUES (7, 2, 'Tari Kecak', 'tari-kecak', 'Tarian api dari Bali', 'landing/img/photos/b1.jpg', 'Masyarakat Bali', 51, 5103, 1, 1, 61, '2024-08-17 16:00:00', 61, '2024-08-17 15:00:00', 7, '2024-08-17 15:00:00');
INSERT INTO `dta_our_collections` VALUES (8, 2, 'Tenun Ikat', 'tenun-ikat', 'Kain tradisional Indonesia', 'landing/img/photos/b1.jpg', 'Berbagai daerah di Indonesia', 53, 5301, 1, 1, 61, '2024-08-17 17:00:00', 61, '2024-08-17 16:00:00', 8, '2024-08-17 16:00:00');
INSERT INTO `dta_our_collections` VALUES (9, 2, 'Ondel-ondel', 'ondel-ondel', 'Boneka raksasa khas Betawi', 'landing/img/photos/b1.jpg', 'Masyarakat Betawi', 31, 3171, 1, 1, 61, '2024-08-17 18:00:00', 61, '2024-08-17 17:00:00', 9, '2024-08-17 17:00:00');
INSERT INTO `dta_our_collections` VALUES (10, 2, 'Tari Pendet', 'tari-pendet', 'Tarian selamat datang dari Bali', 'landing/img/photos/b1.jpg', 'Masyarakat Bali', 51, 5103, 1, 1, 61, '2024-08-17 19:00:00', 61, '2024-08-17 18:00:00', 10, '2024-08-17 18:00:00');
INSERT INTO `dta_our_collections` VALUES (11, 3, 'Keris', 'keris', 'Senjata tradisional Indonesia', 'landing/img/photos/b1.jpg', 'Empu keris', 33, 3301, 1, 1, 61, '2024-08-17 20:00:00', 61, '2024-08-17 19:00:00', 11, '2024-08-17 19:00:00');
INSERT INTO `dta_our_collections` VALUES (12, 3, 'Tari Piring', 'tari-piring', 'Tarian dengan piring dari Sumatra Barat', 'landing/img/photos/b1.jpg', 'Masyarakat Minangkabau', 13, 1301, 1, 1, 61, '2024-08-17 21:00:00', 61, '2024-08-17 20:00:00', 12, '2024-08-17 20:00:00');
INSERT INTO `dta_our_collections` VALUES (13, 3, 'Sasando', 'sasando', 'Alat musik petik dari Rote', 'landing/img/photos/b1.jpg', 'Masyarakat Rote', 53, 5301, 1, 1, 61, '2024-08-18 09:00:00', 61, '2024-08-18 08:00:00', 13, '2024-08-18 08:00:00');
INSERT INTO `dta_our_collections` VALUES (14, 3, 'Tari Topeng', 'tari-topeng', 'Tarian dengan topeng dari Cirebon', 'landing/img/photos/b1.jpg', 'Masyarakat Cirebon', 32, 3209, 1, 1, 61, '2024-08-18 10:00:00', 61, '2024-08-18 09:00:00', 14, '2024-08-18 09:00:00');
INSERT INTO `dta_our_collections` VALUES (15, 3, 'Kain Songket', 'kain-songket', 'Kain tenun mewah', 'landing/img/photos/b1.jpg', 'Pengrajin Sumatra', 16, 1601, 1, 1, 61, '2024-08-18 11:00:00', 61, '2024-08-18 10:00:00', 15, '2024-08-18 10:00:00');
INSERT INTO `dta_our_collections` VALUES (16, 4, 'Tari Jaipong', 'tari-jaipong', 'Tarian dinamis dari Jawa Barat', 'landing/img/photos/b1.jpg', 'Gugum Gumbira', 32, 3273, 1, 1, 61, '2024-08-18 12:00:00', 61, '2024-08-18 11:00:00', 16, '2024-08-18 11:00:00');
INSERT INTO `dta_our_collections` VALUES (17, 4, 'Gerabah', 'gerabah', 'Kerajinan tanah liat', 'landing/img/photos/b1.jpg', 'Pengrajin tradisional', 34, 3401, 1, 1, 61, '2024-08-18 13:00:00', 61, '2024-08-18 12:00:00', 17, '2024-08-18 12:00:00');
INSERT INTO `dta_our_collections` VALUES (18, 4, 'Tari Kipas Pakarena', 'tari-kipas-pakarena', 'Tarian klasik dari Sulawesi Selatan', 'landing/img/photos/b1.jpg', 'Masyarakat Gowa', 73, 7301, 1, 1, 61, '2024-08-18 14:00:00', 61, '2024-08-18 13:00:00', 18, '2024-08-18 13:00:00');
INSERT INTO `dta_our_collections` VALUES (19, 4, 'Ukiran Jepara', 'ukiran-jepara', 'Seni ukir kayu', 'landing/img/photos/b1.jpg', 'Pengrajin Jepara', 33, 3320, 1, 1, 61, '2024-08-18 15:00:00', 61, '2024-08-18 14:00:00', 19, '2024-08-18 14:00:00');
INSERT INTO `dta_our_collections` VALUES (20, 4, 'Tari Gandrung', 'tari-gandrung', 'Tarian selamat datang dari Banyuwangi', 'landing/img/photos/b1.jpg', 'Masyarakat Banyuwangi', 35, 3510, 1, 1, 4, '2024-08-18 15:27:54', 61, '2024-08-18 15:00:00', 20, '2024-08-18 15:27:54');
INSERT INTO `dta_our_collections` VALUES (41, 4, 'Where does it come from?', 'where-does-it-come-from', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'images/berita/2024/August/img_1724384793606.jpg', 'Contrary to popular belief', 11, 1101, 1, 2, 4, '2024-08-23 10:46:33', 4, '2024-08-23 10:46:33', 4, '2024-08-23 10:46:33');
INSERT INTO `dta_our_collections` VALUES (43, 4, 'Where can I get some?', 'where-can-i-get-some', 'There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don\'t look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn\'t \r\nanything embarrassing hidden in the middle of text. All the Lorem Ipsum \r\ngenerators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc.', 'images/berita/2024/August/img_1724385185025.png', 'injected humour and the like', 11, 1102, 1, 2, 4, '2024-08-23 10:53:05', 4, '2024-08-23 10:53:05', 4, '2024-08-23 10:53:05');
INSERT INTO `dta_our_collections` VALUES (44, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'lorem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', 'form-pengajuan/44/banner_path/banner.png', 'Lorem Ipsum', 51, 5103, 1, NULL, NULL, NULL, NULL, '2024-08-23 10:55:58', NULL, '2024-08-23 10:55:58');
INSERT INTO `dta_our_collections` VALUES (45, 2, 'Taylor Swift - Who’s Afraid of Little Old Me? (Official Lyric Video)', 'taylor-swift-whos-afraid-of-little-old-me-official-lyric-video', '<video src=\"https://www.youtube.com/embed/vOZFiX6hDXQ?showinfo=0\" controls=\"controls\" style=\"width: 100%;\"><p><br></p></video>\n', 'form-pengajuan/45/banner_path/banner.jpeg', 'Taylor Swift', 31, 3174, 1, NULL, NULL, NULL, 4, '2024-08-27 09:22:07', NULL, '2024-08-27 09:22:07');
INSERT INTO `dta_our_collections` VALUES (46, 2, 'Taylor Swift - Delicate', 'taylor-swift-delicate', '<video src=\"https://youtu.be/4QIZE708gJ4?si=zamiSukh4C-tW_x-\" controls=\"controls\" style=\"width: 100%;\"><p><br></p></video>', 'form-pengajuan/46/banner_path/banner.jpeg', 'Taylor Swift', 31, 3174, 1, 2, 61, '2024-08-27 09:55:52', 4, '2024-08-27 09:49:09', NULL, '2024-08-27 09:49:09');
INSERT INTO `dta_our_collections` VALUES (47, 2, 'Afrojack - Ten Feet Tall (Official Lyric Video) ft. Wrabel', 'afrojack-ten-feet-tall-official-lyric-video-ft-wrabel', '<p><span contenteditable=\"false\" draggable=\"true\" class=\"fr-video fr-deletable fr-fvc fr-dvb fr-draggable\"><iframe width=\"640\" height=\"360\" src=\"https://www.youtube.com/embed/bltr_Dsk5EY?&amp;wmode=opaque&amp;rel=0\" frameborder=\"0\" allowfullscreen=\"\" class=\"fr-draggable\"></iframe></span></p>\n', 'form-pengajuan/47/banner_path/banner.jpeg', 'Afrojack', 51, 5101, 1, 2, NULL, NULL, 4, '2024-08-28 13:28:45', NULL, '2024-08-28 13:28:45');
INSERT INTO `dta_our_collections` VALUES (48, 2, 'Pramono-Rano: Cerita Anies, Titah Mega, dan Tawa Jokowi | Mata Najwa', 'pramono-rano-cerita-anies-titah-mega-dan-tawa-jokowi-mata-najwa', '<p><span contenteditable=\"false\" draggable=\"true\" class=\"fr-video fr-deletable fr-fvc fr-dvb fr-draggable\"><iframe width=\"640\" height=\"360\" src=\"https://www.youtube.com/embed/MYTIAlFtg_8?&amp;wmode=opaque&amp;rel=0\" frameborder=\"0\" allowfullscreen=\"\"></iframe></span></p>\n', 'form-pengajuan/48/banner_path/banner.jpeg', 'Najwa', 31, 3171, 1, 1, NULL, NULL, 4, '2024-08-30 17:51:39', NULL, '2024-08-30 17:51:39');
INSERT INTO `dta_our_collections` VALUES (52, 2, 'Ahok soal Jokowi, Prabowo, dan Jakarta Hari Ini | Mata Najwa', 'ahok-soal-jokowi-prabowo-dan-jakarta-hari-ini-mata-najwa', '<p><span contenteditable=\"false\" draggable=\"true\" class=\"fr-video fr-deletable fr-fvc fr-dvb fr-draggable\"><iframe width=\"640\" height=\"360\" src=\"https://www.youtube.com/embed/4UFiy6OkgN0?&amp;wmode=opaque&amp;rel=0\" frameborder=\"0\" allowfullscreen=\"\"></iframe></span></p>\n', 'form-pengajuan/52/banner_path/banner.jpeg', 'Najwa', 31, 3171, 1, 1, NULL, NULL, 4, '2024-08-30 17:56:28', NULL, '2024-08-30 17:56:28');
INSERT INTO `dta_our_collections` VALUES (54, 2, 'SETELAH REVISI UU PILKADA KANDAS // SIAPA SAJA YANG MENINGGALKAN JOKOWI?', 'setelah-revisi-uu-pilkada-kandas-siapa-saja-yang-meninggalkan-jokowi', '<p><span contenteditable=\"false\" draggable=\"true\" class=\"fr-video fr-deletable fr-fvc fr-dvb fr-draggable\"><iframe width=\"640\" height=\"360\" src=\"https://www.youtube.com/embed/glj0_FU65BM?&amp;wmode=opaque&amp;rel=0\" frameborder=\"0\" allowfullscreen=\"\"></iframe></span></p>\n', 'form-pengajuan/54/banner_path/banner.jpeg', 'ILC', 31, 3175, 1, 1, NULL, NULL, 4, '2024-08-30 17:59:29', NULL, '2024-08-30 17:59:29');

-- ----------------------------
-- Table structure for dta_video
-- ----------------------------
DROP TABLE IF EXISTS `dta_video`;
CREATE TABLE `dta_video`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_content` int NOT NULL,
  `nama_video` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `url_video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status_video` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_approval` int NULL DEFAULT NULL COMMENT '0. ditolak\r\n1. menunggu persetujuan\r\n2. disetujui',
  `user_approval` int NULL DEFAULT NULL,
  `date_approval` datetime NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dta_video
-- ----------------------------
INSERT INTO `dta_video` VALUES (1, 92, 'Success Story Inkubasi Wakaf Produktif di Ciamis', NULL, 'https://www.youtube.com/watch?v=N3FO2P1ZwoE', 't', NULL, NULL, NULL, 1, '2022-11-25 09:00:09', 1, '2023-01-11 07:12:42');
INSERT INTO `dta_video` VALUES (2, 92, 'Penguatan Ekosistem Zakat dan Wakaf melalui Pondok Pesantren', NULL, 'https://www.youtube.com/watch?v=4jzUXlAjPTg', 't', NULL, NULL, NULL, 1, '2022-11-25 09:00:06', 1, '2022-11-25 09:00:06');
INSERT INTO `dta_video` VALUES (3, 92, 'Akselerasi Penguatan Zakat dan Wakaf dalam Ekosistem Ekonomi Syariah', NULL, 'https://www.youtube.com/watch?v=5eeVDCOQfOY', 't', NULL, NULL, NULL, 1, '2022-11-28 10:00:26', 1, '2022-11-28 10:00:26');
INSERT INTO `dta_video` VALUES (4, 92, 'Literasi Zakat Wakaf mengundang Anda untuk bergabung ke rapat Zoom yang terjadwal.', NULL, 'https://www.youtube.com/watch?v=ciwU5s9VvSs', 't', NULL, NULL, NULL, 1, '2022-11-29 10:00:23', 1, '2022-11-29 10:00:23');
INSERT INTO `dta_video` VALUES (5, 92, 'Sharing Program KUA Percontohan Ekonomi Umat: KUA Duren Sawit', NULL, 'https://www.youtube.com/watch?v=zhU_XlNrz9g', 't', NULL, NULL, NULL, 1, '2022-11-30 09:00:05', 1, '2022-11-30 09:00:05');
INSERT INTO `dta_video` VALUES (6, 92, 'Dialog Nasional Keagamaan dan Kebangsaan Tahun 2022: Pembukaan', NULL, 'https://www.youtube.com/watch?v=K0L_YA-rCkM', 't', NULL, NULL, NULL, 1, '2022-11-30 19:00:01', 1, '2022-11-30 19:00:01');
INSERT INTO `dta_video` VALUES (7, 92, 'Praktik Baik Zakat dan Wakaf dalam Menghijaukan Bumi', NULL, 'https://www.youtube.com/watch?v=nHJ9q435_eI', 't', NULL, NULL, NULL, 1, '2022-12-01 08:00:57', 1, '2022-12-01 08:00:57');
INSERT INTO `dta_video` VALUES (8, 92, 'Dialog Nasional Keagamaan dan Kebangsaan Tahun 2022: Dialog I', NULL, 'https://www.youtube.com/watch?v=UleVqzTCN70', 't', NULL, NULL, NULL, 1, '2022-12-01 08:30:42', 1, '2022-12-01 08:30:42');
INSERT INTO `dta_video` VALUES (9, 92, 'Dialog Nasional Keagamaan dan Kebangsaan Tahun 2022: Dialog II', NULL, 'https://www.youtube.com/watch?v=SYtwHO79zSA', 't', NULL, NULL, NULL, 1, '2022-12-01 17:00:28', 1, '2022-12-01 17:00:28');
INSERT INTO `dta_video` VALUES (10, 92, 'Dialog Nasional Keagamaan dan Kebangsaan Tahun 2022: Penutupan', NULL, 'https://www.youtube.com/watch?v=4vNOJABaUhY', 't', NULL, NULL, NULL, 1, '2022-12-01 19:30:01', 1, '2022-12-01 19:30:01');
INSERT INTO `dta_video` VALUES (11, 92, 'Success Story Inkubasi Wakaf Produktif di Pekanbaru', NULL, 'https://www.youtube.com/watch?v=IHxt-Urr8Ww', 't', NULL, NULL, NULL, 1, '2022-12-02 09:00:23', 1, '2022-12-02 09:00:23');
INSERT INTO `dta_video` VALUES (12, 92, 'Kelas Literasi Zakat dan Wakaf Sesi Ke-28', NULL, 'https://www.youtube.com/watch?v=8cUzRY-sf6E', 't', NULL, NULL, NULL, 1, '2022-12-02 09:00:52', 1, '2022-12-02 09:00:52');
INSERT INTO `dta_video` VALUES (13, 92, 'Hah? Zakat-wakaf bisa jadi gaya hidup? Caranya gimana?', NULL, 'https://www.youtube.com/watch?v=SsYRI_usFe8', 't', NULL, NULL, NULL, 1, '2022-12-06 10:00:25', 1, '2022-12-06 10:00:25');
INSERT INTO `dta_video` VALUES (14, 92, 'Tanya Jawab Seputar Sertifikasi Tanah Wakaf', NULL, 'https://www.youtube.com/watch?v=2cu2E61a4SI', 't', NULL, NULL, NULL, 1, '2022-12-07 09:00:58', 1, '2022-12-07 09:00:58');
INSERT INTO `dta_video` VALUES (15, 92, 'Success Story Inkubasi Wakaf Produktif di Palangkaraya', NULL, 'https://www.youtube.com/watch?v=13tnCgEih-U', 't', NULL, NULL, NULL, 1, '2022-12-09 09:00:46', 1, '2022-12-09 09:00:46');
INSERT INTO `dta_video` VALUES (16, 92, 'Masjid Pelopor Moderasi Beragama', NULL, 'https://www.youtube.com/watch?v=QQsqJqH13_c', 't', NULL, NULL, NULL, 1, '2022-12-14 09:00:29', 1, '2022-12-14 09:00:29');
INSERT INTO `dta_video` VALUES (17, 92, 'Success Story Inkubasi Wakaf Produktif di Aceh', NULL, 'https://www.youtube.com/watch?v=ttmS3EvkjUk', 't', NULL, NULL, NULL, 1, '2022-12-16 09:00:09', 1, '2022-12-16 09:00:09');
INSERT INTO `dta_video` VALUES (18, 92, 'Berakit ke Hulu, Berenang ke Tepian.Prestasi Dahulu, Nikah Kemudian', NULL, 'https://www.youtube.com/watch?v=IV9A9dfQWXE', 't', NULL, NULL, NULL, 1, '2022-12-22 09:00:34', 1, '2022-12-22 09:00:34');
INSERT INTO `dta_video` VALUES (19, 92, 'Success Story Inkubasi Wakaf Produktif di Bangka Selatan', NULL, 'https://www.youtube.com/watch?v=V4eiTovfJkg', 't', NULL, NULL, NULL, 1, '2022-12-23 09:00:58', 1, '2022-12-23 09:00:58');
INSERT INTO `dta_video` VALUES (20, 92, 'Success Story Pelaku UMKM KUA Percontohan Ekonomi Umat', NULL, 'https://www.youtube.com/watch?v=aLvCd33y5Uw', 't', NULL, NULL, NULL, 1, '2022-12-30 09:00:26', 1, '2022-12-30 09:00:26');

-- ----------------------------
-- Table structure for mt_kabupaten
-- ----------------------------
DROP TABLE IF EXISTS `mt_kabupaten`;
CREATE TABLE `mt_kabupaten`  (
  `id_kabupaten` int NOT NULL,
  `id_provinsi` int NOT NULL,
  `nama` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stat` int NOT NULL DEFAULT 1,
  `latitude` double NULL DEFAULT 0,
  `longitude` double NULL DEFAULT 0,
  `syscreateuser` int NULL DEFAULT NULL,
  `syscreatedate` datetime NULL DEFAULT NULL,
  `sysupdateuser` int NULL DEFAULT NULL,
  `sysupdatedate` datetime NULL DEFAULT NULL,
  `sysdeleteuser` int NULL DEFAULT NULL,
  `sysdeletedate` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_kabupaten`) USING BTREE,
  UNIQUE INDEX `id_kabupaten`(`id_kabupaten` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mt_kabupaten
-- ----------------------------
INSERT INTO `mt_kabupaten` VALUES (1101, 11, 'KAB. ACEH SELATAN', 1, 97.266999999, 3.648826001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1102, 11, 'KAB. ACEH TENGGARA', 1, 98.02925492, 3.33075417, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1103, 11, 'KAB. ACEH TIMUR', 1, 97.497695287, 5.2491983680001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1104, 11, 'KAB. ACEH TENGAH', 1, 97.312486564, 4.6046188560001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1105, 11, 'KAB. ACEH BARAT', 1, 96.26028022, 4.712376841, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1106, 11, 'KAB. ACEH BESAR', 1, 95.433590462, 5.656583637, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1107, 11, 'KAB. PIDIE', 1, 95.754190029, 5.5641409890001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1108, 11, 'KAB. ACEH UTARA', 1, 96.977076508, 5.2626645660001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1109, 11, 'KAB. SIMEULUE', 1, 95.802125117, 2.9300870170001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1110, 11, 'KAB. ACEH SINGKIL', 1, 98.015869764, 2.58194946, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1111, 11, 'KAB. BIREUEN', 1, 96.523470264, 5.199031259, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1112, 11, 'KAB. ACEH BARAT DAYA', 1, 96.72918013, 4.094131641, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1113, 11, 'KAB. GAYO LUES', 1, 97.358884571, 4.2142649460001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1114, 11, 'KAB. ACEH JAYA', 1, 95.389948262, 5.2306848870001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1115, 11, 'KAB. NAGAN RAYA', 1, 96.513716, 4.624602, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1116, 11, 'KAB. ACEH TAMIANG', 1, 98.1188436, 4.5231720510001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1117, 11, 'KAB. BENER MERIAH', 1, 96.786514272, 4.940010877, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1118, 11, 'KAB. PIDIE JAYA', 1, 96.105242273, 5.2843403530001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1171, 11, 'KOTA BANDA ACEH', 1, 95.375289144, 5.610809127, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1172, 11, 'KOTA SABANG', 1, 95.217845865, 5.907045985, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1173, 11, 'KOTA LHOKSEUMAWE', 1, 97.176250503, 5.142117297, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1174, 11, 'KOTA LANGSA', 1, 97.983817274, 4.5348140410001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1175, 11, 'KOTA SUBULUSSALAM', 1, 97.9361875, 2.9895005560001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1201, 12, 'KAB. TAPANULI TENGAH', 1, 98.279075966, 2.240913146, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1202, 12, 'KAB. TAPANULI UTARA', 1, 98.981645584, 2.3944911950001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1203, 12, 'KAB. TAPANULI SELATAN', 1, 99.589449554, 2.016701762, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1204, 12, 'KAB. NIAS', 1, 97.543550004, 1.273150001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1205, 12, 'KAB. LANGKAT', 1, 98.204264174, 4.297939905, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1206, 12, 'KAB. KARO', 1, 98.471392222, 3.2416666670001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1207, 12, 'KAB. DELI SERDANG', 1, 98.745070428, 3.5362481770001, 1, '2024-01-12 08:44:23', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1208, 12, 'KAB. SIMALUNGUN', 1, 99.565666667, 3.0789722220001, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1209, 12, 'KAB. ASAHAN', 1, 99.987010597, 2.8563800200001, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1210, 12, 'KAB. LABUHANBATU', 1, 100.321943244, 2.547683051, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1211, 12, 'KAB. DAIRI', 1, 98.578317642, 2.830022812, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1212, 12, 'KAB. TOBA', 1, 99.077666667, 2.597055556, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1213, 12, 'KAB. MANDAILING NATAL', 1, 98.972284204, 1.3452009690001, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1214, 12, 'KAB. NIAS SELATAN', 1, 97.62831974, 1.013868701, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1215, 12, 'KAB. PAKPAK BHARAT', 1, 98.467508056, 2.549219167, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1216, 12, 'KAB. HUMBANG HASUNDUTAN', 1, 98.849782944, 2.355897903, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1217, 12, 'KAB. SAMOSIR', 1, 98.894693374, 2.662939072, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1218, 12, 'KAB. SERDANG BEDAGAI', 1, 98.955757378, 3.6790174650001, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1219, 12, 'KAB. BATU BARA', 1, 99.319700928, 3.4325230050001, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1220, 12, 'KAB. PADANG LAWAS UTARA', 1, 99.84054556, 1.8010211170001, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1221, 12, 'KAB. PADANG LAWAS', 1, 100.052500022, 1.377777988, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1222, 12, 'KAB. LABUHANBATU SELATAN', 1, 100.318091996, 1.470852017, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1223, 12, 'KAB. LABUHANBATU UTARA', 1, 100.014644526, 2.735355892, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1224, 12, 'KAB. NIAS UTARA', 1, 97.350786, 1.541238, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1225, 12, 'KAB. NIAS BARAT', 1, 97.500244287, 1.1853959480001, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1271, 12, 'KOTA MEDAN', 1, 98.707018312, 3.771799614, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1272, 12, 'KOTA PEMATANGSIANTAR', 1, 99.099797411, 3.0185931550001, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1273, 12, 'KOTA SIBOLGA', 1, 98.774813889, 1.758036111, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1274, 12, 'KOTA TANJUNG BALAI', 1, 99.817909572, 3.010806286, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1275, 12, 'KOTA BINJAI', 1, 98.498225832, 3.564384627, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1276, 12, 'KOTA TEBING TINGGI', 1, 99.173956883, 3.373351803, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1277, 12, 'KOTA PADANG SIDEMPUAN', 1, 99.31968667, 1.3032172220001, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1278, 12, 'KOTA GUNUNGSITOLI', 1, 97.653279555, 1.2361892750001, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1301, 13, 'KAB. PESISIR SELATAN', 1, 100.5354134, -0.95888417599997, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1302, 13, 'KAB. SOLOK', 1, 100.705, -0.57111111099994, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1303, 13, 'KAB. SIJUNJUNG', 1, 100.82983482, -0.35842292199993, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1304, 13, 'KAB. TANAH DATAR', 1, 100.829834871, -0.35841362799994, 1, '2024-01-12 08:45:30', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1305, 13, 'KAB. PADANG PARIAMAN', 1, 100.102563198, -0.32163748999994, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1306, 13, 'KAB. AGAM', 1, 100.27481503, -0.037537043999976, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1307, 13, 'KAB. LIMA PULUH KOTA', 1, 100.430255545, 0.42100010600006, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1308, 13, 'KAB. PASAMAN', 1, 100.181194597, 0.76233333300007, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1309, 13, 'KAB. KEPULAUAN MENTAWAI', 1, 98.911144562, -0.92633178099993, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1310, 13, 'KAB. DHARMASRAYA', 1, 101.823579558, -0.97762079899996, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1311, 13, 'KAB. SOLOK SELATAN', 1, 101.426630556, -1.6775361109999, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1312, 13, 'KAB. PASAMAN BARAT', 1, 99.297300253, 0.22893585200006, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1371, 13, 'KOTA PADANG', 1, 100.484419029, -0.75274396099996, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1372, 13, 'KOTA SOLOK', 1, 100.5447733, -0.81488544399997, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1373, 13, 'KOTA SAWAHLUNTO', 1, 100.803972215, -0.56661111099993, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1374, 13, 'KOTA PADANG PANJANG', 1, 100.398141698, -0.44923226899994, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1375, 13, 'KOTA BUKITTINGGI', 1, 100.347806137, -0.27578671699996, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1376, 13, 'KOTA PAYAKUMBUH', 1, 100.644419803, -0.25633363699995, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1377, 13, 'KOTA PARIAMAN', 1, 100.12826517, -0.54958907399993, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1401, 14, 'KAB. KAMPAR', 1, 101.008287579, 0.95757376600005, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1402, 14, 'KAB. INDRAGIRI HULU', 1, 101.898709722, -0.38676527799993, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1403, 14, 'KAB. BENGKALIS', 1, 101.725228731, 1.6711379830001, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1404, 14, 'KAB. INDRAGIRI HILIR', 1, 103.487733625, 0.46027259600004, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1405, 14, 'KAB.  PELALAWAN', 1, 102.90006579, 0.72370678900006, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1406, 14, 'KAB.  ROKAN HULU', 1, 100.99323, 0.96826555600006, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1407, 14, 'KAB.  ROKAN HILIR', 1, 100.322377947, 2.546811233, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1408, 14, 'KAB. SIAK', 1, 102.182189656, 1.228297298, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1409, 14, 'KAB. KUANTAN SINGINGI', 1, 101.518901414, -0.099576028999934, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1410, 14, 'KAB. KEPULAUAN MERANTI', 1, 102.734347254, 1.022283316, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1471, 14, 'KOTA PEKANBARU', 1, 101.600944444, 0.50627777800003, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1472, 14, 'KOTA DUMAI', 1, 101.0656093, 2.2324760440001, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1501, 15, 'KAB.  KERINCI', 1, 101.426630556, -1.6775361109999, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1502, 15, 'KAB.  MERANGIN', 1, 102.475133861, -1.65011636, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1503, 15, 'KAB. SAROLANGUN', 1, 102.519333333, -1.9079166669999, 1, '2024-01-12 08:45:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1504, 15, 'KAB. BATANGHARI', 1, 103.220602778, -1.374486111, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1505, 15, 'KAB.  MUARO JAMBI', 1, 103.319217306, -1.2371845, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1506, 15, 'KAB. TANJUNG JABUNG BARAT', 1, 103.751304696, -0.98717438499995, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1507, 15, 'KAB. TANJUNG JABUNG TIMUR', 1, 103.911868668, -0.98277432799995, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1508, 15, 'KAB. BUNGO', 1, 102.470416667, -1.655277778, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1509, 15, 'KAB. TEBO', 1, 102.606666646, -1.0977777589999, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1571, 15, 'KOTA JAMBI', 1, 103.616833333, -1.5479166669999, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1572, 15, 'KOTA SUNGAI PENUH', 1, 101.279722211, -2.251, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1601, 16, 'KAB. OGAN KOMERING ULU', 1, 104.556388889, -3.8030555559999, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1602, 16, 'KAB. OGAN KOMERING ILIR', 1, 105.616656832, -2.391331975, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1603, 16, 'KAB. MUARA ENIM', 1, 103.780013887, -3.31319823, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1604, 16, 'KAB. LAHAT', 1, 103.538305, -3.547829722, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1605, 16, 'KAB. MUSI RAWAS', 1, 103.648305556, -3.2476833329999, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1606, 16, 'KAB. MUSI BANYUASIN', 1, 104.175705788, -1.81869971, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1607, 16, 'KAB. BANYUASIN', 1, 104.61796684, -2.9641201969999, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1608, 16, 'KAB. OGAN KOMERING ULU TIMUR', 1, 104.747756273, -4.2478369249999, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1609, 16, 'KAB. OGAN KOMERING ULU SELATAN', 1, 104.151293465, -4.4058227639999, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1610, 16, 'KAB. OGAN ILIR', 1, 104.349579443, -3.5313361839999, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1611, 16, 'KAB. EMPAT LAWANG', 1, 103.202161588, -3.501308278, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1612, 16, 'KAB. PENUKAL ABAB LEMATANG ILIR', 1, 104.165857641, -3.0503376849999, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1613, 16, 'KAB. MUSI RAWAS UTARA', 1, 102.877313889, -2.3205833329999, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1671, 16, 'KOTA PALEMBANG', 1, 104.618530585, -2.965822476, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1672, 16, 'KOTA PAGAR ALAM', 1, 103.37468084, -4.2116672069999, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1673, 16, 'KOTA LUBUK LINGGAU', 1, 102.966978056, -3.3623491669999, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1674, 16, 'KOTA PRABUMULIH', 1, 104.17321792, -3.328191142, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1701, 17, 'KAB. BENGKULU SELATAN', 1, 103.005959648, -4.1614809119999, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1702, 17, 'KAB. REJANG LEBONG', 1, 102.501174387, -3.4974720659999, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1703, 17, 'KAB. BENGKULU UTARA', 1, 101.867561613, -2.728778039, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1704, 17, 'KAB. KAUR', 1, 103.296966364, -4.257008933, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1705, 17, 'KAB. SELUMA', 1, 102.630443938, -3.809427554, 1, '2024-01-12 08:46:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1706, 17, 'KAB. MUKO MUKO', 1, 101.361678561, -2.3288549649999, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1707, 17, 'KAB. LEBONG', 1, 102.063888894, -2.7685194439999, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1708, 17, 'KAB. KEPAHIANG', 1, 102.530224072, -3.4945399499999, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1709, 17, 'KAB. BENGKULU TENGAH', 1, 102.421279903, -3.493732936, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1771, 17, 'KOTA BENGKULU', 1, 102.291122745, -3.740010383, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1801, 18, 'KAB. LAMPUNG SELATAN', 1, 105.408563571, -5.6221683319999, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1802, 18, 'KAB. LAMPUNG TENGAH', 1, 105.816610493, -4.650040756, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1803, 18, 'KAB. LAMPUNG UTARA', 1, 104.839776846, -4.504430407, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1804, 18, 'KAB. LAMPUNG BARAT', 1, 104.339489548, -4.8672357799999, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1805, 18, 'KAB. TULANG BAWANG', 1, 105.81821119, -4.15999378, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1806, 18, 'KAB. TANGGAMUS', 1, 105.046699219, -5.748228861, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1807, 18, 'KAB. LAMPUNG TIMUR', 1, 105.820495846, -5.5685824679999, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1808, 18, 'KAB. WAY KANAN', 1, 104.946171364, -4.192091013, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1809, 18, 'KAB. PESAWARAN', 1, 105.08305135, -5.121439347, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1810, 18, 'KAB. PRINGSEWU', 1, 105.048988692, -5.206504046, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1811, 18, 'KAB. MESUJI', 1, 105.760162778, -4.1372324999999, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1812, 18, 'KAB. TULANG BAWANG BARAT', 1, 105.125383001, -4.7262128309999, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1813, 18, 'KAB. PESISIR BARAT', 1, 103.799178981, -4.7912764549999, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1871, 18, 'KOTA BANDAR LAMPUNG', 1, 105.254966638, -5.3265777629999, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1872, 18, 'KOTA METRO', 1, 105.286849743, -5.1707668519999, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1901, 19, 'KAB. BANGKA', 1, 105.915717271, -1.501766162, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1902, 19, 'KAB. BELITUNG', 1, 107.816831296, -2.526755856, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1903, 19, 'KAB. BANGKA SELATAN', 1, 106.021971059, -2.440752258, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1904, 19, 'KAB. BANGKA TENGAH', 1, 106.111193515, -2.1535673029999, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1905, 19, 'KAB. BANGKA BARAT', 1, 105.596493902, -1.5274051979999, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1906, 19, 'KAB. BELITUNG TIMUR', 1, 107.95016308, -2.569122614, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (1971, 19, 'KOTA PANGKAL PINANG', 1, 106.158052948, -2.088202764, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (2101, 21, 'KAB. BINTAN', 1, 104.571369473, 1.2296564320001, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (2102, 21, 'KAB. KARIMUN', 1, 103.376481371, 0.89745440900003, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (2103, 21, 'KAB. NATUNA', 1, 108.223182716, 4.226711197, 1, '2024-01-12 08:46:56', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (2104, 21, 'KAB. LINGGA', 1, 104.520435325, -0.0072751919999519, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (2105, 21, 'KAB. KEPULAUAN ANAMBAS', 1, 105.696505193, 3.0629226570001, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (2171, 21, 'KOTA BATAM', 1, 104.100635501, 1.1976255860001, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (2172, 21, 'KOTA TANJUNG PINANG', 1, 104.500000103, 0.99108331900004, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3101, 31, 'KAB. ADM. KEP. SERIBU', 1, 106.480651289, -5.79316202, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3171, 31, 'KOTA ADM. JAKARTA PUSAT', 1, 106.878668, -6.1664509999999, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3172, 31, 'KOTA ADM. JAKARTA UTARA', 1, 106.96803207, -6.091125909, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3173, 31, 'KOTA ADM. JAKARTA BARAT', 1, 106.711461887, -6.096018565, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3174, 31, 'KOTA ADM. JAKARTA SELATAN', 1, 106.849049, -6.2075429999999, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3175, 31, 'KOTA ADM. JAKARTA TIMUR', 1, 106.971481098, -6.154482129, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3201, 32, 'KAB. BOGOR', 1, 106.99100455, -6.363277484, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3202, 32, 'KAB. SUKABUMI', 1, 106.741524552, -6.7155635579999, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3203, 32, 'KAB. CIANJUR', 1, 107.30214897, -6.728436953, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3204, 32, 'KAB. BANDUNG', 1, 107.914663439, -6.9527769169999, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3205, 32, 'KAB. GARUT', 1, 107.918157358, -6.9475960029999, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3206, 32, 'KAB. TASIKMALAYA', 1, 108.129236895, -7.040578175, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3207, 32, 'KAB. CIAMIS', 1, 108.385742544, -7.0735101659999, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3208, 32, 'KAB. KUNINGAN', 1, 108.760469937, -6.988018535, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3209, 32, 'KAB. CIREBON', 1, 108.539092174, -6.516445813, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3210, 32, 'KAB. MAJALENGKA', 1, 108.323585574, -6.6208170429999, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3211, 32, 'KAB. SUMEDANG', 1, 108.043124045, -6.639104528, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3212, 32, 'KAB. INDRAMAYU', 1, 108.392163454, -6.3602548979999, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3213, 32, 'KAB. SUBANG', 1, 107.853898786, -6.190761714, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3214, 32, 'KAB. PURWAKARTA', 1, 107.529403799, -6.418358086, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3215, 32, 'KAB. KARAWANG', 1, 107.64294133, -6.2155235719999, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3216, 32, 'KAB. BEKASI', 1, 107.015897326, -5.926806014, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3217, 32, 'KAB. BANDUNG BARAT', 1, 107.593772991, -6.728543998, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3218, 32, 'KAB. PANGANDARAN', 1, 108.670675542, -7.684286299, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3271, 32, 'KOTA BOGOR', 1, 106.783014161, -6.5149030119999, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3272, 32, 'KOTA SUKABUMI', 1, 106.915089035, -6.8931835989999, 1, '2024-01-12 08:47:13', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3273, 32, 'KOTA BANDUNG', 1, 107.623932763, -6.8618862829999, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3274, 32, 'KOTA CIREBON', 1, 108.573234663, -6.7114312489999, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3275, 32, 'KOTA BEKASI', 1, 106.99100455, -6.363277484, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3276, 32, 'KOTA DEPOK', 1, 106.840116836, -6.3358981829999, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3277, 32, 'KOTA CIMAHI', 1, 107.571572977, -6.882137836, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3278, 32, 'KOTA TASIKMALAYA', 1, 108.309448245, -7.337143333, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3279, 32, 'KOTA BANJAR', 1, 108.66208738, -7.352499693, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3301, 33, 'KAB. CILACAP', 1, 108.657525612, -7.156950191, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3302, 33, 'KAB. BANYUMAS', 1, 109.361701255, -7.485382505, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3303, 33, 'KAB. PURBALINGGA', 1, 109.532358784, -7.2313907289999, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3304, 33, 'KAB. BANJARNEGARA', 1, 109.916905621, -7.189850484, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3305, 33, 'KAB. KEBUMEN', 1, 109.758145881, -7.473656451, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3306, 33, 'KAB. PURWOREJO', 1, 110.044286504, -7.53474762, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3307, 33, 'KAB. WONOSOBO', 1, 109.922675106, -7.186791334, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3308, 33, 'KAB. MAGELANG', 1, 110.439345723, -7.4535826329999, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3309, 33, 'KAB. BOYOLALI', 1, 110.838813386, -7.262613685, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3310, 33, 'KAB. KLATEN', 1, 110.702649722, -7.5935775, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3311, 33, 'KAB. SUKOHARJO', 1, 110.770906783, -7.545251564, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3312, 33, 'KAB. WONOGIRI', 1, 111.184506981, -7.7122837439999, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3313, 33, 'KAB. KARANGANYAR', 1, 110.825439534, -7.4572712909999, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3314, 33, 'KAB. SRAGEN', 1, 111.148724286, -7.2644587309999, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3315, 33, 'KAB. GROBOGAN', 1, 111.097964733, -6.930380322, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3316, 33, 'KAB. BLORA', 1, 111.263377854, -6.855764289, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3317, 33, 'KAB. REMBANG', 1, 111.492474677, -6.6206395859999, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3318, 33, 'KAB. PATI', 1, 111.234176063, -6.687284427, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3319, 33, 'KAB. KUDUS', 1, 110.902368002, -6.626481175, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3320, 33, 'KAB. JEPARA', 1, 110.633701405, -6.6775217489999, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3321, 33, 'KAB. DEMAK', 1, 110.758323418, -6.7942207049999, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3322, 33, 'KAB. SEMARANG', 1, 110.460201147, -7.079398273, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3323, 33, 'KAB. TEMANGGUNG', 1, 110.25675, -7.19425, 1, '2024-01-12 08:48:10', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3324, 33, 'KAB. KENDAL', 1, 110.281716496, -6.911115955, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3325, 33, 'KAB. BATANG', 1, 109.710856503, -6.867010743, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3326, 33, 'KAB. PEKALONGAN', 1, 109.663139076, -6.850634987, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3327, 33, 'KAB. PEMALANG', 1, 109.367145375, -6.8609993279999, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3328, 33, 'KAB. TEGAL', 1, 109.193883898, -6.86072188, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3329, 33, 'KAB. BREBES', 1, 109.102127799, -6.840226361, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3371, 33, 'KOTA MAGELANG', 1, 110.225214476, -7.433925637, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3372, 33, 'KOTA SURAKARTA', 1, 110.815410233, -7.522693798, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3373, 33, 'KOTA SALATIGA', 1, 110.484691677, -7.286156994, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3374, 33, 'KOTA SEMARANG', 1, 110.409376393, -6.9471923749999, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3375, 33, 'KOTA PEKALONGAN', 1, 109.710856503, -6.867010743, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3376, 33, 'KOTA TEGAL', 1, 109.13062164, -6.8469706179999, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3401, 34, 'KAB. KULON PROGO', 1, 110.269936497, -7.706016618, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3402, 34, 'KAB. BANTUL', 1, 110.351089015, -7.768220296, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3403, 34, 'KAB. GUNUNGKIDUL', 1, 110.56492373, -7.7828954579999, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3404, 34, 'KAB. SLEMAN', 1, 110.543589625, -7.7925634599999, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3471, 34, 'KOTA YOGYAKARTA', 1, 110.397126886, -7.788483851, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3501, 35, 'KAB. PACITAN', 1, 111.185114562, -7.9181436929999, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3502, 35, 'KAB. PONOROGO', 1, 111.750535312, -7.7990964589999, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3503, 35, 'KAB. TRENGGALEK', 1, 111.752650284, -7.8869532099999, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3504, 35, 'KAB. TULUNGAGUNG', 1, 111.789131148, -7.8343428969999, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3505, 35, 'KAB. BLITAR', 1, 112.456547572, -7.932125121, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3506, 35, 'KAB. KEDIRI', 1, 112.417342889, -7.7644515559999, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3507, 35, 'KAB. MALANG', 1, 112.352554281, -7.763930699, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3508, 35, 'KAB. LUMAJANG', 1, 113.264866227, -7.8992122239999, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3509, 35, 'KAB. JEMBER', 1, 113.665164561, -7.968540474, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3510, 35, 'KAB. BANYUWANGI', 1, 114.303558081, -7.884679966, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3511, 35, 'KAB. BONDOWOSO', 1, 114.224342097, -7.986662129, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3512, 35, 'KAB. SITUBONDO', 1, 114.0110147, -7.6275653289999, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3513, 35, 'KAB. PROBOLINGGO', 1, 113.318579756, -7.7720552389999, 1, '2024-01-12 08:48:20', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3514, 35, 'KAB. PASURUAN', 1, 112.869601526, -7.5716316909999, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3515, 35, 'KAB. SIDOARJO', 1, 112.838929754, -7.330238035, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3516, 35, 'KAB. MOJOKERTO', 1, 112.494606534, -7.408522239, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3517, 35, 'KAB. JOMBANG', 1, 112.345796207, -7.3450628329999, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3518, 35, 'KAB. NGANJUK', 1, 112.069290123, -7.3970154959999, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3519, 35, 'KAB. MADIUN', 1, 111.797035181, -7.4613308429999, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3520, 35, 'KAB. MAGETAN', 1, 111.511433814, -7.538332394, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3521, 35, 'KAB. NGAWI', 1, 111.205733199, -7.245124501, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3522, 35, 'KAB. BOJONEGORO', 1, 112.152200343, -7.109419369, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3523, 35, 'KAB. TUBAN', 1, 112.170683656, -6.8972576919999, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3524, 35, 'KAB. LAMONGAN', 1, 112.333678115, -6.8612068039999, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3525, 35, 'KAB. GRESIK', 1, 112.567179494, -6.85627161, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3526, 35, 'KAB. BANGKALAN', 1, 113.034329701, -6.879638158, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3527, 35, 'KAB. SAMPANG', 1, 113.416780516, -6.886782131, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3528, 35, 'KAB. PAMEKASAN', 1, 113.642532605, -6.8875820229999, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3529, 35, 'KAB. SUMENEP', 1, 113.909472099, -6.863724142, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3571, 35, 'KOTA KEDIRI', 1, 112.009479728, -7.7718834259999, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3572, 35, 'KOTA BLITAR', 1, 112.186407983, -8.0564111959999, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3573, 35, 'KOTA MALANG', 1, 112.634242561, -7.914992484, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3574, 35, 'KOTA PROBOLINGGO', 1, 113.22723145, -7.724617963, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3575, 35, 'KOTA PASURUAN', 1, 112.95314206, -7.621795382, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3576, 35, 'KOTA MOJOKERTO', 1, 112.457512922, -7.456762913, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3577, 35, 'KOTA MADIUN', 1, 111.550927998, -7.595218912, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3578, 35, 'KOTA SURABAYA', 1, 112.679514887, -7.192164142, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3579, 35, 'KOTA BATU', 1, 112.589773292, -7.7649577399999, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3601, 36, 'KAB. PANDEGLANG', 1, 105.617825309, -6.612777808, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3602, 36, 'KAB. LEBAK', 1, 105.894490112, -6.833526169, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3603, 36, 'KAB. TANGERANG', 1, 106.467973105, -6.041718348, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3604, 36, 'KAB. SERANG', 1, 105.912960862, -6.0541092449999, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3671, 36, 'KOTA TANGERANG', 1, 106.736782278, -6.223801667, 1, '2024-01-12 08:48:29', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3672, 36, 'KOTA CILEGON', 1, 105.980647568, -5.9933671319999, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3673, 36, 'KOTA SERANG', 1, 106.21639406, -6.0162244049999, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (3674, 36, 'KOTA TANGERANG SELATAN', 1, 106.74819884, -6.2500812439999, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5101, 51, 'KAB. JEMBRANA', 1, 114.439099289, -8.160688826, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5102, 51, 'KAB. TABANAN', 1, 115.189233752, -8.2549366329999, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5103, 51, 'KAB. BADUNG', 1, 115.229655703, -8.2402042319999, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5104, 51, 'KAB. GIANYAR', 1, 115.357626214, -8.520943173, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5105, 51, 'KAB. KLUNGKUNG', 1, 115.563235973, -8.672164956, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5106, 51, 'KAB. BANGLI', 1, 115.434376135, -8.1806469229999, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5107, 51, 'KAB. KARANGASEM', 1, 115.457604474, -8.1676847429999, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5108, 51, 'KAB. BULELENG', 1, 115.183758312, -8.061683489, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5171, 51, 'KOTA DENPASAR', 1, 115.234999912, -8.591538898, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5201, 52, 'KAB. LOMBOK BARAT', 1, 116.335573481, -8.4191754309999, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5202, 52, 'KAB. LOMBOK TENGAH', 1, 116.352294598, -8.410407638, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5203, 52, 'KAB. LOMBOK TIMUR', 1, 116.546923563, -8.8979202789999, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5204, 52, 'KAB. SUMBAWA', 1, 117.155063029, -8.364287025, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5205, 52, 'KAB. DOMPU', 1, 117.765494399, -8.1435577509999, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5206, 52, 'KAB. BIMA', 1, 119.098439912, -8.750510108, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5207, 52, 'KAB. SUMBAWA BARAT', 1, 116.822590001, -8.51539101, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5208, 52, 'KAB. LOMBOK UTARA', 1, 116.371203026, -8.210415983, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5271, 52, 'KOTA MATARAM', 1, 116.072896506, -8.552784306, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5272, 52, 'KOTA BIMA', 1, 118.733231029, -8.3403743969999, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5301, 53, 'KAB. KUPANG', 1, 123.639631761, -10.221954115, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5302, 53, 'KAB TIMOR TENGAH SELATAN', 1, 124.189769448, -9.483247778, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5303, 53, 'KAB. TIMOR TENGAH UTARA', 1, 124.819515259, -9.345278224, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5304, 53, 'KAB. BELU', 1, 125.010787759, -9.300530356, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5305, 53, 'KAB. ALOR', 1, 124.529686666, -8.1227233819999, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5306, 53, 'KAB. FLORES TIMUR', 1, 122.866590433, -8.063357604, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5307, 53, 'KAB. SIKKA', 1, 122.636395759, -8.3834206519999, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5308, 53, 'KAB. ENDE', 1, 122.025000356, -8.442835768, 1, '2024-01-12 08:48:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5309, 53, 'KAB. NGADA', 1, 120.947305078, -8.343802372, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5310, 53, 'KAB. MANGGARAI', 1, 120.428386557, -8.240945075, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5311, 53, 'KAB. SUMBA TIMUR', 1, 119.938941728, -9.278783142, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5312, 53, 'KAB. SUMBA BARAT', 1, 119.402382037, -9.3815104609999, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5313, 53, 'KAB. LEMBATA', 1, 123.782658478, -8.1708665539999, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5314, 53, 'KAB. ROTE NDAO', 1, 123.378683682, -10.431041801, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5315, 53, 'KAB. MANGGARAI BARAT', 1, 120.284525757, -8.2823470619999, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5316, 53, 'KAB. NAGEKEO', 1, 121.18735212, -8.440735687, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5317, 53, 'KAB. SUMBA TENGAH', 1, 119.877634203, -9.371952182, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5318, 53, 'KAB. SUMBA BARAT DAYA', 1, 119.317406846, -9.36772895, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5319, 53, 'KAB. MANGGARAI TIMUR', 1, 120.59433777, -8.2565680659999, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5320, 53, 'KAB. SABU RAIJUA', 1, 121.952893612, -10.433817912, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5321, 53, 'KAB. MALAKA', 1, 124.807462642, -9.788322718, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (5371, 53, 'KOTA KUPANG', 1, 123.639726489, -10.221959656, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6101, 61, 'KAB. SAMBAS', 1, 109.632932684, 2.031603687, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6102, 61, 'KAB. MEMPAWAH', 1, 109.15232565, 0.68056772300002, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6103, 61, 'KAB. SANGGAU', 1, 110.80321541, 0.90060474700005, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6104, 61, 'KAB. KETAPANG', 1, 110.483353986, -0.32897118899996, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6105, 61, 'KAB. SINTANG', 1, 111.528984127, 0.95437413500002, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6106, 61, 'KAB. KAPUAS HULU', 1, 114.205522583, 1.4102283230001, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6107, 61, 'KAB. BENGKAYANG', 1, 109.756920905, 1.5369594650001, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6108, 61, 'KAB. LANDAK', 1, 110.135445586, 1.0202953950001, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6109, 61, 'KAB. SEKADAU', 1, 111.095057118, -0.50397128199995, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6110, 61, 'KAB. MELAWI', 1, 112.462751389, -0.66908194399997, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6111, 61, 'KAB. KAYONG UTARA', 1, 110.013312755, -0.72931331099994, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6112, 61, 'KAB. KUBU RAYA', 1, 109.458928025, 0.22255139800006, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6171, 61, 'KOTA PONTIANAK', 1, 109.370269619, 0.021828299000049, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6172, 61, 'KOTA SINGKAWANG', 1, 109.175851194, 0.96243211600006, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6201, 62, 'KAB. KOTAWARINGIN BARAT', 1, 111.932639094, -1.6662691129999, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6202, 62, 'KAB. KOTAWARINGIN TIMUR', 1, 112.539842437, -1.192943586, 1, '2024-01-12 08:48:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6203, 62, 'KAB. KAPUAS', 1, 113.989114679, -0.38403158899996, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6204, 62, 'KAB. BARITO SELATAN', 1, 115.454545749, -1.46157891, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6205, 62, 'KAB. BARITO UTARA', 1, 115.294877662, -0.052359539999941, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6206, 62, 'KAB. KATINGAN', 1, 113.153905374, -0.47856837399996, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6207, 62, 'KAB. SERUYAN', 1, 112.175416666, -0.72556944399997, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6208, 62, 'KAB. SUKAMARA', 1, 111.156081901, -2.0194116879999, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6209, 62, 'KAB. LAMANDAU', 1, 111.44598333, -1.245263888, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6210, 62, 'KAB. GUNUNG MAS', 1, 113.76, -0.48166111099994, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6211, 62, 'KAB. PULANG PISAU', 1, 113.973566747, -1.520599214, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6212, 62, 'KAB. MURUNG RAYA', 1, 115.013026204, -0.26618682299994, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6213, 62, 'KAB. BARITO TIMUR', 1, 115.362063631, -1.6204269739999, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6271, 62, 'KOTA PALANGKARAYA', 1, 113.797972254, -1.604061159, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6301, 63, 'KAB. TANAH LAUT', 1, 114.738172663, -3.5106385889999, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6302, 63, 'KAB. KOTABARU', 1, 116.190056052, -2.3078627909999, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6303, 63, 'KAB. BANJAR', 1, 115.586895344, -2.8861270479999, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6304, 63, 'KAB. BARITO KUALA', 1, 114.859502664, -2.526507211, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6305, 63, 'KAB. TAPIN', 1, 114.864554483, -2.5282439499999, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6306, 63, 'KAB. HULU SUNGAI SELATAN', 1, 115.154722982, -2.554625067, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6307, 63, 'KAB. HULU SUNGAI TENGAH', 1, 115.750583026, -2.5323905559999, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6308, 63, 'KAB. HULU SUNGAI UTARA', 1, 115.348673229, -2.339943316, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6309, 63, 'KAB. TABALONG', 1, 115.694888889, -2.040527778, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6310, 63, 'KAB. TANAH BUMBU', 1, 115.588249511, -3.0165152599999, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6311, 63, 'KAB. BALANGAN', 1, 115.694888889, -2.040527778, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6371, 63, 'KOTA BANJARMASIN', 1, 114.638611111, -3.2756111109999, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6372, 63, 'KOTA BANJARBARU', 1, 114.894287682, -3.544958698, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6401, 64, 'KAB. PASER', 1, 116.444121054, -0.99209656899995, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6402, 64, 'KAB. KUTAI KARTANEGARA', 1, 115.976114, 1.529506, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6403, 64, 'KAB. BERAU', 1, 118.535392554, 1.358789615, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6407, 64, 'KAB. KUTAI BARAT', 1, 116.500861, -0.85813899999994, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6408, 64, 'KAB. KUTAI TIMUR', 1, 116.294423536, 1.865891488, 1, '2024-01-12 08:48:57', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6409, 64, 'KAB. PENAJAM PASER UTARA', 1, 116.708932, -0.80536335699998, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6411, 64, 'KAB. MAHAKAM ULU', 1, 114.561647433, 1.433781454, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6471, 64, 'KOTA BALIKPAPAN', 1, 116.848064, -1.0140469999999, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6472, 64, 'KOTA SAMARINDA', 1, 117.275081503, -0.58351958899993, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6474, 64, 'KOTA BONTANG', 1, 117.504539332, 0.20412018400003, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6501, 65, 'KAB. BULUNGAN', 1, 117.305077594, 3.4093828540001, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6502, 65, 'KAB. MALINAU', 1, 116.134138, 4.121293, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6503, 65, 'KAB. NUNUKAN', 1, 116.568780125, 4.408461695, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6504, 65, 'KAB. TANA TIDUNG', 1, 117.237468096, 3.761237271, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (6571, 65, 'KOTA TARAKAN', 1, 117.618648306, 3.438541292, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7101, 71, 'KAB. BOLAANG MONGONDOW', 1, 124.298535555, 1.001743923, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7102, 71, 'KAB. MINAHASA', 1, 124.890071313, 1.46426626, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7103, 71, 'KAB. KEPULAUAN SANGIHE', 1, 125.448803166, 3.736675936, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7104, 71, 'KAB. KEPULAUAN TALAUD', 1, 126.747664445, 4.545618755, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7105, 71, 'KAB. MINAHASA SELATAN', 1, 124.565699277, 1.378204254, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7106, 71, 'KAB. MINAHASA UTARA', 1, 124.992138501, 1.7508263620001, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7107, 71, 'KAB. MINAHASA TENGGARA', 1, 124.704727693, 1.1177902530001, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7108, 71, 'KAB. BOLAANG MONGONDOW UTARA', 1, 123.248539801, 0.95875808600005, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7109, 71, 'KAB. KEP. SIAU TAGULANDANG BIARO', 1, 125.40590429, 2.8117368210001, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7110, 71, 'KAB. BOLAANG MONGONDOW TIMUR', 1, 124.649989928, 0.95679809300003, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7111, 71, 'KAB. BOLAANG MONGONDOW SELATAN', 1, 124.344061848, 0.60885040000005, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7171, 71, 'KOTA MANADO', 1, 124.821214657, 1.582846842, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7172, 71, 'KOTA BITUNG', 1, 125.145701209, 1.599961959, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7173, 71, 'KOTA TOMOHON', 1, 124.84036287, 1.3967790300001, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7174, 71, 'KOTA KOTAMOBAGU', 1, 124.357122113, 0.75533507100005, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7201, 72, 'KAB. BANGGAI', 1, 123.087987901, -0.57661804599996, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7202, 72, 'KAB. POSO', 1, 120.584673205, -1.1112108629999, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7203, 72, 'KAB. DONGGALA', 1, 120.10262034, 0.74852952700007, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7204, 72, 'KAB. TOLI TOLI', 1, 120.910637033, 1.3494549600001, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7205, 72, 'KAB. BUOL', 1, 121.443454587, 1.3133931, 1, '2024-01-12 08:49:05', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7206, 72, 'KAB. MOROWALI', 1, 121.544234179, -2.1499894799999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7207, 72, 'KAB. BANGGAI KEPULAUAN', 1, 123.283563135, -1.319011497, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7208, 72, 'KAB. PARIGI MOUTONG', 1, 121.020956098, 0.70756402000006, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7209, 72, 'KAB. TOJO UNA UNA', 1, 121.654836209, -0.80426693799996, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7210, 72, 'KAB. SIGI', 1, 120.354166667, -1.185166667, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7211, 72, 'KAB. BANGGAI LAUT', 1, 123.581504653, -1.7080579089999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7212, 72, 'KAB. MOROWALI UTARA', 1, 122.001925674, -1.4008371099999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7271, 72, 'KOTA PALU', 1, 119.860868994, -0.71835750199995, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7301, 73, 'KAB. KEPULAUAN SELAYAR', 1, 120.494664422, -5.7678518009999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7302, 73, 'KAB. BULUKUMBA', 1, 120.265442149, -5.2874594909999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7303, 73, 'KAB. BANTAENG', 1, 119.925025766, -5.552351103, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7304, 73, 'KAB. JENEPONTO', 1, 119.939410326, -5.39849522, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7305, 73, 'KAB. TAKALAR', 1, 119.561384872, -5.291127246, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7306, 73, 'KAB. GOWA', 1, 119.882112932, -5.092929894, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7307, 73, 'KAB. SINJAI', 1, 120.130079025, -5.0444531809999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7308, 73, 'KAB. BONE', 1, 120.361380283, -4.222073969, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7309, 73, 'KAB. MAROS', 1, 119.51856667, -5.1652346249999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7310, 73, 'KAB. PANGKAJENE DAN KEPULAUAN', 1, 119.600132751, -4.5585285459999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7311, 73, 'KAB. BARRU', 1, 119.620814167, -4.0673591569999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7312, 73, 'KAB. SOPPENG', 1, 119.863184724, -4.1047798289999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7313, 73, 'KAB. WAJO', 1, 120.240075048, -3.673634023, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7314, 73, 'KAB. SIDENRENG RAPPANG', 1, 120.320943412, -3.6467520739999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7315, 73, 'KAB. PINRANG', 1, 119.559969105, -3.2705668049999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7316, 73, 'KAB. ENREKANG', 1, 120.041416667, -3.3683055559999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7317, 73, 'KAB. LUWU', 1, 120.083131762, -3.0316355329999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7318, 73, 'KAB. TANA TORAJA', 1, 119.681716389, -2.756215278, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7322, 73, 'KAB. LUWU UTARA', 1, 120.094516956, -1.9674566329999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7324, 73, 'KAB. LUWU TIMUR', 1, 121.00946292, -2.8662080399999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7326, 73, 'KAB. TORAJA UTARA', 1, 119.771607906, -2.5943731249999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7371, 73, 'KOTA MAKASSAR', 1, 119.484861638, -5.0600113089999, 1, '2024-01-12 08:49:15', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7372, 73, 'KOTA PAREPARE', 1, 119.663885431, -3.960589833, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7373, 73, 'KOTA PALOPO', 1, 120.183192351, -2.881381194, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7401, 74, 'KAB. KOLAKA', 1, 121.374128533, -3.634300148, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7402, 74, 'KAB. KONAWE', 1, 121.639728383, -2.8950206819999, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7403, 74, 'KAB. MUNA', 1, 122.671454479, -4.610732873, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7404, 74, 'KAB. BUTON', 1, 122.841651932, -5.082848648, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7405, 74, 'KAB. KONAWE SELATAN', 1, 122.280332958, -4.0005754229999, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7406, 74, 'KAB. BOMBANA', 1, 121.980058845, -4.4231554199999, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7407, 74, 'KAB. WAKATOBI', 1, 123.579161064, -5.245417652, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7408, 74, 'KAB. KOLAKA UTARA', 1, 121.09908918, -2.7865989179999, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7409, 74, 'KAB. KONAWE UTARA', 1, 122.199367822, -3.0917893769999, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7410, 74, 'KAB. BUTON UTARA', 1, 123.075417354, -4.3665283, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7411, 74, 'KAB. KOLAKA TIMUR', 1, 121.430972234, -3.275444165, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7412, 74, 'KAB. KONAWE KEPULAUAN', 1, 123.022780353, -3.98048354, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7413, 74, 'KAB. MUNA BARAT', 1, 122.60064794, -4.641411772, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7414, 74, 'KAB. BUTON TENGAH', 1, 122.316831013, -5.142288794, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7415, 74, 'KAB. BUTON SELATAN', 1, 122.743857875, -5.481707693, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7471, 74, 'KOTA KENDARI', 1, 122.496643271, -3.902812334, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7472, 74, 'KOTA BAU BAU', 1, 122.681223313, -5.3223991469999, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7501, 75, 'KAB. GORONTALO', 1, 123.070064156, 0.80299021600007, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7502, 75, 'KAB. BOALEMO', 1, 122.248137042, 0.91350197000003, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7503, 75, 'KAB. BONE BOLANGO', 1, 123.248983888, 0.74777669700006, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7504, 75, 'KAB. POHUWATO', 1, 121.852551106, 0.99310473000003, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7505, 75, 'KAB. GORONTALO UTARA', 1, 122.334787152, 1.040484893, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7571, 75, 'KOTA GORONTALO', 1, 123.086796141, 0.47967977700006, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7601, 76, 'KAB. PASANGKAYU', 1, 119.560762177, -0.84952218699993, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7602, 76, 'KAB. MAMUJU', 1, 119.547590302, -2.120420188, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7603, 76, 'KAB. MAMASA', 1, 119.583764444, -2.7479491629999, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7604, 76, 'KAB. POLEWALI MANDAR', 1, 119.262548983, -3.0729616949999, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7605, 76, 'KAB. MAJENE', 1, 118.947310948, -2.9200168789999, 1, '2024-01-12 08:49:26', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (7606, 76, 'KAB. MAMUJU TENGAH', 1, 119.440921149, -1.7327831769999, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8101, 81, 'KAB. MALUKU TENGAH', 1, 129.527863863, -2.7730253579999, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8102, 81, 'KAB. MALUKU TENGGARA', 1, 133.1571076, -5.2763246379999, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8103, 81, 'KAB. KEPULAUAN TANIMBAR', 1, 131.650654628, -7.117603512, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8104, 81, 'KAB. BURU', 1, 126.712431711, -3.0566899319999, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8105, 81, 'KAB. SERAM BAGIAN TIMUR', 1, 130.311523755, -2.971674288, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8106, 81, 'KAB. SERAM BAGIAN BARAT', 1, 128.091756341, -3.039579908, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8107, 81, 'KAB. KEPULAUAN ARU', 1, 134.110346776, -6.160244039, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8108, 81, 'KAB. MALUKU BARAT DAYA', 1, 126.626290001, -7.5568700009999, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8109, 81, 'KAB. BURU SELATAN', 1, 126.099017559, -3.1123565349999, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8171, 81, 'KOTA AMBON', 1, 128.252296139, -3.5844994719999, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8172, 81, 'KOTA TUAL', 1, 132.79526861, -5.569409799, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8201, 82, 'KAB. HALMAHERA BARAT', 1, 127.741923373, 1.969963174, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8202, 82, 'KAB. HALMAHERA TENGAH', 1, 127.997021485, 0.65636154800006, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8203, 82, 'KAB. HALMAHERA UTARA', 1, 127.95704702, 2.220801271, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8204, 82, 'KAB. HALMAHERA SELATAN', 1, 127.642757291, -1.330956979, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8205, 82, 'KAB. KEPULAUAN SULA', 1, 125.409834829, -1.777861404, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8206, 82, 'KAB. HALMAHERA TIMUR', 1, 128.670468101, 1.5898002110001, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8207, 82, 'KAB. PULAU MOROTAI', 1, 128.591893526, 2.611850804, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8208, 82, 'KAB. PULAU TALIABU', 1, 124.526588786, -1.6354496659999, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8271, 82, 'KOTA TERNATE', 1, 127.326883689, 0.86782733600006, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (8272, 82, 'KOTA TIDORE KEPULAUAN', 1, 127.618734683, 0.78761779100006, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9103, 91, 'KAB. JAYAPURA', 1, 140.114576801, -2.324989129, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9105, 91, 'KAB. KEPULAUAN YAPEN', 1, 135.47344788, -1.5985959519999, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9106, 91, 'KAB. BIAK NUMFOR', 1, 135.811426428, -0.68533760299994, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9110, 91, 'KAB. SARMI', 1, 138.302290699, -1.6935072489999, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9111, 91, 'KAB. KEEROM', 1, 141.002735357, -2.839261758, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9115, 91, 'KAB. WAROPEN', 1, 136.588902262, -2.195250259, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9119, 91, 'KAB. SUPIORI', 1, 135.391620448, -0.62047181899993, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9120, 91, 'KAB. MAMBERAMO RAYA', 1, 137.93397354, -1.458477552, 1, '2024-01-12 08:49:37', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9171, 91, 'KOTA JAYAPURA', 1, 140.663291716, -2.473814212, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9202, 92, 'KAB. MANOKWARI', 1, 133.946604877, -0.71387914699994, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9203, 92, 'KAB. FAK FAK', 1, 132.048724194, -2.7751911399999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9206, 92, 'KAB. TELUK BINTUNI', 1, 133.199061114, -1.2432505419999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9207, 92, 'KAB. TELUK WONDAMA', 1, 134.09960218, -1.7761783089999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9208, 92, 'KAB. KAIMANA', 1, 133.993336743, -2.7870956739999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9211, 92, 'KAB. MANOKWARI SELATAN', 1, 134.198614184, -1.214126899, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9212, 92, 'KAB. PEGUNUNGAN ARFAK', 1, 134.04447513, -1.240761579, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9301, 93, 'KAB. MERAUKE', 1, 140.850362878, -6.617494118, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9302, 93, 'KAB. BOVEN DIGOEL', 1, 141.000747244, -5.1689955909999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9303, 93, 'KAB. MAPPI', 1, 139.816555919, -5.582061992, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9304, 93, 'KAB. ASMAT', 1, 137.87769431, -4.572762569, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9401, 94, 'KAB. NABIRE', 1, 136.019727337, -2.7118504449999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9402, 94, 'KAB. PUNCAK JAYA', 1, 138.176784723, -3.1100524139999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9403, 94, 'KAB. PANIAI', 1, 136.392073715, -3.3558172269999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9404, 94, 'KAB. MIMIKA', 1, 137.116466946, -4.0310364329999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9405, 94, 'KAB. PUNCAK', 1, 137.683382164, -3.048749658, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9406, 94, 'KAB. DOGIYAI', 1, 136.126272398, -3.8567983579999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9407, 94, 'KAB. INTAN JAYA', 1, 136.869357862, -3.252047584, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9408, 94, 'KAB. DEIYAI', 1, 136.922599743, -4.128472615, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9501, 95, 'KAB. JAYAWIJAYA', 1, 139.017177708, -3.8638304249999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9502, 95, 'KAB PEGUNUNGAN BINTANG', 1, 140.384221552, -3.736524908, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9503, 95, 'KAB. YAHUKIMO', 1, 140.125544409, -3.6955091729999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9504, 95, 'KAB. TOLIKARA', 1, 138.176784723, -3.1100524139999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9505, 95, 'KAB. MAMBERAMO TENGAH', 1, 139.065465983, -3.2763831239999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9506, 95, 'KAB. YALIMO', 1, 140.125544409, -3.6955091729999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9507, 95, 'KAB. LANNY JAYA', 1, 138.620808237, -3.768846696, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9508, 95, 'KAB. NDUGA', 1, 138.64278958, -4.2357138049999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9601, 96, 'KAB. SORONG', 1, 131.778136867, -1.5735310859999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9602, 96, 'KAB. SORONG SELATAN', 1, 132.598825601, -2.1988046119999, 1, '2024-01-12 08:49:47', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9603, 96, 'KAB. RAJA AMPAT', 1, 130.571217936, -0.40059500299998, 1, '2024-01-12 08:50:02', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9604, 96, 'KAB. TAMBRAUW', 1, 132.42020759, -0.34466366399994, 1, '2024-01-12 08:50:02', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9605, 96, 'KAB. MAYBRAT', 1, 132.904765322, -1.293766321, 1, '2024-01-12 08:50:02', NULL, NULL, NULL, NULL);
INSERT INTO `mt_kabupaten` VALUES (9671, 96, 'KOTA SORONG', 1, 131.355889327, -0.78199004799995, 1, '2024-01-12 08:50:02', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for mt_provinsi
-- ----------------------------
DROP TABLE IF EXISTS `mt_provinsi`;
CREATE TABLE `mt_provinsi`  (
  `id_provinsi` int NOT NULL,
  `nama` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stat` int NOT NULL DEFAULT 1,
  `latitude` double NOT NULL DEFAULT 0,
  `longitude` double NOT NULL DEFAULT 0,
  `syscreateuser` int NULL DEFAULT NULL,
  `syscreatedate` datetime NULL DEFAULT NULL,
  `sysupdateuser` int NULL DEFAULT NULL,
  `sysupdatedate` datetime NULL DEFAULT NULL,
  `sysdeleteuser` int NULL DEFAULT NULL,
  `sysdeletedate` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`) USING BTREE,
  UNIQUE INDEX `id_provinsi`(`id_provinsi` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mt_provinsi
-- ----------------------------
INSERT INTO `mt_provinsi` VALUES (11, 'ACEH', 1, 96.523909472, 5.199804127, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (12, 'SUMATERA UTARA', 1, 98.204264174, 4.297939905, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (13, 'SUMATERA BARAT', 1, 99.297300253, 0.22893585200006, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (14, 'RIAU', 1, 103.487733625, 0.46027259600004, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (15, 'JAMBI', 1, 103.444769515, -0.73154875199998, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (16, 'SUMATERA SELATAN', 1, 104.422768751, -1.6316365329999, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (17, 'BENGKULU', 1, 101.361678561, -2.3288549649999, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (18, 'LAMPUNG', 1, 105.046699219, -5.748228861, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (19, 'KEPULAUAN BANGKA BELITUNG', 1, 105.915717271, -1.501766162, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (21, 'KEPULAUAN RIAU', 1, 108.227652239, 4.2184694530001, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (31, 'DKI JAKARTA', 1, 106.96803207, -6.091125909, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (32, 'JAWA BARAT', 1, 107.855344734, -6.1907790729999, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (33, 'JAWA TENGAH', 1, 109.13062164, -6.8469706179999, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (34, 'DAERAH ISTIMEWA YOGYAKARTA', 1, 110.454458155, -7.571705842, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (35, 'JAWA TIMUR', 1, 112.567179494, -6.85627161, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (36, 'BANTEN', 1, 105.617825309, -6.612777808, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (51, 'BALI', 1, 115.183758312, -8.061683489, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (52, 'NUSA TENGGARA BARAT', 1, 119.098439912, -8.750510108, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (53, 'NUSA TENGGARA TIMUR', 1, 122.866590433, -8.063357604, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (61, 'KALIMANTAN BARAT', 1, 109.632932684, 2.031603687, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (62, 'KALIMANTAN TENGAH', 1, 114.925575648, 0.77173680800007, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (63, 'KALIMANTAN SELATAN', 1, 115.757998453, -1.3149127999999, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (64, 'KALIMANTAN TIMUR', 1, 118.535392554, 1.358789615, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (65, 'KALIMANTAN UTARA', 1, 116.568780125, 4.408461695, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (71, 'SULAWESI UTARA', 1, 124.991052789, 1.751059776, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (72, 'SULAWESI TENGAH', 1, 119.860868994, -0.71835750199995, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (73, 'SULAWESI SELATAN', 1, 119.925551972, -5.552500342, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (74, 'SULAWESI TENGGARA', 1, 121.09908918, -2.7865989179999, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (75, 'GORONTALO', 1, 122.334787152, 1.040484893, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (76, 'SULAWESI BARAT', 1, 119.559975284, -0.84919530199994, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (81, 'MALUKU', 1, 128.091756341, -3.039579908, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (82, 'MALUKU UTARA', 1, 127.95704702, 2.220801271, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (91, 'P A P U A', 1, 137.933523822, -1.464595146, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (92, 'PAPUA BARAT', 1, 132.048724194, -2.7751911399999, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (93, 'PAPUA SELATAN', 1, 137.876018865, -4.5718815229999, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (94, 'PAPUA TENGAH', 1, 136.019727337, -2.7118504449999, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (95, 'PAPUA PEGUNUNGAN', 1, 138.17845364, -3.1107957959999, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);
INSERT INTO `mt_provinsi` VALUES (96, 'PAPUA BARAT DAYA', 1, 132.598825601, -2.1988046119999, 1, '2024-01-12 08:43:04', NULL, NULL, NULL, NULL);

-- ----------------------------
-- View structure for sebaran_provinsi
-- ----------------------------
DROP VIEW IF EXISTS `sebaran_provinsi`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `sebaran_provinsi` AS select `mt_provinsi`.`id_provinsi` AS `id_provinsi`,`mt_provinsi`.`nama` AS `provinsi`,count(`dta_our_collections`.`id`) AS `tot_prov` from (`mt_provinsi` join `dta_our_collections` on((`mt_provinsi`.`id_provinsi` = `dta_our_collections`.`kd_prov`))) group by `mt_provinsi`.`id_provinsi` order by `mt_provinsi`.`id_provinsi`;

-- ----------------------------
-- View structure for total_kategori
-- ----------------------------
DROP VIEW IF EXISTS `total_kategori`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `total_kategori` AS select `dta_categories_our_collection`.`nama` AS `kategori`,count(`dta_our_collections`.`id`) AS `tot_kategori` from (`dta_our_collections` join `dta_categories_our_collection` on((`dta_our_collections`.`id_category` = `dta_categories_our_collection`.`id`))) group by `dta_our_collections`.`id_category`;

SET FOREIGN_KEY_CHECKS = 1;
