SELECT
	tr_monitoring_petugas.id_monitoring,
	tr_monitoring.no_monitoring,
	mt_provinsi.nama AS provinsi,
	mt_kabupaten.nama AS kabupaten,
	dta_pegawai.nama AS nama_pegawai,
	dta_pegawai.nip,
	dta_pegawai.mail,
	dta_pegawai.jabatan,
	tr_monitoring_hasil.jenis 
FROM
	tr_monitoring
	LEFT JOIN tr_monitoring_petugas ON tr_monitoring.id = tr_monitoring_petugas.id_monitoring
	INNER JOIN dta_pegawai ON tr_monitoring_petugas.id_pegawai = dta_pegawai.id
	INNER JOIN mt_provinsi ON tr_monitoring.provinsi = mt_provinsi.id_provinsi
	INNER JOIN mt_kabupaten ON tr_monitoring.kabupaten = mt_kabupaten.id_kabupaten
	LEFT JOIN tr_monitoring_hasil ON tr_monitoring.id = tr_monitoring_hasil.id_monitoring
	LEFT JOIN dta_lembaga_seni ON tr_monitoring_hasil.id_content = dta_lembaga_seni.id
	LEFT JOIN dta_seniman ON tr_monitoring_hasil.id_content = dta_seniman.id
	LEFT JOIN dta_program_seni ON tr_monitoring_hasil.id_content = dta_program_seni.id 
WHERE
	tr_monitoring.is_trash = 1 
	AND tr_monitoring_petugas.is_trash = 1 
	AND dta_pegawai.stat = 1