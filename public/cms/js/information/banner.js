$(document).ready(function(){
	$.fn.del = function(id) {
		$('#dt').val(id);
	}
	
	$.fn.edit = function(data) {
		$('#id').val(data.id);
		$('#nama_banner').val(data.nama_banner.replace(/&#039;/g, "'"));
		$('#keterangan_banner').val(data.keterangan_banner);
		$('#image_banner').val('');
		$('#image_banner').prop('required',false);
		$('#img_banner').removeClass('d-none');
		$('#img_banner').attr('src', app_url + '/images/banner/' + (data.image_banner.length > 0 ? data.image_banner : ''));
		$('#status_banner').prop('checked', data.status_banner == 't' ? true : false);
	}
	
	$.fn.input = function() {
		$('#id').val('');
		$('#nama_banner').val('');
		$('#keterangan_banner').val('');
		$('#image_banner').val('');
		$('#image_banner').prop('required',true);
		$('#img_banner').addClass('d-none');
		$('#img_banner').attr('src', '');
		$('#status_banner').prop('checked', true);
	}
	
	$('#image_banner').change(function() {
		var file = $(this).val().split("\\");
		$('.custom-file-label').html(file[file.length - 1].substring(0, 35));
		
		let reader = new FileReader();
		reader.onload = (e) => { 
		  $('#img_banner').attr('src', e.target.result); 
		}
		reader.readAsDataURL(this.files[0]);
		$('#img_banner').removeClass('d-none');
	});
});