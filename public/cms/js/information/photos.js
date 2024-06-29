$(document).ready(function(){
	$.fn.del = function(id) {
		$('#dt').val(id);
	}
	
	$.fn.edit = function(data) {
		$('#id').val(data.id);
		$('#id_content').val(data.id_content);
		$('#nama_foto').val(data.nama_foto.replace(/&#039;/g, "'"));
		$('#keterangan_foto').val(data.keterangan_foto);
		$('#image_foto').val('');
		$('#image_foto').prop('required',false);
		$('#img_foto').removeClass('d-none');
		$('#img_foto').attr('src', app_url + '/images/foto/' + (data.image_foto.length > 0 ? data.image_foto : ''));
		$('#status_foto').prop('checked', data.status_foto == 't' ? true : false);
	}
	
	$.fn.input = function() {
		$('#id').val('');
		$('#id_content').val($('#kategori').val());
		$('#nama_foto').val('');
		$('#keterangan_foto').val('');
		$('#image_foto').val('');
		$('#image_foto').prop('required',true);
		$('#img_foto').addClass('d-none');
		$('#img_foto').attr('src', '');
		$('#status_foto').prop('checked', true);
	}
	
	$('#image_foto').change(function() {
		var file = $(this).val().split("\\");
		$('.custom-file-label').html(file[file.length - 1].substring(0, 35));
		
		let reader = new FileReader();
		reader.onload = (e) => { 
		  $('#img_foto').attr('src', e.target.result); 
		}
		reader.readAsDataURL(this.files[0]);
		$('#img_foto').removeClass('d-none');
	});
});