<div id="eModal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="eModalTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eModalTitle"></h5>
            </div>
            <form id="edit_form" action="{{ url('seniman/update') }}" novalidate="novalidate" method="POST" autocomplete="off">
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
                        <label class="col-sm-3 col-form-label">Nama Program Seni</label>
                        <div class="col-sm-7">
                            <input type="text" id="nmtxt2" name="nmtxt2" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Frekuensi</label>
                        <div class="col-sm-7">
                            <input type="text" id="bidtxt2" name="bidtxt2" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tujuan</label>
                        <div class="col-sm-7">
                            <input type="text" id="tigtxt2" name="tigtxt2" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Unsur</label>
                        <div class="col-sm-7">
                            <input type="text" id="prgtxt2" name="prgtxt2" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Waktu</label>
                        <div class="col-sm-7">
                            <input type="text" id="wktxt2" name="wktxt2" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Penyelenggara</label>
                        <div class="col-sm-7">
                            <input type="text" id="pnltxt2" name="pnltxt2" class="form-control" required=""/>
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
        var eidtxt, nomontxt2, nmtxt2, bidtxt2, tigtxt2, prgtxt2,wktxt2,pnltxt2, formStat, eformData;
        const edit_form = document.getElementById('edit_form');
        nomontxt2 = $('#nomontxt2').val();
        nmtxt2 = $('#nmtxt2').val();
        bidtxt2 = $('#bidtxt2').val();
        tigtxt2 = $('#tigtxt2').val();
        prgtxt2 = $('#prgtxt2').val();
        wktxt2 = $('#wktxt2').val();
        pnltxt2 = $('#pnltxt2').val();
        formStat = true;
        if (eidtxt === '') {
            Swal.fire({
                text: "sesuatu yang salah pada sistem!",
                icon: "success",
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
        if (nomontxt2 === '') {
            formStat = false;
        }
        if (nmtxt2 === '') {
            formStat = false;
        }
        if (bidtxt2 === '') {
            formStat = false;
        }
        if (tigtxt2 === '') {
            formStat = false;
        }
        if (prgtxt2 === '') {
            formStat = false;
        }
        if (wktxt2 === '') {
            formStat = false;
        }
        if (pnltxt2 === '') {
            formStat = false;
        }
        if (formStat) {
            const eformData = new FormData(edit_form);
            fetch('program-seni/update', {
                method: 'POST',
                body: eformData
            })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            $('#data').DataTable().ajax.reload();
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
            url: "{{ url('program-seni/detil'); }}/" + idLembaga,
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data, textStatus, jqXHR) {
                if (data.success) {
                    $('#eidtxt').val(idLembaga);
                    $('#eModalTitle').html('Ubah ' + data.dt_programSeni.hasil[0].program_seni.nama);
                    $('#nomontxt2').val(data.dt_programSeni.no_monitoring);
                    $('#nmtxt2').val(data.dt_programSeni.hasil[0].program_seni.nama);
                    $('#bidtxt2').val(data.dt_programSeni.hasil[0].program_seni.frekuensi);
                    $('#tigtxt2').val(data.dt_programSeni.hasil[0].program_seni.tujuan);
                    $('#prgtxt2').val(data.dt_programSeni.hasil[0].program_seni.unsur);
                    $('#wktxt2').val(data.dt_programSeni.hasil[0].program_seni.waktu);
                    $('#pnltxt2').val(data.dt_programSeni.hasil[0].program_seni.penyelenggara);
                    $('#eModal').modal('show');
                    Swal.close();
                } else {
                    Swal.fire({
                        text: "error get data Seniman, errcode: 02012258e",
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
                    text: "error get data Seniman, errcode: 02012258f",
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