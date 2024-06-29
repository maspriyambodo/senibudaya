$(document).ready(function(){
	$.fn.del = function(id) {
		$('#dt').val(id);
	}
	
	$.fn.edit = function(data) {
		$('#id').val(data.id);
		$('#nama_group').val(data.nama_group);
		$('#keterangan_group').val(data.keterangan_group);
		$('#status_group').prop('checked', data.status_group == 't' ? true : false);
		$('#view_all').prop('checked', false);
		$('#input_all').prop('checked', false);
		$('#edit_all').prop('checked', false);
		$('#delete_all').prop('checked', false);
		$.ajax({url: app_url + '/group/show/' + data.id, success: function(result){
			data = $.parseJSON(result);
			$.each(data, function(idx) {
				$.each(data[idx], function(i, v) {
					$('#'+ idx + '_' + i).prop('checked', v == 't' ? true : false);
				});
			});
		}});
	}
	
	$.fn.input = function() {
		$('#id').val('');
		$('#nama_group').val('');
		$('#keterangan_group').val('');
		$('#status_group').prop('checked', true);
		$('#view_all').prop('checked', false);
		$('#input_all').prop('checked', false);
		$('#edit_all').prop('checked', false);
		$('#delete_all').prop('checked', false);
		$.ajax({url: app_url + '/group/show/0', success: function(result){
			data = $.parseJSON(result);
			$.each(data, function(idx) {
				$.each(data[idx], function(i, v) {
					$('#'+ idx + '_' + i).prop('checked', v == 't' ? true : false);
				});
			});
		}});
	}
	
	$('#view_all').click(function() {
		$.ajax({url: app_url + '/group/show/0', success: function(result){
			data = $.parseJSON(result);
			$.each(data, function(idx) {
				if(idx == 'view'){
					$.each(data[idx], function(i, v) {
						$('#'+ idx + '_' + i).prop('checked', $('#view_all').is(':checked') );
					});
				}
			});
		}});
	});
	
	$('#input_all').click(function() {
		$.ajax({url: app_url + '/group/show/0', success: function(result){
			data = $.parseJSON(result);
			$.each(data, function(idx) {
				if(idx == 'input'){
					$.each(data[idx], function(i, v) {
						$('#'+ idx + '_' + i).prop('checked', $('#input_all').is(':checked') );
					});
				}
			});
		}});
	});
	
	$('#edit_all').click(function() {
		$.ajax({url: app_url + '/group/show/0', success: function(result){
			data = $.parseJSON(result);
			$.each(data, function(idx) {
				if(idx == 'edit'){
					$.each(data[idx], function(i, v) {
						$('#'+ idx + '_' + i).prop('checked', $('#edit_all').is(':checked') );
					});
				}
			});
		}});
	});
	
	$('#delete_all').click(function() {
		$.ajax({url: app_url + '/group/show/0', success: function(result){
			data = $.parseJSON(result);
			$.each(data, function(idx) {
				if(idx == 'delete'){
					$.each(data[idx], function(i, v) {
						$('#'+ idx + '_' + i).prop('checked', $('#delete_all').is(':checked') );
					});
				}
			});
		}});
	});
});