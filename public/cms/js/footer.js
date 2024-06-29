function delay(callback, ms) {
	var timer = 0;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timer);
		timer = setTimeout(function () {
			callback.apply(context, args);
		}, ms || 0);
	};
}

function replaceAll(Source,stringToFind,stringToReplace){
	var temp = Source;
	if(temp == undefined) return false;
	var index = temp.indexOf(stringToFind);
	while(index != -1){
		temp = temp.replace(stringToFind,stringToReplace);
		index = temp.indexOf(stringToFind);
	}
	return temp;
}

$(function() {
	$.fn.start_length = function(start, length, keyword, kategori, sub, year, month) {
		if(keyword == undefined)
		keyword = $('#keyword').val();
		if(kategori == undefined)
		kategori = $('#kategori').val();
		if(sub == undefined)
		sub = $('#sub').val();
		if(year == undefined)
		year = $('#year').val();
		if(month == undefined)
		month = $('#month').val();
	
		$.ajax({url: app_url + '/background/table/' + start + '-' + length + '-' + keyword + '-' + kategori + '-' + sub + '-' + year + '-' + month, success: function(result){
			if(result) alert(result);
		}});
	}
		
	$('#password_reset').keyup(function() {
		$("#pass").html(
			$("#password_reset").val() == $("#repassword_reset").val() ?
			"":
			"<input id=\"ck\" type=\"text\" required=\"\" oninvalid=\"Password harus sama.\">"
		);
	});
	
	$('#repassword_reset').keyup(function() {
		$("#pass").html(
			$("#password_reset").val() == $("#repassword_reset").val() ?
			"":
			"<input id=\"ck\" type=\"text\" required=\"\" oninvalid=\"Password harus sama.\">"
		);
	});
	
	$('#upassword').click(function() {
		if($("#password_reset").attr('type')==='password'){
			$("#password_reset").attr('type', 'text');
			$("#show-upassword").addClass('d-none');
			$("#hide-upassword").removeClass('d-none');
		}
		else{
			$("#password_reset").attr('type', 'password');
			$("#hide-upassword").addClass('d-none');
			$("#show-upassword").removeClass('d-none');
		}
	});
	
	$('#urepassword').click(function() {
		if($("#repassword_reset").attr('type')==='password'){
			$("#repassword_reset").attr('type', 'text');
			$("#show-urepassword").addClass('d-none');
			$("#hide-urepassword").removeClass('d-none');
		}
		else{
			$("#repassword_reset").attr('type', 'password');
			$("#hide-urepassword").addClass('d-none');
			$("#show-urepassword").removeClass('d-none');
		}
	});
	
	$('#rpassword').click(function() {
		$('#password_reset').val('');
		$('#repassword_reset').val('');
		$('#password_reset').attr('type', 'password');
		$('#hide-upassword').addClass('d-none');
		$('#show-upassword').removeClass('d-none');
		$('#repassword_reset').attr('type', 'password');
		$('#hide-urepassword').addClass('d-none');
		$('#show-urepassword').removeClass('d-none');
	});
	
	$("input[type='number']").keyup(function () {
		if($(this).val().length < 1) $(this).val('');
	});
});