<div class="modal fade" id="reset" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<form action="profil/change" method="post" class="needs-validation" novalidate="">
@csrf
<div class="modal-header">
<h5 class="modal-title">Ubah Password</h5>
<span class="text-validation"></span>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="form-group row">
<label class="col-sm-4 col-form-label">
Password
<div id="usindicator" class="pwindicator">
<div class="bar"></div>
<div class="label"></div>
</div>
</label>
<div class="col-sm-8">
<div class="input-group">
<input id="password_reset" name="password_reset" type="password" class="form-control pwstrength" data-indicator="usindicator" {{ noEmpty('Password tidak boleh kosong.') }}>
<div id="upassword" class="input-group-append">
<span class="input-group-text">
<i class="fas fa-eye" id="show-upassword"></i>
<i class="fas fa-eye-slash d-none" id="hide-upassword"></i>
</span>
</div>
</div>
</div>
</div>
<div class="form-group row">
<label class="col-sm-4 col-form-label">Ulangi Password</label>
<div class="col-sm-8">
<div class="input-group">
<input id="repassword_reset" name="repassword_reset" type="password" class="form-control" {{ noEmpty('Ulangi password harus diisi.') }}>
<div id="urepassword" class="input-group-append">
<span class="input-group-text">
<i class="fas fa-eye" id="show-urepassword"></i>
<i class="fas fa-eye-slash d-none" id="hide-urepassword"></i>
</span>
</div>
<div id="pass" style="position:absolute;z-index:-1"></div>
</div>
</div>
</div>
<small class="form-text text-muted mt-4">
* Gunakan password baru untuk login kembali setelah logout otomatis.
</small>
</div>
<div class="modal-footer bg-whitesmoke br">
<button type="button" class="btn btn-light w-25" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary w-25 ml-1">Simpan</button>
</div>
</form>
</div>
</div>
</div>
<div class="modal fade" id="logout" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<form action="{{ url('/logout') }}" method="get">
<div class="modal-header">
<h5 class="modal-title">Logout</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<input id="dt" name="dt" type="hidden">
Anda yakin akan keluar ?
</div>
<div class="modal-footer bg-whitesmoke br">
<button type="button" class="btn btn-light w-25" data-dismiss="modal">Tidak</button>
<button type="submit" class="btn btn-primary w-25 ml-1">Ya</button>
</div>
</form>
</div>
</div>
</div>
<div class="modal fade" id="validate" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<input id="validate-id" type="hidden">
<div id="validate-body"></div>
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('.select2').css('width', '100%');
    $('#alert').hide();
    @if($errors->any())
    $('#alert').removeClass('alert-info');
    $('#alert').addClass('alert-warning');
    $('#ico').removeClass('fa-info-circle');
    $('#ico').addClass('fa-exclamation-triangle');
    $('#info').text("{{ $errors->first() }}");
    $('#alert').fadeTo(3000, 750).slideUp(750, function() {
        $('#alert').slideUp(750);
    });
    @endif
    @if(session()->has('message'))
    $('#alert').removeClass('alert-warning');
    $('#alert').addClass('alert-info');
    $('#ico').removeClass('fa-exclamation-triangle');
    $('#ico').addClass('fa-info-circle');
    $('#info').text("{{ preg_replace('/[0-9_]+/', '', session()->get('message')) }}");
    $('#alert').fadeTo(3000, 750).slideUp(750, function() {
        $('#alert').slideUp(750);
    });
    @endif
});
</script>
<script async src="{{ asset('cms/js/footer.js') }}"></script>
<script async src="{{ asset('cms/js/pcoded.min.js') }}"></script>
<script async src="{{ asset('cms/js/plugins/select2.js') }}"></script>
<script async src="{{ asset('cms/js/plugins/jquery.validate.min.js') }}"></script>
<script async src="{{ asset('cms/js/pages/form-select-custom.js') }}"></script>
<script async src="{{ asset('cms/js/plugins/lightbox.min.js') }}"></script>
<script async src="{{ asset('cms/js/plugins/ekko-lightbox.min.js') }}"></script>
<script async src="{{ asset('cms/js/pages/form-validation.js') }}"></script>
<script async src="{{ asset('cms/js/pages/ac-lightbox.js') }}"></script>
</body>
</html>