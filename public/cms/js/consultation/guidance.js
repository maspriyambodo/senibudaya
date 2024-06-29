$(document).ready(function(){
	$.fn.del = function(id) {
		$('#dt').val(id);
	}
	
	$('#nama_bimbingan').keyup(function() {
		var	value = $(this).val();
			value = value.toLowerCase();
			value = replaceAll(value," ", "-");
			value = value.replace(/[^a-z0-9-]/gi, '');;
		$('#slug_bimbingan').val(value);
	});
	
	$('#image_bimbingan').change(function() {
		var file = $(this).val().split("\\");
		$('.custom-file-label').html(file[file.length - 1].substring(0, 35));
		
		let reader = new FileReader();
		reader.onload = (e) => { 
		  $('#img_bimbingan').attr('src', e.target.result); 
		}
		reader.readAsDataURL(this.files[0]);
		$('#img_bimbingan').removeClass('d-none');
	});
});