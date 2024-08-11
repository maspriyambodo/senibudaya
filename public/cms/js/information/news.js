$(document).ready(function () {
    
    $.fn.del = function (id) {
        $('#dt').val(id);
    };
    
    $('#nama_berita').keyup(function () {
        var value = $(this).val();
        value = value.toLowerCase();
        value = replaceAll(value, " ", "-");
        value = value.replace(/[^a-z0-9-]/gi, '');
        ;
        $('#slug_berita').val(value);
    });

    $('#image_berita').change(function () {
        var file = $(this).val().split("\\");
        $('.custom-file-label').html(file[file.length - 1].substring(0, 20));
		
		let reader = new FileReader();
		reader.onload = (e) => { 
		  $('#img_berita').attr('src', e.target.result); 
		}
		reader.readAsDataURL(this.files[0]);
		$('#img_berita').removeClass('d-none');
    });
	
});
function Approval(id, judul){
    $('input[name="judultxt"]').val(judul);
    $('input[name="id_jurnal"]').val(id);
}