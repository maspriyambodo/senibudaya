$(document).ready(function(){
	$.fn.del = function(id) {
		$('#dt').val(id);
	}
	
	$.fn.edit = function(data) {
		$('#id').val(data.id);
		$('#id_content').val(data.id_content);
		$('#nama_video').val(data.nama_video);
		$('#keterangan_video').val(data.keterangan_video);
		$('#url_video').val(data.url_video);
		$('#status_video').prop('checked', data.status_video == 't' ? true : false);
	}
	
	$.fn.input = function() {
		$('#id').val('');
		$('#id_content').val($('#kategori').val());
		$('#nama_video').val('');
		$('#keterangan_video').val('');
		$('#url_video').val('');
		$('#status_video').prop('checked', true);
	}
});