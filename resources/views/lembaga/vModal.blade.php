<div id="vModal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="vModalTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vModalTitle"></h5>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nomor Monitoring</label>
                    <div class="col-sm-7">
                        <label id="nomontxt" class="col-form-label"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lembaga</label>
                    <div class="col-sm-7">
                        <label id="nmsenbudtxt" class="col-form-label"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Provinsi</label>
                    <div class="col-sm-7">
                        <label id="provtxt" class="col-form-label"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kabupaten</label>
                    <div class="col-sm-7">
                        <label id="kabtxt" class="col-form-label"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-7">
                        <label id="addrtxt" class="col-form-label"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Fokus</label>
                    <div class="col-sm-7">
                        <label id="foctxt" class="col-form-label"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tingkat</label>
                    <div class="col-sm-7">
                        <label id="tgttxt" class="col-form-label"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Program</label>
                    <div class="col-sm-7">
                        <label id="prgtxt" class="col-form-label"></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script>
    function vLembaga(idLembaga) {
    Swal.fire({
        title: 'memuat data...',
        html: '<img src="{{ asset("cms/images/loading.gif"); }}" title="Sedang Diverifikasi" class="h-100px w-100px" alt="">',
        allowOutsideClick: false,
        showConfirmButton: false,
        onOpen: function() {
            Swal.showLoading();
        }
    });
    $.ajax({
        url: "{{ url('lembaga/detil'); }}/" + idLembaga,
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data, textStatus, jqXHR) {
            if (data.success) {
                $('#vModalTitle').html('detail ' + data.dt_lembaga.hasil[0].lembaga_seni.nama);
                $('#nmsenbudtxt').html(": " + data.dt_lembaga.hasil[0].lembaga_seni.nama);
                $('#nomontxt').html(": " + data.dt_lembaga.no_monitoring);
                $('#provtxt').html(": " + data.dt_lembaga.hasil[0].lembaga_seni.provinsi.nama);
                $('#kabtxt').html(": " + data.dt_lembaga.hasil[0].lembaga_seni.kabupaten.nama);
                $('#addrtxt').html(": " + data.dt_lembaga.hasil[0].lembaga_seni.alamat);
                $('#foctxt').html(": " + data.dt_lembaga.hasil[0].lembaga_seni.fokus);
                $('#tgttxt').html(": " + data.dt_lembaga.hasil[0].lembaga_seni.tingkat);
                $('#prgtxt').html(": " + data.dt_lembaga.hasil[0].lembaga_seni.program);
                $('#vModal').modal('show');
                Swal.close();
            } else {
                Swal.fire({
                    text: "error get data Lembaga Seni, errcode: 27121401",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire({
                text: "error get data Lembaga Seni, errcode: 27121147",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        }
    });
}
</script>