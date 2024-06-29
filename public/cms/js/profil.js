$(function() {
	$('#img_user').click(function() {
		$('#foto_user').click();
	});
	
	$('#foto_user').change(function() {
		$('#form').submit();
	});
});