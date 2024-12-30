<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/css/formValidation.min.css" integrity="sha512-B9GRVQaYJ7aMZO3WC2UvS9xds1D+gWQoNiXiZYRlqIVszL073pHXi0pxWxVycBk0fnacKIE3UHuWfSeETDCe7w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div id="eModal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="eModalTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eModalTitle"></h5>
            </div>
            <form id="edit_form" action="{{ url('lembaga/update') }}" novalidate="novalidate" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                <input type="hidden" id="eidtxt" name="eidtxt" required=""/>
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
                            <select id="eprovtxt" name="eprovtxt" class="form-control form-select" required="" style="width:100%"></select>
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
                            <textarea id="addrtxt2" name="addrtxt2" class="form-control" required=""></textarea>
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
                    <button id="ebtn_submit" type="button" class="btn btn-success" onclick="update();">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function update() {
        var nomontxt2, nmtxt2, eprovtxt, ekabtxt, addrtxt2, foctxt2, tigtxt2, prgtxt2, formStat, eformData;
        const edit_form = document.getElementById('edit_form');
        nomontxt2 = $('#nomontxt2').val();
        nmtxt2 = $('#nmtxt2').val();
        eprovtxt = $('#eprovtxt').val();
        ekabtxt = $('#ekabtxt').val();
        addrtxt2 = $('#addrtxt2').val();
        foctxt2 = $('#foctxt2').val();
        tigtxt2 = $('#tigtxt2').val();
        prgtxt2 = $('#prgtxt2').val();
        formStat = true;
        if (nomontxt2 === '') {
            formStat = false;
        }
        if (nmtxt2 === '') {
            formStat = false;
        }
        if (eprovtxt === '') {
            formStat = false;
        }
        if (ekabtxt === '') {
            formStat = false;
        }
        if (addrtxt2 === '') {
            formStat = false;
        }
        if (foctxt2 === '') {
            formStat = false;
        }
        if (tigtxt2 === '') {
            formStat = false;
        }
        if (prgtxt2 === '') {
            formStat = false;
        }
        if (formStat) {
            const eformData = new FormData(edit_form);
            fetch('lembaga/update', {
                method: 'POST',
                body: eformData
            })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            $('#eModal').modal('toggle');
                            Swal.fire({
                                text: "data has been updated",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "OK",
                                allowOutsideClick: false,
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        } else {
                            Swal.fire({
                                text: data.errmessage,
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "OK",
                                allowOutsideClick: false,
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function () {
                                window.location.reload();
                            });
                        }
                    });
        } else {
            Swal.fire({
                text: "mohon lengkapi form!",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        }
    }
</script>
<script>
    function eProvinsi(id_prov) {
        $.ajax({
            url: "{{ url('lembaga/provinsi'); }}",
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data, textStatus, jqXHR) {
                var i;
                for (i = 0; i < data.dt_prov.length; i++) {
                    var sel = document.getElementById("eprovtxt");
                    var opt = document.createElement("option");
                    opt.value = data.dt_prov[i].id_provinsi;
                    opt.text = data.dt_prov[i].nama;
                    sel.add(opt, sel.options[i]);
                }
                $('#eprovtxt').val(id_prov).trigger('change');
                $('#eprovtxt').select2({
                    dropdownParent: $('#eModal'),
                    width: '100%'
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
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
            success: function (data, textStatus, jqXHR) {
                var i;
                for (i = 0; i < data.dt_kab.length; i++) {
                    var sel = document.getElementById("ekabtxt");
                    var opt = document.createElement("option");
                    opt.value = data.dt_kab[i].id_kabupaten;
                    opt.text = data.dt_kab[i].nama;
                    sel.add(opt, sel.options[i]);
                }
                $('#ekabtxt').val(id_kab).trigger('change');
                $('#ekabtxt').select2({
                    dropdownParent: $('#eModal'),
                    width: '100%'
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
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
            onOpen: function () {
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
            success: function (data, textStatus, jqXHR) {
                if (data.success) {
                    $('#eidtxt').val(idLembaga);
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
            error: function (jqXHR, textStatus, errorThrown) {
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