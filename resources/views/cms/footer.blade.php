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
<script src="{{ asset('cms/js/menu-setting.min.js') }}" type="text/javascript"></script>
<div id="styleSelector" class="menu-styler"><div class="style-toggler"><a href="#!"></a></div><div class="style-block"><h5 class="mb-2 text-white">Atur Template</h5><hr class="border-white"><div class="m-style-scroller"><h6>Header background color</h6><div class="theme-color header-color small"><a href="#!" class="" data-value="header-default"></a><a href="#!" class="" data-value="header-blue"></a><a href="#!" class="" data-value="header-red"></a><a href="#!" class="" data-value="header-purple"></a><a href="#!" class="" data-value="header-info"></a><a href="#!" class="active" data-value="header-dark"></a></div><hr class=""><div class="form-group mb-2"><div class="switch switch-primary d-inline m-r-10"><input type="checkbox" id="menu-fixed" checked=""><label for="menu-fixed" class="cr"></label></div><label>Sidebar Fixed</label></div><div class="form-group mb-2"><div class="switch switch-primary d-inline m-r-10"><input type="checkbox" id="header-fixed" checked=""><label for="header-fixed" class="cr"></label></div><label>Header Fixed</label></div><div class="form-group mb-2"><div class="switch switch-primary d-inline m-r-10"><input type="checkbox" id="content-width"><label for="content-width" class="cr"></label></div><label>Full width content</label></div><div class="nv-cl"><h6 class="mt-2">Layouts</h6><div class="theme-color layout-type"><a href="#!" class="" data-value="menu-dark" title="Default Layout"><span></span><span></span></a><a href="#!" class="active" data-value="menu-light" title="Light"><span></span><span></span></a></div></div></div></div></div>
</body>
</html>