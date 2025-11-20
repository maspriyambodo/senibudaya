@include('cms.header')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <h5 class="m-b-10">{{ $title }}</h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Informasi</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('lembaga') }}">{{ $title }}</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Tambah Data</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{ alertInfo() }}
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Tambah Lembaga Seni</h5>
                    </div>
                    <div class="card-body">
                        <form id="add_form" method="POST" autocomplete="off">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nomor Monitoring <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="number" id="nomontxt" name="nomontxt" class="form-control" placeholder="Masukkan nomor monitoring" required/>
                                    <small class="form-text text-muted">Format: angka</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Lembaga Seni <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" id="nmtxt" name="nmtxt" class="form-control" placeholder="Masukkan nama lembaga seni" required maxlength="255"/>
                                    <small class="form-text text-muted">Maksimal 255 karakter</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Provinsi <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select id="provtxt" name="provtxt" class="form-control form-select" required style="width:100%" onchange="loadKabupaten(this.value);">
                                        <option value="">-- Pilih Provinsi --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kabupaten/Kota <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select id="kabtxt" name="kabtxt" class="form-control form-select" required style="width:100%">
                                        <option value="">-- Pilih Kabupaten/Kota --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Alamat <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <textarea id="addrtxt" name="addrtxt" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fokus Kegiatan <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" id="foctxt" name="foctxt" class="form-control" placeholder="Contoh: Tari Tradisional, Musik, Teater" required/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tingkat <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select id="tigtxt" name="tigtxt" class="form-control form-select" required>
                                        <option value="">-- Pilih Tingkat --</option>
                                        <option value="Nasional">Nasional</option>
                                        <option value="Provinsi">Provinsi</option>
                                        <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                                        <option value="Kecamatan">Kecamatan</option>
                                        <option value="Kelurahan/Desa">Kelurahan/Desa</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Program <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <textarea id="prgtxt" name="prgtxt" class="form-control" rows="3" placeholder="Masukkan program atau kegiatan yang dilakukan" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10 offset-sm-3">
                                    <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ url('lembaga') }}'">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </button>
                                    <button type="button" id="btn_submit" class="btn btn-primary" onclick="submitForm();">
                                        <i class="fas fa-save"></i> Simpan Data
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Initialize Select2
    $('#provtxt').select2({
        width: '100%',
        placeholder: '-- Pilih Provinsi --'
    });

    $('#kabtxt').select2({
        width: '100%',
        placeholder: '-- Pilih Kabupaten/Kota --'
    });

    $('#tigtxt').select2({
        width: '100%',
        placeholder: '-- Pilih Tingkat --'
    });

    // Load provinces
    loadProvinsi();
});

function loadProvinsi() {
    $.ajax({
        url: "{{ url('lembaga/provinsi') }}",
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if (data.success) {
                $('#provtxt').children('option:not(:first)').remove();
                $.each(data.dt_prov, function(i, item) {
                    $('#provtxt').append($('<option>', {
                        value: item.id_provinsi,
                        text: item.nama
                    }));
                });
            }
        },
        error: function() {
            Swal.fire({
                text: "Error saat mengambil data provinsi. Kode error: 04011940",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "OK",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        }
    });
}

function loadKabupaten(id_prov) {
    if (id_prov !== '') {
        $.ajax({
            url: "{{ url('lembaga/kabupaten') }}/" + id_prov,
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                if (data.success) {
                    $('#kabtxt').children('option:not(:first)').remove();
                    $.each(data.dt_kab, function(i, item) {
                        $('#kabtxt').append($('<option>', {
                            value: item.id_kabupaten,
                            text: item.nama
                        }));
                    });
                    $('#kabtxt').val('').trigger('change');
                }
            },
            error: function() {
                Swal.fire({
                    text: "Error saat mengambil data kabupaten. Kode error: 04011941",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        });
    } else {
        $('#kabtxt').children('option:not(:first)').remove();
        $('#kabtxt').val('').trigger('change');
    }
}

function submitForm() {
    // Get form values
    const nomontxt = $('#nomontxt').val().trim();
    const nmtxt = $('#nmtxt').val().trim();
    const provtxt = $('#provtxt').val();
    const kabtxt = $('#kabtxt').val();
    const addrtxt = $('#addrtxt').val().trim();
    const foctxt = $('#foctxt').val().trim();
    const tigtxt = $('#tigtxt').val();
    const prgtxt = $('#prgtxt').val().trim();

    // Validation
    if (!nomontxt) {
        Swal.fire({
            text: "Nomor monitoring harus diisi!",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
        return false;
    }

    if (!nmtxt) {
        Swal.fire({
            text: "Nama lembaga seni harus diisi!",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
        return false;
    }

    if (!provtxt || provtxt === '') {
        Swal.fire({
            text: "Provinsi harus dipilih!",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
        return false;
    }

    if (!kabtxt || kabtxt === '') {
        Swal.fire({
            text: "Kabupaten/Kota harus dipilih!",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
        return false;
    }

    if (!addrtxt) {
        Swal.fire({
            text: "Alamat harus diisi!",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
        return false;
    }

    if (!foctxt) {
        Swal.fire({
            text: "Fokus kegiatan harus diisi!",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
        return false;
    }

    if (!tigtxt || tigtxt === '') {
        Swal.fire({
            text: "Tingkat harus dipilih!",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
        return false;
    }

    if (!prgtxt) {
        Swal.fire({
            text: "Program harus diisi!",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
        return false;
    }

    // Disable submit button
    $('#btn_submit').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Menyimpan...');

    // Submit form
    const formData = new FormData(document.getElementById('add_form'));

    fetch('{{ url("lembaga/create") }}', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                text: "Data berhasil disimpan!",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "OK",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(function() {
                window.location.href = '{{ url("lembaga") }}';
            });
        } else {
            Swal.fire({
                text: data.errmessage || "Terjadi kesalahan saat menyimpan data",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "OK",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
            $('#btn_submit').prop('disabled', false).html('<i class="fas fa-save"></i> Simpan Data');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            text: "Terjadi kesalahan pada sistem",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK",
            allowOutsideClick: false,
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
        $('#btn_submit').prop('disabled', false).html('<i class="fas fa-save"></i> Simpan Data');
    });
}
</script>

@include('cms.footer')
