<div id="vModal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="vModalTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vModalTitle"></h5>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lembaga</label>
                    <div class="col-sm-7">
                        <label id="nmsenbudtxt" class="col-form-label"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lembaga</label>
                    <div class="col-sm-7">
                        <label id="nmsenbudtxt" class="col-form-label"></label>
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
        $.ajax({
            url: "{{ url('lembaga/detil'); }}/" + idLembaga,
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data, textStatus, jqXHR) {
                if (data.success) {
                    $('#vModalTitle').html('detail ' + data.dt_lembaga.nama);
                    $('#vModal').modal('show');
                    $('#nmsenbudtxt').html(": " + data.dt_lembaga.nama);
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
            error: function (jqXHR, textStatus, errorThrown) {
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