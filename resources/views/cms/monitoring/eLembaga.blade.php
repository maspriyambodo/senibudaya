<div id="eModalLem" class="modal fade show" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="eModalLemTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eModalLemTitle"></h5>
            </div>
            <form id="eLembaga" novalidate="novalidate" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                <input type="hidden" id="idMonitorHasil" name="idMonitorHasil" required=""/>
                <input type="hidden" id="idLemtxt" name="idLemtxt" required=""/>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Lembaga</label>
                        <div class="col-sm-7">
                            <input id="nmtxt" name="nmtxt" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Provinsi</label>
                        <div class="col-sm-7">
                            <select id="provLemtxt" name="provLemtxt" class="form-control form-select" required=""></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kabupaten</label>
                        <div class="col-sm-7">
                            <select id="kabLemtxt" name="kabLemtxt" class="form-control form-select" required=""></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-7">
                            <textarea id="addrtxt" name="addrtxt" class="form-control" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fokus</label>
                        <div class="col-sm-7">
                            <input id="fokLemtxt" name="fokLemtxt" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tingkat</label>
                        <div class="col-sm-7">
                            <input id="tgktxt" name="tgktxt" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Program</label>
                        <div class="col-sm-7">
                            <input id="prgtxt" name="prgtxt" class="form-control" required=""/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cmonbtn2" class="btn btn-secondary" onclick="cLem('');">Cancel</button>
                    <button type="button" id="submonbtn2" class="btn btn-success" onclick="sLem();">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="eModalLem2" class="modal fade show" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addModalLemTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLemTitle"></h5>
            </div>
            <form id="addLembaga" novalidate="novalidate" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                <input type="hidden" id="idMonitorHasil2" name="idMonitorHasil2" required=""/>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Lembaga</label>
                        <div class="col-sm-7">
                            <input id="nmtxt2" name="nmtxt2" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Provinsi</label>
                        <div class="col-sm-7">
                            <select id="provLemtxt2" name="provLemtxt2" class="form-control form-select" required="" onchange="kabLem2(this.value)"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kabupaten</label>
                        <div class="col-sm-7">
                            <select id="kabLemtxt2" name="kabLemtxt2" class="form-control form-select" required=""></select>
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
                            <input id="fokLemtxt2" name="fokLemtxt2" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tingkat</label>
                        <div class="col-sm-7">
                            <input id="tgktxt2" name="tgktxt2" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Program</label>
                        <div class="col-sm-7">
                            <input id="prgtxt2" name="prgtxt2" class="form-control" required=""/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cmonbtn3" class="btn btn-secondary" onclick="cLem(2);">Cancel</button>
                    <button type="button" id="submonbtn3" class="btn btn-success" onclick="sLem2();">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function sLem2() {
    var idMonitorHasil, nmtxt, provLemtxt, kabLemtxt, addrtxt, fokLemtxt, tgktxt, prgtxt, formStat, formLem;
    formLem = document.getElementById('addLembaga');
    formStat = true;
    prgtxt = $('#prgtxt2').val();
    tgktxt = $('#tgktxt2').val();
    fokLemtxt = $('#fokLemtxt2').val();
    addrtxt = $('#addrtxt2').val();
    kabLemtxt = $('#kabLemtxt2').val();
    provLemtxt = $('#provLemtxt2').val();
    nmtxt = $('#nmtxt2').val();
    idMonitorHasil = $('#idMonitorHasil2').val();
    if (idMonitorHasil === '') {
        Swal.fire({
            text: "sesuatu yang salah pada sistem!",
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
    }
    if(nmtxt === '') {
        formStat = false;
    }
    if(provLemtxt === '') {
        formStat = false;
    }
    if(kabLemtxt === '') {
        formStat = false;
    }
    if(addrtxt === '') {
        formStat = false;
    }
    if(fokLemtxt === '') {
        formStat = false;
    }
    if(tgktxt === '') {
        formStat = false;
    }
    if(prgtxt === '') {
        formStat = false;
    }
    if(formStat) {
        const addformLem = new FormData(formLem);
        fetch("{{ url('monitoring/add_lembaga') }}", {
                method: 'POST',
                body: addformLem
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
    } else {
        Swal.fire({
            text: "lengkapi form Lembaga Seni!",
            icon: "success",
            buttonsStyling: !1,
            confirmButtonText: "OK",
            allowOutsideClick: false,
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
    }
}
    
function addLembtn(id_monitoring) {
    $('#idMonitorHasil2').val(id_monitoring);
    provLem2();
}

function sLem() {
    var idMonitorHasil, idLemtxt, nmtxt, provLemtxt, kabLemtxt, addrtxt, fokLemtxt, tgktxt, prgtxt, formStat, formLem;
    formLem = document.getElementById('eLembaga');
    formStat = true;
    prgtxt = $('#prgtxt').val();
    tgktxt = $('#tgktxt').val();
    fokLemtxt = $('#fokLemtxt').val();
    addrtxt = $('#addrtxt').val();
    kabLemtxt = $('#kabLemtxt').val();
    provLemtxt = $('#provLemtxt').val();
    nmtxt = $('#nmtxt').val();
    idLemtxt = $('#idLemtxt').val();
    idMonitorHasil = $('#idMonitorHasil').val();
    if (idMonitorHasil === '') {
        Swal.fire({
            text: "sesuatu yang salah pada sistem!",
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
    }
    if (idLemtxt === '') {
        Swal.fire({
            text: "sesuatu yang salah pada sistem!",
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
    }
    if (nmtxt === '') {
        formStat = false;
    }
    if (provLemtxt === '') {
        formStat = false;
    }
    if (kabLemtxt === '') {
        formStat = false;
    }
    if (addrtxt === '') {
        formStat = false;
    }
    if (fokLemtxt === '') {
        formStat = false;
    }
    if (tgktxt === '') {
        formStat = false;
    }
    if (prgtxt === '') {
        formStat = false;
    }
    if (formStat) {
        const eformLem = new FormData(formLem);
        fetch("{{ url('monitoring/update_lembaga') }}", {
                method: 'POST',
                body: eformLem
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
    } else {
        Swal.fire({
            text: "lengkapi form Lembaga Seni!",
            icon: "success",
            buttonsStyling: !1,
            confirmButtonText: "OK",
            allowOutsideClick: false,
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
    }
}

function provLem2() {
    $.ajax({
        url: "{{ url('monitoring/provinsi'); }}",
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            var i;
            for (i = 0; i < data.dt_prov.length; i++) {
                var sel = document.getElementById("provLemtxt2");
                var opt = document.createElement("option");
                opt.value = data.dt_prov[i].id_provinsi;
                opt.text = data.dt_prov[i].nama;
                sel.add(opt, sel.options[i]);
            }
            $('#provLemtxt2').val('').trigger('change');
            $('#provLemtxt2').select2({
                dropdownParent: $('#eModalLem2'),
                width: '100%'
            });
        },
        error: function() {
            Swal.fire({
                text: "error get data Provinsi, errcode: 04011803",
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

function kabLem2(id_prov) {
    if (id_prov !== '') {
        $.ajax({
            url: "{{ url('monitoring/kabupaten'); }}/" + id_prov,
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                var i;
                for (i = 0; i < data.dt_kab.length; i++) {
                    var sel = document.getElementById("kabLemtxt2");
                    var opt = document.createElement("option");
                    opt.value = data.dt_kab[i].id_kabupaten;
                    opt.text = data.dt_kab[i].nama;
                    sel.add(opt, sel.options[i]);
                }
                $('#kabLemtxt2').val('').trigger('change');
                $('#kabLemtxt2').select2({
                    dropdownParent: $('#eModalLem2'),
                    width: '100%'
                });
            },
            error: function() {
                Swal.fire({
                    text: "error get data Kabupaten, errcode: 04011804",
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
}

function provLem(id_provinsi) {
    $.ajax({
        url: "{{ url('monitoring/provinsi'); }}",
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            var i;
            for (i = 0; i < data.dt_prov.length; i++) {
                var sel = document.getElementById("provLemtxt");
                var opt = document.createElement("option");
                opt.value = data.dt_prov[i].id_provinsi;
                opt.text = data.dt_prov[i].nama;
                sel.add(opt, sel.options[i]);
            }
            $('#provLemtxt').val(id_provinsi).trigger('change');
            $('#provLemtxt').select2({
                dropdownParent: $('#eModalLem'),
                width: '100%'
            });
        },
        error: function() {
            Swal.fire({
                text: "error get data Provinsi, errcode: 04011708",
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

function kabLem(id_prov, id_kab) {
    $.ajax({
        url: "{{ url('monitoring/kabupaten'); }}/" + id_prov,
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            var i;
            for (i = 0; i < data.dt_kab.length; i++) {
                var sel = document.getElementById("kabLemtxt");
                var opt = document.createElement("option");
                opt.value = data.dt_kab[i].id_kabupaten;
                opt.text = data.dt_kab[i].nama;
                sel.add(opt, sel.options[i]);
            }
            $('#kabLemtxt').val(id_kab).trigger('change');
            $('#kabLemtxt').select2({
                dropdownParent: $('#eModalLem'),
                width: '100%'
            });
            Swal.close();
            $('#eModalLem').modal('show');
        },
        error: function() {
            Swal.fire({
                text: "error get data Kabupaten, errcode: 04011709",
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

function cLem(idElem) {
    $('#eModalLem' + idElem).modal('toggle');
    $('#provLemtxt' + idElem).select2('destroy');
    $('#provLemtxt' + idElem).empty();
    $('#kabLemtxt' + idElem).select2('destroy');
    $('#kabLemtxt' + idElem).empty();
}

function editLem(idMonitorHasil) {
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
        url: "{{ url('monitoring/monitoring-hasil'); }}/" + idMonitorHasil,
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if (data.success) {
                provLem(data.dt_monitoring.lembaga_seni.provinsi);
                kabLem(data.dt_monitoring.lembaga_seni.provinsi, data.dt_monitoring.lembaga_seni.kabupaten);
                $('#idMonitorHasil').val(idMonitorHasil);
                $('#idLemtxt').val(data.dt_monitoring.id_content);
                $('#nmtxt').val(data.dt_monitoring.lembaga_seni.nama);
                $('#addrtxt').val(data.dt_monitoring.lembaga_seni.alamat);
                $('#fokLemtxt').val(data.dt_monitoring.lembaga_seni.fokus);
                $('#tgktxt').val(data.dt_monitoring.lembaga_seni.tingkat);
                $('#prgtxt').val(data.dt_monitoring.lembaga_seni.program);
            } else {
                Swal.fire({
                    text: "error while get data Lembaga, errcode: 04011657",
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
        },
        error: function() {
            Swal.fire({
                text: "error while get data Lembaga, errcode: 04011657",
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
</script>