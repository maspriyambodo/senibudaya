<div id="eModalPro" class="modal fade show" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="eModalProTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eModalProTitle"></h5>
            </div>
            <form id="eprog_form" novalidate="novalidate" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                <input type="hidden" id="idProtxt" name="idProtxt" required=""/>
                <input type="hidden" id="idMoniPro" name="idMoniPro" required=""/>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Program</label>
                        <div class="col-sm-7">
                            <input id="progtxt" name="progtxt" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Frekuensi</label>
                        <div class="col-sm-7">
                            <input id="fretxt" name="fretxt" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tujuan</label>
                        <div class="col-sm-7">
                            <input id="tujutxt" name="tujutxt" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Unsur</label>
                        <div class="col-sm-7">
                            <input id="unstxt" name="unstxt" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Waktu</label>
                        <div class="col-sm-7">
                            <input id="wkutxt" name="wkutxt" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Penyelenggara</label>
                        <div class="col-sm-7">
                            <input id="pnytxt" name="pnytxt" class="form-control" required=""/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cmonbtn2" class="btn btn-secondary" onclick="closeProModal('');">Cancel</button>
                    <button type="button" id="subprobtn2" class="btn btn-success">error</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="eModalPro2" class="modal fade show" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="dModalProTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dModalProTitle"></h5>
            </div>
            <form id="delProg_form" novalidate="novalidate" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                <input type="hidden" id="idProtxt2" name="idProtxt2" required=""/>
                <input type="hidden" id="idMoniPro2" name="idMoniPro2" required=""/>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        anda yakin ingin menghapus data Program Seni?
                        <br><!-- comment -->
                        data yang telah dihapus tidak dapat dikembalikan!
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeProModal('');">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="delProgBtn();">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function delProgrambtn(idMonHasil) {
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
        url: "{{ url('monitoring/monitoring-program'); }}/" + idMonHasil,
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            $('#idProtxt2').val(data.dt_monitoring.id_content);
            $('#idMoniPro2').val(data.dt_monitoring.id);
            $('#eModalPro2').modal('show');
            Swal.close();
        },
        error: function() {
            Swal.fire({
                text: "error while get data Program Seni, errcode: 22010014",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(function() {
                window.location.reload();
            });
        }
    });
}

function delProgBtn() {
    Swal.fire({
        title: 'memuat data...',
        html: '<img src="{{ asset("cms/images/loading.gif"); }}" title="Sedang Diverifikasi" class="h-100px w-100px" alt="">',
        allowOutsideClick: false,
        showConfirmButton: false,
        onOpen: function() {
            Swal.showLoading();
        }
    });
    var delPro_form = document.getElementById('delProg_form');
    const delPro_Data = new FormData(delPro_form);
    fetch("{{ url('monitoring/del_program') }}", {
            method: 'POST',
            body: delPro_Data
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
                }).then(function() {
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
                }).then(function() {
                    window.location.reload();
                });
            }
        });
}

function addProgrambtn(idmonitorpro) {
    $('#idMoniPro').val(idmonitorpro);
    $('#idProtxt').val('');
    $('#eModalPro').modal('show');
    $("#subprobtn2").html("Save");
    $("#subprobtn2").attr("onclick", "saveProgbtn()");
}

