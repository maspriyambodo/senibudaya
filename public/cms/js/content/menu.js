$(document).ready(function(){
	$.fn.del = function(id) {
		$('#dt').val(id);
	}

	$('#icon_content').change(function() {
		var file = $(this).val().split("\\");
		$('#icon_label').html(file[file.length - 1].substring(0, 35));
		
		let reader = new FileReader();
		reader.onload = (e) => { 
		  $('#ico_content').attr('src', e.target.result); 
		}
		reader.readAsDataURL(this.files[0]);
		$('#ico_content').removeClass('d-none');
	});

	$('#image_content').change(function() {
		var file = $(this).val().split("\\");
		$('#image_label').html(file[file.length - 1].substring(0, 35));
		
		let reader = new FileReader();
		reader.onload = (e) => { 
		  $('#img_content').attr('src', e.target.result); 
		}
		reader.readAsDataURL(this.files[0]);
		$('#img_content').removeClass('d-none');
	});
});