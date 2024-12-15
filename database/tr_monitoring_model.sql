CREATE TABLE `db_sbi.dta_lembaga_seni`  (
  `id` int NOT NULL,
  `nama` varchar(255) NULL DEFAULT NULL,
  `provinsi` int NULL DEFAULT NULL,
  `kabupaten` int NULL DEFAULT NULL,
  `kecamatan` int NULL DEFAULT NULL,
  `kelurahan` decimal(0, 0) NULL DEFAULT NULL,
  `alamat` varchar(255) NULL DEFAULT NULL,
  `fokus` varchar(255) NULL DEFAULT NULL,
  `tingkat` varchar(255) NULL DEFAULT NULL,
  `program` varchar(255) NULL DEFAULT NULL,
  `stat` tinyint NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `db_sbi.dta_pegawai`  (
  `id` int NOT NULL,
  `nama` varchar(255) NULL DEFAULT NULL,
  `nip` varchar(255) NULL DEFAULT NULL,
  `mail` varchar(255) NULL DEFAULT NULL,
  `jabatan` int NULL DEFAULT NULL,
  `stat` int NULL DEFAULT NULL COMMENT '1. aktif 0. delete',
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `db_sbi.dta_program_seni`  (
  `id` int NOT NULL,
  `nama` varchar(255) NULL DEFAULT NULL,
  `frekuensi` varchar(255) NULL DEFAULT NULL,
  `tujuan` varchar(255) NULL DEFAULT NULL,
  `unsur` varchar(255) NULL DEFAULT NULL,
  `waktu` varchar(25) NULL DEFAULT NULL,
  `penyelenggara` varchar(255) NULL DEFAULT NULL,
  `stat` tinyint NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `db_sbi.dta_seniman`  (
  `id` int NOT NULL,
  `nama` varchar(255) NULL DEFAULT NULL,
  `provinsi` int NULL DEFAULT NULL,
  `kabupaten` int NULL DEFAULT NULL,
  `kecamatan` int NULL DEFAULT NULL,
  `kelurahan` decimal(0, 0) NULL DEFAULT NULL,
  `alamat` varchar(255) NULL DEFAULT NULL,
  `bidang` varchar(255) NULL DEFAULT NULL,
  `karya` varchar(255) NULL DEFAULT NULL,
  `lembaga` varchar(255) NULL DEFAULT NULL,
  `stat` tinyint NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `db_sbi.mt_kabupaten`  (
  `id_kabupaten` int NOT NULL,
  `id_provinsi` int NOT NULL,
  `nama` text NOT NULL,
  `stat` int NOT NULL DEFAULT 1,
  `latitude` double NULL DEFAULT 0,
  `longitude` double NULL DEFAULT 0,
  `syscreateuser` int NULL DEFAULT NULL,
  `syscreatedate` datetime NULL DEFAULT NULL,
  `sysupdateuser` int NULL DEFAULT NULL,
  `sysupdatedate` datetime NULL DEFAULT NULL,
  `sysdeleteuser` int NULL DEFAULT NULL,
  `sysdeletedate` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_kabupaten`),
  UNIQUE INDEX `id_kabupaten`(`id_kabupaten`)
);

CREATE TABLE `db_sbi.mt_provinsi`  (
  `id_provinsi` int NOT NULL,
  `nama` text NOT NULL,
  `stat` int NOT NULL DEFAULT 1,
  `latitude` double NOT NULL DEFAULT 0,
  `longitude` double NOT NULL DEFAULT 0,
  `syscreateuser` int NULL DEFAULT NULL,
  `syscreatedate` datetime NULL DEFAULT NULL,
  `sysupdateuser` int NULL DEFAULT NULL,
  `sysupdatedate` datetime NULL DEFAULT NULL,
  `sysdeleteuser` int NULL DEFAULT NULL,
  `sysdeletedate` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`),
  UNIQUE INDEX `id_provinsi`(`id_provinsi`)
);

CREATE TABLE `db_sbi.tr_monitoring`  (
  `id` int NOT NULL,
  `no_monitoring` decimal(0, 0) NULL DEFAULT NULL,
  `provinsi` int NULL DEFAULT NULL,
  `kabupaten` int NULL DEFAULT NULL,
  `kecamatan` int NULL DEFAULT NULL,
  `kelurahan` decimal(0, 0) NULL DEFAULT NULL,
  `is_trash` int NULL DEFAULT NULL COMMENT '1. aktif 0. deleted',
  `created_at` datetime NULL DEFAULT NULL,
  `created_by` tinyint NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `updated_by` tinyint NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `db_sbi.tr_monitoring_hasil`  (
  `id` int NOT NULL,
  `id_monitoring` int NULL DEFAULT NULL,
  `id_content` int NULL DEFAULT NULL,
  `jenis` int NULL DEFAULT NULL COMMENT '1. lembaga seni budaya\r\n2. seniman & budayawan muslim\r\n3. program senibudaya islam',
  `is_trash` tinyint NULL DEFAULT NULL COMMENT '0. deleted 1. aktif',
  `created_at` datetime NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `db_sbi.tr_monitoring_petugas`  (
  `id` int NOT NULL,
  `id_monitoring` int NULL DEFAULT NULL,
  `id_pegawai` int NULL DEFAULT NULL,
  `is_trash` tinyint NULL DEFAULT NULL COMMENT '0. deleted 1. aktif',
  `created_at` datetime NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

ALTER TABLE `db_sbi.tr_monitoring` ADD FOREIGN KEY (`provinsi`) REFERENCES `db_sbi.mt_provinsi` (`id_provinsi`);
ALTER TABLE `db_sbi.tr_monitoring` ADD CONSTRAINT `_copy_7` FOREIGN KEY (`kabupaten`) REFERENCES `db_sbi.mt_kabupaten` (`id_kabupaten`);
ALTER TABLE `db_sbi.tr_monitoring_hasil` ADD CONSTRAINT `_copy_6` FOREIGN KEY (`id_monitoring`) REFERENCES `db_sbi.tr_monitoring` (`id`);
ALTER TABLE `db_sbi.tr_monitoring_hasil` ADD CONSTRAINT `_copy_5` FOREIGN KEY (`id_content`) REFERENCES `db_sbi.dta_seniman` (`id`);
ALTER TABLE `db_sbi.tr_monitoring_hasil` ADD CONSTRAINT `_copy_4` FOREIGN KEY (`id_content`) REFERENCES `db_sbi.dta_program_seni` (`id`);
ALTER TABLE `db_sbi.tr_monitoring_hasil` ADD CONSTRAINT `_copy_3` FOREIGN KEY (`id_content`) REFERENCES `db_sbi.dta_lembaga_seni` (`id`);
ALTER TABLE `db_sbi.tr_monitoring_petugas` ADD CONSTRAINT `_copy_2` FOREIGN KEY (`id_monitoring`) REFERENCES `db_sbi.tr_monitoring` (`id`);
ALTER TABLE `db_sbi.tr_monitoring_petugas` ADD CONSTRAINT `_copy_1` FOREIGN KEY (`id_pegawai`) REFERENCES `db_sbi.dta_pegawai` (`id`);

