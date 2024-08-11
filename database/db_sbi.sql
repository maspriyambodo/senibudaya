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

 Date: 12/08/2024 02:14:18
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
) ENGINE = InnoDB AUTO_INCREMENT = 113 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '~ hak akses group per menu' ROW_FORMAT = DYNAMIC;

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
INSERT INTO `app_akses` VALUES (21, 2, 9, 'view', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (22, 2, 9, 'input', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (23, 2, 9, 'edit', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (24, 2, 9, 'delete', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (25, 2, 10, 'view', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (26, 2, 10, 'input', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (27, 2, 10, 'edit', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
INSERT INTO `app_akses` VALUES (28, 2, 10, 'delete', 't', 1, '2022-12-11 03:59:18', 1, '2023-07-11 12:00:44');
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
INSERT INTO `app_akses` VALUES (93, 5, 9, 'view', 't', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (94, 5, 9, 'input', 't', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (95, 5, 9, 'edit', 't', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (96, 5, 9, 'delete', 't', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (97, 5, 10, 'view', 't', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (98, 5, 10, 'input', 't', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (99, 5, 10, 'edit', 't', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
INSERT INTO `app_akses` VALUES (100, 5, 10, 'delete', 't', 4, '2024-08-11 19:44:57', 4, '2024-08-11 19:44:57');
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
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '~ data menu aplikasi' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of app_menu
-- ----------------------------
INSERT INTO `app_menu` VALUES (1, 0, 'Konten', '', '', 'konten', 'fas fa-th-large', 1000, 1, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (2, 1, 'Parameter', '', 'content', 'parameter', '', 1111, 1, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (3, 1, 'Menu', '', 'content', 'menu', '', 1111, 2, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (4, 0, 'Infomasi', '', '', 'informasi', 'fas fa-clone', 1000, 2, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (6, 4, 'Jurnal', '', 'information', 'news', '', 1111, 2, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (9, 4, 'Foto', '', 'information', 'photos', '', 1111, 5, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
INSERT INTO `app_menu` VALUES (10, 4, 'Video', '', 'information', 'videos', '', 1111, 6, 't', 1, '2022-10-02 10:43:25', 1, '2022-10-02 10:43:25');
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
) ENGINE = InnoDB AUTO_INCREMENT = 62 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '~ data user aplikasi' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of app_user
-- ----------------------------
INSERT INTO `app_user` VALUES (4, NULL, NULL, NULL, NULL, NULL, 2, 'admin@dev.com', '$2y$10$7mOdg8LscO2lCKZ2KPpciePUvl4sXq7cvKh4L9h5wHTFQ6qIYe07K', 'Administrator', 'admin@default.template', NULL, 'img_1723346979292.jpg', 't', NULL, 1, '2022-10-18 16:07:40', 4, '2024-08-11 10:29:39');
INSERT INTO `app_user` VALUES (61, NULL, NULL, NULL, NULL, NULL, 5, 'maspriyambodo@gmail.com', '$2y$10$FvghNbRPlB4kzZ52PIv/8u60u3uaJ3AWYvlhCK1bn0pJO.B4mmxHW', 'priyambodo', 'maspriyambodo@gmail.com', NULL, NULL, 't', NULL, NULL, '2024-08-11 08:24:01', 4, '2024-08-11 19:20:58');

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
) ENGINE = InnoDB AUTO_INCREMENT = 106 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dta_kategori
-- ----------------------------
INSERT INTO `dta_kategori` VALUES (1, 'Dokumen', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (2, 'Berita', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (3, 'Opini', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (4, 'Tokoh', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (5, 'Foto', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (6, 'Video', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (8, 'Link', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (9, 'Jadwal', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (10, 'Pertanyaan', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (11, 'Konsultasi', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (12, 'Bimbingan', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (13, 'Kontak', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (14, 'Pengaduan', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');
INSERT INTO `dta_kategori` VALUES (17, 'Sejarah', NULL, 't', NULL, '2023-09-25 14:14:44', NULL, '2023-09-25 14:14:49');
INSERT INTO `dta_kategori` VALUES (18, 'Umum', NULL, 't', NULL, '2022-12-10 05:11:49', NULL, '2022-12-10 05:11:49');

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dta_kontak
-- ----------------------------

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

SET FOREIGN_KEY_CHECKS = 1;
