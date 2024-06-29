$(document).ready(function(){
	$.fn.del = function(id) {
		$('#dt').val(id);
	}
	
	$.fn.edit = function(data) {
		$('#id').val(data.id);
		$('#id_content').val(data.id_content);
		$('#nama_link').val(data.nama_link.replace(/&#039;/g, "'"));
		$('#keterangan_link').val(data.keterangan_link);
		$('#url_link').val(data.url_link);
		$('#image_link').val('');
		$('#image_link').prop('required',false);
		$('#img_link').removeClass('d-none');
		$('#img_link').attr('src', app_url + '/images/link/' + (data.image_link.length > 0 ? data.image_link : ''));
		$('#status_link').prop('checked', data.status_link == 't' ? true : false);
	}
	
	$.fn.input = function() {
		$('#id').val('');
		$('#id_content').val($('#kategori').val());
		$('#nama_link').val('');
		$('#keterangan_link').val('');
		$('#url_link').val('');
		$('#image_link').val('');
		$('#image_link').prop('required',true);
		$('#img_link').addClass('d-none');
		$('#img_link').attr('src', '');
		$('#status_link').prop('checked', true);
	}
	
	$('#image_link').change(function() {
		var file = $(this).val().split("\\");
		$('.custom-file-label').html(file[file.length - 1].substring(0, 35));
		
		let reader = new FileReader();
		reader.onload = (e) => { 
		  $('#img_link').attr('src', e.target.result); 
		}
		reader.readAsDataURL(this.files[0]);
		$('#img_link').removeClass('d-none');
	});
});