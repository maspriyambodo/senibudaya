
--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_akses`
--
ALTER TABLE `app_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_group`
--
ALTER TABLE `app_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_group` (`nama_group`);

--
-- Indexes for table `app_menu`
--
ALTER TABLE `app_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `target_menu` (`target_menu`);

--
-- Indexes for table `app_parameter`
--
ALTER TABLE `app_parameter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_parameter` (`nama_parameter`);

--
-- Indexes for table `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `dta_banner`
--
ALTER TABLE `dta_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_berita`
--
ALTER TABLE `dta_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_bimbingan`
--
ALTER TABLE `dta_bimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_content`
--
ALTER TABLE `dta_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_direktorat`
--
ALTER TABLE `dta_direktorat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `dta_dokumen`
--
ALTER TABLE `dta_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_foto`
--
ALTER TABLE `dta_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_jenis`
--
ALTER TABLE `dta_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_kategori`
--
ALTER TABLE `dta_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_konsultasi`
--
ALTER TABLE `dta_konsultasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_kontak`
--
ALTER TABLE `dta_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_link`
--
ALTER TABLE `dta_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_opini`
--
ALTER TABLE `dta_opini`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_pengaduan`
--
ALTER TABLE `dta_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_tokoh`
--
ALTER TABLE `dta_tokoh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_video`
--
ALTER TABLE `dta_video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_akses`
--
ALTER TABLE `app_akses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_group`
--
ALTER TABLE `app_group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_parameter`
--
ALTER TABLE `app_parameter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_user`
--
ALTER TABLE `app_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_banner`
--
ALTER TABLE `dta_banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_berita`
--
ALTER TABLE `dta_berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_bimbingan`
--
ALTER TABLE `dta_bimbingan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_content`
--
ALTER TABLE `dta_content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_direktorat`
--
ALTER TABLE `dta_direktorat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_dokumen`
--
ALTER TABLE `dta_dokumen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_foto`
--
ALTER TABLE `dta_foto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_jenis`
--
ALTER TABLE `dta_jenis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_kategori`
--
ALTER TABLE `dta_kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_konsultasi`
--
ALTER TABLE `dta_konsultasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_kontak`
--
ALTER TABLE `dta_kontak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_link`
--
ALTER TABLE `dta_link`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_opini`
--
ALTER TABLE `dta_opini`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_pengaduan`
--
ALTER TABLE `dta_pengaduan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_tokoh`
--
ALTER TABLE `dta_tokoh`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dta_video`
--
ALTER TABLE `dta_video`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
