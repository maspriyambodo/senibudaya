$(document).ready(function(){
	$('#kategori').change(function(){
		$.fn.show();
	});
	
	$.fn.show = function() {
		$.get(app_url + "/imsakiyah/show/" + $("#kategori").val(), function(data, status){
			var obj = $.parseJSON(data);
			$("#sub option").remove();
			$.each(obj, function(idx, val) {
				var opt = new Option(val.name, val.id, false, false);
				$('#sub').append(opt).trigger('change');
			});
		});
	}
});