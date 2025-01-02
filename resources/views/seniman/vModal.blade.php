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
                    <label class="col-sm-3 col-form-label">Nama Seniman</label>
                    <div class="col-sm-7">
                        <label id="nmsentxt" class="col-form-label"></label>
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
                    <label class="col-sm-3 col-form-label">Bidang</label>
                    <div class="col-sm-7">
                        <label id="bidtxt" class="col-form-label"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Karya</label>
                    <div class="col-sm-7">
                        <label id="kartxt" class="col-form-label"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Lembaga</label>
                    <div class="col-sm-7">
                        <label id="lemtxt" class="col-form-label"></label>
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
        url: "{{ url('seniman/detil'); }}/" + idLembaga,
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data, textStatus, jqXHR) {
            if (data.success) {
                $('#vModalTitle').html('detail ' + data.dt_seniman.hasil[0].seniman.nama);
                $('#nmsentxt').html(": " + data.dt_seniman.hasil[0].seniman.nama);
                $('#nomontxt').html(": " + data.dt_seniman.no_monitoring);
                $('#provtxt').html(": " + data.dt_seniman.hasil[0].seniman.provinsi.nama);
                $('#kabtxt').html(": " + data.dt_seniman.hasil[0].seniman.kabupaten.nama);
                $('#addrtxt').html(": " + data.dt_seniman.hasil[0].seniman.alamat);
                $('#bidtxt').html(": " + data.dt_seniman.hasil[0].seniman.bidang);
                $('#kartxt').html(": " + data.dt_seniman.hasil[0].seniman.karya);
                $('#lemtxt').html(": " + data.dt_seniman.hasil[0].seniman.lembaga);
                $('#vModal').modal('show');
                Swal.close();
            } else {
                Swal.fire({
                    text: "error get data Seniman, errcode: 02012147a",
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
                text: "error get data Seniman, errcode: 02012147b",
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