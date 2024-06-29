$(document).ready(function(){
	$.fn.del = function(id) {
		$('#dt').val(id);
	}
	
	$.fn.edit = function(data) {
		$('#id').val(data.id);
		$('#nama_parameter').val(data.nama_parameter);
		$('#nilai_parameter').val(data.nilai_parameter);
		if(data.status_parameter == 'i'){
			$('#value_parameter').hide();
			$('#image_parameter').show();
			$('#img_parameter').attr('src', app_url + '/images/' + data.nilai_parameter);
		}
		else{
			$('#value_parameter').show();
			$('#image_parameter').hide();
			$('#img_parameter').attr('src','');
		}
	}
	
	$.fn.input = function() {
		$('#id').val('');
		$('#nama_parameter').val('');
		$('#nilai_parameter').val('');
		$('#value_parameter').show();
		$('#image_parameter').hide();
		$('#img_parameter').attr('src','');
	}
	
	$('#file_parameter').change(function() {
		var file = $(this).val().split("\\");
		$('.custom-file-label').html(file[file.length - 1].substring(0, 35));
		
		let reader = new FileReader();
		reader.onload = (e) => { 
		  $('#img_parameter').attr('src', e.target.result); 
		}
		reader.readAsDataURL(this.files[0]);
		$('#img_parameter').removeClass('d-none');
	});
});