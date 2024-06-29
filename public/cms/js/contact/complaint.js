$(document).ready(function(){
	$.fn.del = function(id) {
		$('#dt').val(id);
	}
	
	$.fn.edit = function(data) {
		$('#val').val(data.id);
		$('#id').val(data.id);
		$('#nama_pengaduan').html(data.nama_pengaduan);
		$('#nik_pengaduan').html(data.nik_pengaduan);
		$('#telepon_pengaduan').html(data.telepon_pengaduan);
		$('#email_pengaduan').html(data.email_pengaduan);
		$('#alamat_pengaduan').html(data.alamat_pengaduan.replace(/\n/g, "<br />"));
		$('#detail_pengaduan').html(data.detail_pengaduan.replace(/\n/g, "<br />"));
		$('#created_at').html(data.created_at);
	}
});