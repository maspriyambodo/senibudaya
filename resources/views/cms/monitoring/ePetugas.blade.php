<div id="eModalPeg" class="modal fade show" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="eModalPegTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eModalPegTitle"></h5>
            </div>
            <form id="ePeg" novalidate="novalidate" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                <input type="hidden" id="idmonpeg" name="idmonpeg" required=""/>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Petugas Monitoring</label>
                        <div class="col-sm-7">
                            <select id="pegtxt" name="pegtxt" class="form-control form-select" required=""></select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cmonbtn" class="btn btn-secondary" onclick="cPeg();">Cancel</button>
                    <button type="button" id="submonbtn" class="btn btn-success" onclick="sPeg();">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="dModalPeg" class="modal fade show" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="dModalPegTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dModalPegTitle"></h5>
            </div>
            <form id="dPeg" novalidate="novalidate" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                <input type="hidden" id="idmonpeg2" name="idmonpeg2" required=""/>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        anda yakin ingin menghapus data Petugas?
                        <br>
                        data yang telah dihapus tidak dapat dikembalikan!
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cmonbtn" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" id="submonbtn" class="btn btn-danger" onclick="dPegbtn();">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function editPeg(idMonitoringPeg) {
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
            url: "{{ url('monitoring/get-pegawai'); }}/" + idMonitoringPeg,
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data) {
                if (data.success) {
                    $('#idmonpeg').val(data.dt_pegawai.id);
                    dirPeg(data.dt_pegawai.pegawai.id);
                    $('#eModalPeg').modal('show');
                    Swal.close();
                } else {
                    Swal.fire({
                        text: "error while get data pegawai, errcode: 04010148",
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
            },
            error: function () {
                Swal.fire({
                    text: "error while get data pegawai, errcode: 04010147",
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
    }

    function dirPeg(idPeg) {
        $.ajax({
            url: "{{ url('monitoring/pegawai'); }}",
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data) {
                if (data.success) {
                    var i;
                    for (i = 0; i < data.dt_pegawai.length; i++) {
                        var sel = document.getElementById("pegtxt");
                        var opt = document.createElement("option");
                        opt.value = data.dt_pegawai[i].id;
                        opt.text = data.dt_pegawai[i].nama;
                        sel.add(opt, sel.options[i]);
                    }
                    $('#pegtxt').val(idPeg).trigger('change');
                    $('#pegtxt').select2({
                        dropdownParent: $('#eModalPeg'),
                        width: '100%'
                    });
                } else {
                    Swal.fire({
                        text: "error while get data pegawai, errcode: 04010157",
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
            },
            error: function () {
                Swal.fire({
                    text: "error while get data pegawai, errcode: 04010154",
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
    }

    function sPeg() {
        var idmonpeg, pegtxt, formStat, form_pegawai;
        form_pegawai = document.getElementById('ePeg');
        formStat = true;
        pegtxt = $('#pegtxt').val();
        idmonpeg = $('#idmonpeg').val();
        if (idmonpeg === '') {
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
        if (pegtxt === '') {
            formStat = false;
        }
        if (formStat) {
            const eformPeg = new FormData(form_pegawai);
            fetch("{{ url('monitoring/update_pegawai') }}", {
                method: 'POST',
                body: eformPeg
            })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                text: "data has been updated!",
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
                text: "Pegawai belum dipilih!",
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

    function cPeg() {
        $('#pegtxt').select2('destroy');
        $('#pegtxt').empty();
        $('#eModalPeg').modal('toggle');
    }
    
    function deletePeg(idMonitoringPeg) {
        $('#idmonpeg2').val(idMonitoringPeg);
        $('#dModalPeg').modal('show');
    }
    
    function dPegbtn() {
        var dform_pegawai = document.getElementById('dPeg');
        const dformPeg = new FormData(dform_pegawai);
            fetch("{{ url('monitoring/delete_pegawai') }}", {
                method: 'POST',
                body: dformPeg
            })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                text: "data has been deleted!",
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
    }
</script>