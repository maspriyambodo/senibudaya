$(document).ready(function(){
	$.fn.del = function(id) {
		$('#dt').val(id);
	}
	
	$.fn.edit = function(data) {
		$('#val').val(data.id);
		$('#id').val(data.id);
		$('#nama_kontak').html(data.nama_kontak);
		$('#email_kontak').html(data.email_kontak);
		$('#detail_kontak').html(data.detail_kontak.replace(/\n/g, "<br />"));
		$('#created_at').html(data.created_at);
	}
});