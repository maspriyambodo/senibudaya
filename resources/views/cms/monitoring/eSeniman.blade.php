<div id="eModalSeni" class="modal fade show" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="eModalSeniTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eModalSeniTitle"></h5>
            </div>
            <form id="eSeniman_form" novalidate="novalidate" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                <input type="hidden" id="idSenimantxt" name="idSenimantxt" required=""/>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Seniman</label>
                        <div class="col-sm-7">
                            <input id="senimantxt" name="senimantxt" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Provinsi</label>
                        <div class="col-sm-7">
                            <select id="provSenitxt" name="provSenitxt" class="form-control form-select" required="" onchange="kabSeniman1(this.value);"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kabupaten</label>
                        <div class="col-sm-7">
                            <select id="kanSenitxt" name="kanSenitxt" class="form-control form-select" required=""></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-7">
                            <textarea id="addrSenitxt" name="addrSenitxt" class="form-control" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Bidang</label>
                        <div class="col-sm-7">
                            <input id="bidSenitxt" name="bidSenitxt" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Karya</label>
                        <div class="col-sm-7">
                            <input id="karSenitxt" name="karSenitxt" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Lembaga</label>
                        <div class="col-sm-7">
                            <input id="lemSenitxt" name="lemSenitxt" class="form-control" required=""/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cmonbtn2" class="btn btn-secondary" onclick="closeSeniModal('');">Cancel</button>
                    <button type="button" id="submonbtn2" class="btn btn-success" onclick="updateSeni();">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="eModalSeni2" class="modal fade show" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addModalSeniTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalSeniTitle"></h5>
            </div>
            <form id="addSeniman_form" novalidate="novalidate" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                <input type="hidden" id="idMonitSenitxt" name="idMonitSenitxt" required=""/>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Seniman</label>
                        <div class="col-sm-7">
                            <input id="senimantxt2" name="senimantxt2" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Provinsi</label>
                        <div class="col-sm-7">
                            <select id="provSenitxt2" name="provSenitxt2" class="form-control form-select" required="" onchange="kabSeniman2(this.value);"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kabupaten</label>
                        <div class="col-sm-7">
                            <select id="kanSenitxt2" name="kanSenitxt2" class="form-control form-select" required=""></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-7">
                            <textarea id="addrSenitxt2" name="addrSenitxt2" class="form-control" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Bidang</label>
                        <div class="col-sm-7">
                            <input id="bidSenitxt2" name="bidSenitxt2" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Karya</label>
                        <div class="col-sm-7">
                            <input id="karSenitxt2" name="karSenitxt2" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Lembaga</label>
                        <div class="col-sm-7">
                            <input id="lemSenitxt2" name="lemSenitxt2" class="form-control" required=""/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cmonbtn3" class="btn btn-secondary" onclick="closeSeniModal(2);">Cancel</button>
                    <button type="button" id="submonbtn3" class="btn btn-success" onclick="saveSeniman();">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="eModalSeni3" class="modal fade show" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="delModalSeniTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delModalSeniTitle"></h5>
            </div>
            <form id="delSeniman_form" novalidate="novalidate" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                <input type="hidden" id="idDelMoni" name="idDelMoni" required=""/>
                <input type="hidden" id="idSeni2" name="idSeni2" required=""/>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        anda yakin ingin menghapus data Seniman?
                        <br><!-- comment -->
                        data yang telah dihapus tidak dapat dikembalikan!
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cmonbtn4" class="btn btn-secondary">Cancel</button>
                    <button type="button" id="submonbtn4" class="btn btn-danger" onclick="delSeniman();">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function kabSeniman1(id_prov) {
    if (id_prov !== '') {
        $.ajax({
            url: "{{ url('monitoring/kabupaten'); }}/" + id_prov,
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                $('#kanSenitxt').children('option').remove();
                var i;
                for (i = 0; i < data.dt_kab.length; i++) {
                    var sel = document.getElementById("kanSenitxt");
                    var opt = document.createElement("option");
                    opt.value = data.dt_kab[i].id_kabupaten;
                    opt.text = data.dt_kab[i].nama;
                    sel.add(opt, sel.options[i]);
                }
                $('#kanSenitxt').select2({
                    dropdownParent: $('#eModalSeni'),
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

function closeSeniModal(idElem) {
    $('#eModalSeni' + idElem).modal('toggle');
    $('#provSenitxt' + idElem).children('option').remove();
    $('#kanSenitxt' + idElem).children('option').remove();
}

function updateSeni() {
    var idSenimantxt, senimantxt, provSenitxt, kanSenitxt, addrSenitxt, bidSenitxt, karSenitxt, lemSenitxt, formStat, formSeni;
    formSeni = document.getElementById('eSeniman_form');
    formStat = true;
    lemSenitxt = $('#lemSenitxt').val();
    karSenitxt = $('#karSenitxt').val();
    bidSenitxt = $('#bidSenitxt').val();
    addrSenitxt = $('#addrSenitxt').val();
    kanSenitxt = $('#kanSenitxt').val();
    provSenitxt = $('#provSenitxt').val();
    senimantxt = $('#senimantxt').val();
    idSenimantxt = $('#idSenimantxt').val();
    if (idSenimantxt === '') {
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
    if (senimantxt === '') {
        formStat = false;
    }
    if (provSenitxt === '') {
        formStat = false;
    }
    if (kanSenitxt === '') {
        formStat = false;
    }
    if (addrSenitxt === '') {
        formStat = false;
    }
    if (bidSenitxt === '') {
        formStat = false;
    }
    if (karSenitxt === '') {
        formStat = false;
    }
    if (lemSenitxt === '') {
        formStat = false;
    }
    if (formStat) {
        const eformSeni = new FormData(formSeni);
        fetch("{{ url('monitoring/update_seniman') }}", {
                method: 'POST',
                body: eformSeni
            })
            .then(response => response.json())
            .then(data => {
                if (typeof(data) !== 'object') {
                    Swal.fire({
                        text: 'error while update data, errcode: 18011529',
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
    } else {
        Swal.fire({
            text: "lengkapi form Seniman!",
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

function provSeniman(id_prov) {
    $.ajax({
        url: "{{ url('monitoring/provinsi'); }}",
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            $('#kanSenitxt').children('option').remove();
            var i;
            for (i = 0; i < data.dt_prov.length; i++) {
                var sel = document.getElementById("provSenitxt");
                var opt = document.createElement("option");
                opt.value = data.dt_prov[i].id_provinsi;
                opt.text = data.dt_prov[i].nama;
                sel.add(opt, sel.options[i]);
            }
            $('#provSenitxt').val(id_prov).trigger('change');
            $('#provSenitxt').select2({
                dropdownParent: $('#eModalSeni'),
                width: '100%'
            });
        },
        error: function() {
            Swal.fire({
                text: "error get data Provinsi, errcode: 10011005",
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

function provSeniman2() {
    $.ajax({
        url: "{{ url('monitoring/provinsi'); }}",
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            $('#kanSenitxt2').children('option').remove();
            var i;
            for (i = 0; i < data.dt_prov.length; i++) {
                var sel = document.getElementById("provSenitxt2");
                var opt = document.createElement("option");
                opt.value = data.dt_prov[i].id_provinsi;
                opt.text = data.dt_prov[i].nama;
                sel.add(opt, sel.options[i]);
            }
            $('#provSenitxt2').val('').trigger('change');
            $('#provSenitxt2').select2({
                dropdownParent: $('#eModalSeni2'),
                width: '100%'
            });
        },
        error: function() {
            Swal.fire({
                text: "error get data Provinsi, errcode: 10011005",
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

function kabSeniman(id_prov, id_kab) {
    $.ajax({
        url: "{{ url('monitoring/kabupaten'); }}/" + id_prov,
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            $('#kanSenitxt').children('option').remove();
            var i;
            for (i = 0; i < data.dt_kab.length; i++) {
                var sel = document.getElementById("kanSenitxt");
                var opt = document.createElement("option");
                opt.value = data.dt_kab[i].id_kabupaten;
                opt.text = data.dt_kab[i].nama;
                sel.add(opt, sel.options[i]);
            }
            $('#kanSenitxt').val(id_kab).trigger('change');
            $('#kanSenitxt').select2({
                dropdownParent: $('#eModalSeni'),
                width: '100%'
            });
            Swal.close();
            $('#eModalSeni').modal('show');
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

function kabSeniman2(id_prov) {
    if(id_prov !== '') {
        $.ajax({
        url: "{{ url('monitoring/kabupaten'); }}/" + id_prov,
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            $('#kanSenitxt2').children('option').remove();
            var i;
            for (i = 0; i < data.dt_kab.length; i++) {
                var sel = document.getElementById("kanSenitxt2");
                var opt = document.createElement("option");
                opt.value = data.dt_kab[i].id_kabupaten;
                opt.text = data.dt_kab[i].nama;
                sel.add(opt, sel.options[i]);
            }
            $('#kanSenitxt2').val('').trigger('change');
            $('#kanSenitxt2').select2({
                dropdownParent: $('#eModalSeni2'),
                width: '100%'
            });
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
}

function editSeniman(idSenimantxt) {
    $('#idSenimantxt').val(idSenimantxt);
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
        url: "{{ url('seniman/detil-seniman'); }}/" + idSenimantxt,
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            $('#senimantxt').val(data.dt_seniman.nama);
            $('#addrSenitxt').val(data.dt_seniman.alamat);
            $('#bidSenitxt').val(data.dt_seniman.bidang);
            $('#karSenitxt').val(data.dt_seniman.karya);
            $('#lemSenitxt').val(data.dt_seniman.lembaga);
            provSeniman(data.dt_seniman.provinsi);
            kabSeniman(data.dt_seniman.provinsi, data.dt_seniman.kabupaten);
        },
        error: function() {
            Swal.fire({
                text: "error while get data Seniman, errcode: 10011006",
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

function addSenimanbtn(id_monitoring) {
    $('#idMonitSenitxt').val(id_monitoring);
    provSeniman2();
    $('#eModalSeni2').modal('show');
}

function saveSeniman() {
    var idMonitSenitxt, senimantxt2, provSenitxt2, kanSenitxt2, addrSenitxt2, bidSenitxt2, karSenitxt2, lemSenitxt2, formStat2, formSeni2;
    formSeni2 = document.getElementById('addSeniman_form');
    formStat2 = true;
    lemSenitxt2 = $('#lemSenitxt2').val();
    karSenitxt2 = $('#karSenitxt2').val();
    bidSenitxt2 = $('#bidSenitxt2').val();
    addrSenitxt2 = $('#addrSenitxt2').val();
    kanSenitxt2 = $('#kanSenitxt2').val();
    provSenitxt2 = $('#provSenitxt2').val();
    senimantxt2 = $('#senimantxt2').val();
    idMonitSenitxt = $('#idMonitSenitxt').val();
    if (idMonitSenitxt === '') {
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
    if (senimantxt2 === '') {
        formStat2 = false;
    }
    if (provSenitxt2 === '') {
        formStat2 = false;
    }
    if (kanSenitxt2 === '') {
        formStat2 = false;
    }
    if (addrSenitxt2 === '') {
        formStat2 = false;
    }
    if (bidSenitxt2 === '') {
        formStat2 = false;
    }
    if (karSenitxt2 === '') {
        formStat2 = false;
    }
    if (lemSenitxt2 === '') {
        formStat2 = false;
    }
    if (formStat2) {
        const eformSeni2 = new FormData(formSeni2);
        fetch("{{ url('monitoring/simpan_seniman') }}", {
                method: 'POST',
                body: eformSeni2
            })
            .then(response => response.json())
            .then(data => {
                if (typeof(data) !== 'object') {
                    Swal.fire({
                        text: 'error while update data, errcode: 20012025',
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
                        text: "data has been added!",
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
            text: "lengkapi form Seniman!",
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

function delSeniman() {
    Swal.fire({
        title: 'memuat data...',
        html: '<img src="{{ asset("cms/images/loading.gif"); }}" title="Sedang Diverifikasi" class="h-100px w-100px" alt="">',
        allowOutsideClick: false,
        showConfirmButton: false,
        onOpen: function() {
            Swal.showLoading();
        }
    });
    var delSeniman_form = document.getElementById('delSeniman_form');
    const delSeniman_Data = new FormData(delSeniman_form);
    fetch("{{ url('monitoring/del_seniman') }}", {
                method: 'POST',
                body: delSeniman_Data
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

function delSenimanbtn(idDelMoni) {
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
        url: "{{ url('monitoring/monitoring-seniman'); }}/" + idDelMoni,
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function (data) {
            $('#idSeni2').val(data.dt_monitoring.id_content);
                        $('#idDelMoni').val(data.dt_monitoring.id);
                $('#eModalSeni3').modal('show');
                Swal.close();
                    },
        error: function () {
                        Swal.fire({
                            text: "error while get data Seniman, errcode: 21012220",
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