$(function() {
	$.fn.del = function(id) {
		$('#dt').val(id);
	}
	
	$.fn.update = function(id) {
		$(".text-validation").html('');
		
		$('#ch').val(id);
		$('#password_change').val('');
		$('#password_change').attr('type', 'password');
		$('#repassword_change').val('');
		$('#repassword_change').attr('type', 'password');
		$('#hide-cpassword').addClass('d-none');
		$('#show-cpassword').removeClass('d-none');
		$('#hide-crepassword').addClass('d-none');
		$('#show-crepassword').removeClass('d-none');
	}
	
	$.fn.edit = function(data) {
		$(".text-validation").html('');
		
		$('#id').val(data.id);
		$('#id_user').val(data.id_user);
		$('#id_group').val(data.id_group);
		$('#id_group').trigger('change');
		$('#nama_user').val(data.nama_user);
		$('#password_user').val('*****');
		$('#repassword_user').val('*****');
		$('#email_user').val(data.email_user);
		$('#foto_user').val('');
		$('#status_user').prop('checked', data.status_user == 't' ? true : false);
		$('#img_user').removeClass('d-none');
		$('#img_user').attr('src', app_url + '/cms/images/user/' + (data.foto_user.length > 0 ? data.foto_user : 'default.png'));
		$('#div_password').addClass('d-none');
		$('#div_repassword').addClass('d-none');
		$('.custom-file-label').html('Pilih foto');
	}
	
	$.fn.input = function() {
		$(".text-validation").html('');
		
		$('#id').val('');
		$('#id_group').val('');
		$("#id_group").trigger("change");
		$('#id_user').val('');
		$('#nama_user').val('');
		$('#password_user').val('');
		$('#repassword_user').val('');
		$('#email_user').val('');
		$('#foto_user').val('');
		$('#status_user').prop('checked', true);
		$('#img_user').addClass('d-none');
		$("#div_password").removeClass('d-none');
		$("#div_repassword").removeClass('d-none');
		$('.custom-file-label').html('Pilih foto');
	}
	
	$('#foto_user').change(function() {
		var file = $(this).val().split("\\");
		$('.custom-file-label').html(file[file.length - 1].substring(0, 35));
		
		let reader = new FileReader();
		reader.onload = (e) => { 
		  $('#img_user').attr('src', e.target.result); 
		}
		reader.readAsDataURL(this.files[0]);
		$('#img_user').removeClass('d-none');
	});
	
	$('#password_user').keyup(function() {
		$("#pass").html(
			$("#password_user").val() == $("#repassword_user").val() ?
			"<input id=\"ck\" type=\"text\" required=\"\" value=\"ok\">":
			"<input id=\"ck\" type=\"text\" required=\"\" oninvalid=\"Password harus sama.\">"
		);
	});
	
	$('#repassword_user').keyup(function() {
		$("#pass").html(
			$("#password_user").val() == $("#repassword_user").val() ?
			"<input id=\"ck\" type=\"text\" required=\"\" value=\"ok\">":
			"<input id=\"ck\" type=\"text\" required=\"\" oninvalid=\"Password harus sama.\">"
		);
	});
	
	$('#password').click(function() {
		if($("#password_user").attr('type')==='password'){
			$("#password_user").attr('type', 'text');
			$("#show-password").addClass('d-none');
			$("#hide-password").removeClass('d-none');
		}
		else{
			$("#password_user").attr('type', 'password');
			$("#hide-password").addClass('d-none');
			$("#show-password").removeClass('d-none');
		}
	});
	
	$('#repassword').click(function() {
		if($("#repassword_user").attr('type')==='password'){
			$("#repassword_user").attr('type', 'text');
			$("#show-repassword").addClass('d-none');
			$("#hide-repassword").removeClass('d-none');
		}
		else{
			$("#repassword_user").attr('type', 'password');
			$("#hide-repassword").addClass('d-none');
			$("#show-repassword").removeClass('d-none');
		}
	});
	
	$('#password_change').keyup(function() {
		$("#check").html(
			$("#password_change").val() == $("#repassword_change").val() ?
			"<input id=\"ck\" type=\"text\" required=\"\" value=\"ok\">":
			"<input id=\"ck\" type=\"text\" required=\"\" oninvalid=\"Password harus sama.\">"
		);
	});
	
	$('#repassword_change').keyup(function() {
		$("#check").html(
			$("#password_change").val() == $("#repassword_change").val() ?
			"<input id=\"ck\" type=\"text\" required=\"\" value=\"ok\">":
			"<input id=\"ck\" type=\"text\" required=\"\" oninvalid=\"Password harus sama.\">"
		);
	});
	
	$('#cpassword').click(function() {
		if($("#password_change").attr('type')==='password'){
			$("#password_change").attr('type', 'text');
			$("#show-cpassword").addClass('d-none');
			$("#hide-cpassword").removeClass('d-none');
		}
		else{
			$("#password_change").attr('type', 'password');
			$("#hide-cpassword").addClass('d-none');
			$("#show-cpassword").removeClass('d-none');
		}
	});
	
	$('#crepassword').click(function() {
		if($("#repassword_change").attr('type')==='password'){
			$("#repassword_change").attr('type', 'text');
			$("#show-crepassword").addClass('d-none');
			$("#hide-crepassword").removeClass('d-none');
		}
		else{
			$("#repassword_change").attr('type', 'password');
			$("#hide-crepassword").addClass('d-none');
			$("#show-crepassword").removeClass('d-none');
		}
	});
});