$(function() {
	$('#show').click(function() {
		$('#password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});