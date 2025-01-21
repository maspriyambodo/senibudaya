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
                    <button type="button" id="submonbtn2" class="btn btn-success" onclick="updatePro();">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
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
    $('#progtxt').val('');
    $('#fretxt').val('');
    $('#tujutxt').val('');
    $('#unstxt').val('');
    $('#wkutxt').val('');
    $('#pnytxt').val('');
    $('#eModalPro').modal('toggle');
}
</script>