function saveProgbtn() {
    var idProtxt, idMoniPro, progtxt, fretxt, tujutxt, unstxt, wkutxt, pnytxt, formStat, formAdd;
    formAdd = document.getElementById('eprog_form');
    formStat = true;
    pnytxt = $('#pnytxt').val();
    wkutxt = $('#wkutxt').val();
    unstxt = $('#unstxt').val();
    tujutxt = $('#tujutxt').val();
    fretxt = $('#fretxt').val();
    progtxt = $('#progtxt').val();
    idMoniPro = $('#idMoniPro').val();
    idProtxt = $('#idProtxt').val();
    if (idMoniPro === '') {
        Swal.fire({
            text: "sesuatu yang salah pada sistem!",
            icon: "error",
            buttonsStyling: !1,
            confirmButtonText: "OK",
            allowOutsideClick: false,
            customClass: {
                confirmButton: "btn btn-primary"
            }
        }).then(function() {
            window.location.reload();
        });
    }
    if (progtxt === '') {
        formStat = false;
    }
    if (fretxt === '') {
        formStat = false;
    }
    if (tujutxt === '') {
        formStat = false;
    }
    if (unstxt === '') {
        formStat = false;
    }
    if (wkutxt === '') {
        formStat = false;
    }
    if (pnytxt === '') {
        formStat = false;
    }
    if (formStat) {
        const addprog_form = new FormData(formAdd);
        fetch("{{ url('monitoring/simpan_program') }}", {
                method: 'POST',
                body: addprog_form
            })
            .then(response => response.json())
            .then(data => {
                if (typeof(data) !== 'object') {
                    Swal.fire({
                        text: 'error while update data, errcode: 21012314',
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "OK",
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function() {
                        window.location.reload();
                    });
                } else if (data.success) {
                    Swal.fire({
                        text: "data has been updated!",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "OK",
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function() {
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
                    }).then(function() {
                        window.location.reload();
                    });
                }
            });
    }
}

function updatePro() {
    var idProtxt, progtxt, fretxt, tujutxt, unstxt, wkutxt, pnytxt, formStat, formProg;
    formProg = document.getElementById('eprog_form');
    formStat = true;
    pnytxt = $('#pnytxt').val();
    wkutxt = $('#wkutxt').val();
    unstxt = $('#unstxt').val();
    tujutxt = $('#tujutxt').val();
    fretxt = $('#fretxt').val();
    progtxt = $('#progtxt').val();
    idProtxt = $('#idProtxt').val();
    if (idProtxt === '') {
        Swal.fire({
            text: "sesuatu yang salah pada sistem!",
            icon: "error",
            buttonsStyling: !1,
            confirmButtonText: "OK",
            allowOutsideClick: false,
            customClass: {
                confirmButton: "btn btn-primary"
            }
        }).then(function() {
            window.location.reload();
        });
    }
    if (progtxt === '') {
        formStat = false;
    }
    if (fretxt === '') {
        formStat = false;
    }
    if (tujutxt === '') {
        formStat = false;
    }
    if (unstxt === '') {
        formStat = false;
    }
    if (wkutxt === '') {
        formStat = false;
    }
    if (pnytxt === '') {
        formStat = false;
    }
    if (formStat) {
        const eprog_form = new FormData(formProg);
        fetch("{{ url('monitoring/update_program') }}", {
                method: 'POST',
                body: eprog_form
            })
            .then(response => response.json())
            .then(data => {
                if (typeof(data) !== 'object') {
                    Swal.fire({
                        text: 'error while update data, errcode: 21012314',
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "OK",
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function() {
                        window.location.reload();
                    });
                } else if (data.success) {
                    Swal.fire({
                        text: "data has been updated!",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "OK",
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function() {
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
                    }).then(function() {
                        window.location.reload();
                    });
                }
            });
    }
}

function editProgram(idProg) {
    $('#idProtxt').val(idProg);
    $('#idMoniPro').val('');
    $("#subprobtn2").html("Update");
    $("#subprobtn2").attr("onclick", "updatePro()");
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
        url: "{{ url('program-seni/detil-program'); }}/" + idProg,
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            $('#progtxt').val(data.dt_program.nama);
            $('#fretxt').val(data.dt_program.frekuensi);
            $('#tujutxt').val(data.dt_program.tujuan);
            $('#unstxt').val(data.dt_program.unsur);
            $('#wkutxt').val(data.dt_program.waktu);
            $('#pnytxt').val(data.dt_program.penyelenggara);
            $('#eModalPro').modal('show');
            Swal.close();
        },
        error: function() {

        }
    });
}

function closeProModal() {
    $('#idProtxt').val('');
    $('#idMoniPro').val('');
    $('#progtxt').val('');
    $('#fretxt').val('');
    $('#tujutxt').val('');
    $('#unstxt').val('');
    $('#wkutxt').val('');
    $('#pnytxt').val('');
    $('#eModalPro').modal('toggle');
}
</script>