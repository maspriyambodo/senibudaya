<div id="eModal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="eModalTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eModalTitle"></h5>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nomor Monitoring</label>
                    <div class="col-sm-7">
                        <input type="text" id="nomontxt2" name="nomontxt2" class="form-control" readonly="" required=""/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lembaga</label>
                    <div class="col-sm-7">
                        <input type="text" id="nmtxt2" name="nmtxt2" class="form-control" required=""/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Provinsi</label>
                    <div class="col-sm-7">
                        <select id="eprovtxt" name="eprovtxt" class="form-control form-select" required=""></select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kabupaten</label>
                    <div class="col-sm-7">
                        <select id="ekabtxt" name="ekabtxt" class="form-control form-select" required=""></select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-7">
                        <input type="text" id="addrtxt2" name="addrtxt2" class="form-control" required=""/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Fokus</label>
                    <div class="col-sm-7">
                        <input type="text" id="foctxt2" name="foctxt2" class="form-control" required=""/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tingkat</label>
                    <div class="col-sm-7">
                        <input type="text" id="tigtxt2" name="tigtxt2" class="form-control" required=""/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Program</label>
                    <div class="col-sm-7">
                        <input type="text" id="prgtxt2" name="prgtxt2" class="form-control" required=""/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    function eProvinsi(id_prov) {
    $.ajax({
        url: "{{ url('lembaga/provinsi'); }}",
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data, textStatus, jqXHR) {
            var i;
            for (i = 0; i < data.dt_prov.length; i++) {
                var sel = document.getElementById("eprovtxt");
                var opt = document.createElement("option");
                opt.value = data.dt_prov[i].id_provinsi;
                opt.text = data.dt_prov[i].nama;
                sel.add(opt, sel.options[i]);
            }
            $('#eprovtxt').val(id_prov).trigger('change');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire({
                text: "error get data provinsi, errcode: 29121642c",
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

function eKabupaten(id_prov, id_kab) {
    $.ajax({
        url: "{{ url('lembaga/kabupaten'); }}/" + id_prov,
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data, textStatus, jqXHR) {
            var i;
            for (i = 0; i < data.dt_kab.length; i++) {
                var sel = document.getElementById("ekabtxt");
                var opt = document.createElement("option");
                opt.value = data.dt_kab[i].id_kabupaten;
                opt.text = data.dt_kab[i].nama;
                sel.add(opt, sel.options[i]);
            }
            console.log(id_kab);
            $('#ekabtxt').val(id_kab).trigger('change');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire({
                text: "error get data provinsi, errcode: 29121642c",
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

function eLembaga(idLembaga) {
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
                $('#eModalTitle').html('Ubah ' + data.dt_lembaga.hasil[0].lembaga_seni.nama);
                $('#nomontxt2').val(data.dt_lembaga.no_monitoring);
                $('#nmtxt2').val(data.dt_lembaga.hasil[0].lembaga_seni.nama);
                $('#addrtxt2').val(data.dt_lembaga.hasil[0].lembaga_seni.alamat);
                $('#foctxt2').val(data.dt_lembaga.hasil[0].lembaga_seni.fokus);
                $('#tigtxt2').val(data.dt_lembaga.hasil[0].lembaga_seni.tingkat);
                $('#prgtxt2').val(data.dt_lembaga.hasil[0].lembaga_seni.program);
                eProvinsi(data.dt_lembaga.hasil[0].lembaga_seni.provinsi.id_provinsi);
                eKabupaten(data.dt_lembaga.hasil[0].lembaga_seni.kabupaten.id_provinsi, data.dt_lembaga.hasil[0].lembaga_seni.kabupaten.id_kabupaten);
                $('#eModal').modal('show');
                Swal.close();
            } else {
                Swal.fire({
                    text: "error get data Lembaga Seni, errcode: 29121642a",
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
                text: "error get data Lembaga Seni, errcode: 29121642b",
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