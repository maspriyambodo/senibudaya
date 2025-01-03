<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div id="eModal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="eModalTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eModalTitle"></h5>
            </div>
            <form id="eMonitoring" novalidate="novalidate" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                <input type="hidden" id="eidtxt" name="eidtxt" required=""/>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Monitoring</label>
                        <div class="col-sm-7">
                            <input type="text" id="nmontxt" name="nmontxt" class="form-control" required="" readonly=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Monitoring</label>
                        <div class="col-sm-7">
                            <input type="text" id="tglmontxt" name="tglmontxt" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Provinsi</label>
                        <div class="col-sm-7">
                            <select name="provtxt" id="provtxt" class="form-control form-select" required=""></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kabupaten</label>
                        <div class="col-sm-7">
                            <select name="kabtxt" id="kabtxt" class="form-control form-select" required=""></select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cmonbtn" class="btn btn-secondary" onclick="cMonitoring();">Cancel</button>
                    <button type="button" id="submonbtn" class="btn btn-success" onclick="sMonitoring();">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
function sMonitoring() {
    var nmontxt, tglmontxt, provtxt, kabtxt, eidtxt, formStat, edit_form;
    edit_form = document.getElementById('eMonitoring');
    formStat = true;
    eidtxt = $('#eidtxt').val();
    kabtxt = $('#kabtxt').val();
    provtxt = $('#provtxt').val();
    tglmontxt = $('#tglmontxt').val();
    nmontxt = $('#nmontxt').val();
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
        }).then(function() {
            window.location.reload();
        });
    }
    if (nmontxt === '') {
        formStat = false;
    }
    if (tglmontxt === '') {
        formStat = false;
    }
    if (provtxt === '') {
        formStat = false;
    }
    if (kabtxt === '') {
        formStat = false;
    }
    if (formStat) {
        const eformData = new FormData(edit_form);
        fetch("{{ url('monitoring/update_monitoring') }}", {
                method: 'POST',
                body: eformData
            })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            $('#eModal').modal('toggle');
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

function cMonitoring() {
    $('#provtxt').select2('destroy');
    $('#kabtxt').select2('destroy');
    $('#provtxt').empty();
    $('#kabtxt').empty();
    $('#eModal').modal('toggle');
}

function provMonitoring(id_provinsi) {
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
                var sel = document.getElementById("provtxt");
                var opt = document.createElement("option");
                opt.value = data.dt_prov[i].id_provinsi;
                opt.text = data.dt_prov[i].nama;
                sel.add(opt, sel.options[i]);
            }
            $('#provtxt').val(id_provinsi).trigger('change');
            $('#provtxt').select2({
                dropdownParent: $('#eModal'),
                width: '100%'
            });
        },
        error: function() {
            Swal.fire({
                text: "error get data Provinsi Monitoring, errcode: 03012331",
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

function kabMonitoring(id_prov, id_kab) {
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
                var sel = document.getElementById("kabtxt");
                var opt = document.createElement("option");
                opt.value = data.dt_kab[i].id_kabupaten;
                opt.text = data.dt_kab[i].nama;
                sel.add(opt, sel.options[i]);
            }
            $('#kabtxt').val(id_kab).trigger('change');
            $('#kabtxt').select2({
                dropdownParent: $('#eModal'),
                width: '100%'
            });
        },
        error: function() {
            Swal.fire({
                text: "error get data Kabupaten Monitoring, errcode: 03012333",
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

function monitorEdit(idMonitoring) {
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
        url: "{{ url('monitoring/detil-monitoring'); }}/" + idMonitoring,
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if (data.success) {
                $('#eidtxt').val(data.dt_monitoring.id);
                $("#tglmontxt").datepicker();
                $('#eModalTitle').html('edit data monitoring');
                $('#nmontxt').val(data.dt_monitoring.no_monitoring);
                $('#tglmontxt').val(data.dt_monitoring.tgl_monitoring);
                provMonitoring(data.dt_monitoring.provinsi);
                kabMonitoring(data.dt_monitoring.provinsi, data.dt_monitoring.kabupaten);
                Swal.close();
                $('#eModal').modal('show');
            } else {
                Swal.fire({
                    text: "error get data Monitoring, errcode: 03012307a",
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

        }
    });
}
</script>