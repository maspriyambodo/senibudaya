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
                            <select id="provSenitxt" name="provSenitxt" class="form-control form-select" required="" onchange="kabLem1(this.value)"></select>
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
<script>
function closeSeniModal() {
    $('#eModalSeni').modal('toggle');
    $('#provSenitxt').children('option').remove();
    $('#kanSenitxt').children('option').remove();
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

function addSenimanbtn() {

}

function delSenimanbtn() {

}
</script>