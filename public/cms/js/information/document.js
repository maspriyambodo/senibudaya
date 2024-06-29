$(document).ready(function(){
	$.fn.del = function(id) {
		$('#dt').val(id);
	}
	
	$.fn.doc = function(path) {
		$('#file_url').attr('src', path);
	}
	
	$.fn.edit = function(data) {
		$('#id').val(data.id);
		$('#id_content').val(data.id_content);
		$('#nama_dokumen').val(data.nama_dokumen);
		$('#keterangan_dokumen').val(data.keterangan_dokumen);
		$('#file_dokumen').val('');
		$('#file_dokumen').prop('required',false);
		$('#img_dokumen').removeClass('d-none');
		$('#status_dokumen').prop('checked', data.status_dokumen == 't' ? true : false);
		$('.modal-title').text($("#kategori option:selected" ).text());
	}
	
	$.fn.input = function() {
		$('#id').val('');
		$('#id_content').val($('#kategori').val());
		$('#nama_dokumen').val('');
		$('#keterangan_dokumen').val('');
		$('#file_dokumen').val('');
		$('#file_dokumen').prop('required',true);
		$('#img_dokumen').addClass('d-none');
		$('#status_dokumen').prop('checked', true);
		$('.modal-title').text($('#kategori option:selected').text());
	}
	
	$('#file_dokumen').change(function() {
		var file = $(this).val().split("\\");
		$('.custom-file-label').html(file[file.length - 1].substring(0, 35));
	});
});