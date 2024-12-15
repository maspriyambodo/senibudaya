@include('cms.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <h5 class="m-b-10">{{ $title }} Add New</h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Informasi</a></li>
                            <li class="breadcrumb-item"><a href="{{ url($current) }}">{{ $title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear" style="margin-top:5%;"></div>
        <div class="card">
            <form id="form_monitoring" action="{{ url($current) }}/store/?q=add" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Monitoring</label>
                        <div class="col-sm-8">
                            <input id="notxt" type="text" name="notxt" class="form-control" placeholder="otomatis by system" readonly=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Monitoring</label>
                        <div class="col-sm-8">
                            <input id="tgltxt" type="text" name="tgltxt" class="form-control" readonly=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-8">
                            <select name="provtxt" id="provtxt" class="form-control form-select" onchange="provinsi(this.value)">
                                <option value="">pilih provinsi</option>
                                @foreach($provinsi as $dt_prov)
                                <option value="{{ $dt_prov->id_provinsi }}">{{ $dt_prov->provinsi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kabupaten</label>
                        <div class="col-sm-8">
                            <select name="kabtxt" id="kabtxt" class="form-control form-select"></select>
                        </div>
                    </div>
                    <div id="pegclone" class="form-group row">
                        <label class="col-sm-2 col-form-label">Petugas Monitoring</label>
                        <div class="col-sm-6">
                            <select name="petugastxt[]" id="petugastxt1" class="form-control form-select">
                                <option value="">pilih pegawai</option>
                                @foreach($pegawai as $dt_pegawai)
                                <option value="{{ $dt_pegawai->id }}">{{ $dt_pegawai->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input id="countpeg" type="hidden" name="countpeg" value="1"/>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" onclick="tambahPegawai()"><i class="feather icon-save"></i>Tambah Petugas</button>
                        </div>
                    </div>
                    <div id="pegelem"></div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('monitoring'); }}" class="btn btn-secondary mr-2"><i class="feather icon-x"></i>Batal</a>
                    <button type="button" class="btn btn-success"><i class="feather icon-save"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
                                $(document).ready(function () {
                                    $('.form-select').select2();
                                    $("#tgltxt").datepicker();
                                });
</script>
<script>
    function removePegawai(val) {
        $('#pegelem' + val).remove();
        $('#countpeg').val(parseInt(val, 10) - 1);
    }
    function tambahPegawai() {
        Swal.fire({
            title: 'memuat data...',
            html: '<img src="{{ asset("cms/images/loading.gif"); }}" title="Sedang Diverifikasi" class="h-100px w-100px" alt="">',
            allowOutsideClick: false,
            showConfirmButton: false,
            onOpen: function () {
                Swal.showLoading();
            }
        });
        var countpeg = $('#countpeg').val();
        var tot_peg = parseInt(countpeg, 10) + 1;
        $('#countpeg').val(tot_peg);
        $('#pegelem').append(`
            <div id="pegelem` + tot_peg + `" class="form-group row">
                        <label class="col-sm-2 col-form-label">Petugas Monitoring</label>
                        <div class="col-sm-6">
                            <select name="petugastxt[]" id="petugastxt` + tot_peg + `" class="form-control form-select">
                                <option value="">pilih pegawai</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-danger" onclick="removePegawai(` + tot_peg + `)"><i class="feather icon-trash"></i>Hapus Petugas</button>
                        </div>
                    </div>
        `);
        $.ajax({
            url: "{{ url('monitoring/pegawai'); }}",
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data, textStatus, jqXHR) {
                if (data.success) {
                    $('#petugastxt' + tot_peg).children('option').remove();
                    var i;
                    for (i = 0; i < data.dt_pegawai.length; i++) {
                        var sel = document.getElementById("petugastxt" + tot_peg);
                        var opt = document.createElement("option");
                        opt.value = data.dt_pegawai[i].id;
                        opt.text = data.dt_pegawai[i].nama;
                        sel.add(opt, sel.options[i]);
                    }
                    Swal.close();
                } else {
                    Swal.fire({
                        text: "error get data pegawai",
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
            error: function (jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    text: "kesalahan saat mendapatkan data pegawai",
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
<script>
    function provinsi(id_prov) {
        Swal.fire({
            title: 'memuat data...',
            html: '<img src="{{ asset("cms/images/loading.gif"); }}" title="Sedang Diverifikasi" class="h-100px w-100px" alt="">',
            allowOutsideClick: false,
            showConfirmButton: false,
            onOpen: function () {
                Swal.showLoading();
            }
        });
        $('#kabtxt').children('option').remove();
        if (id_prov !== '') {
            $.ajax({
                url: "{{ url('news/kabupaten?id_prov='); }}" + id_prov,
                type: "GET",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function (data) {
                    var id_kab = $('#kotkabtxt').val();
                    if (data.stat) {
                        var i;
                        for (i = 0; i < data.kabupaten.length; i++) {
                            var sel = document.getElementById("kabtxt");
                            var opt = document.createElement("option");
                            opt.value = data.kabupaten[i].id_kabupaten;
                            opt.text = data.kabupaten[i].kabupaten;
                            sel.add(opt, sel.options[i]);
                        }
                        if (id_kab !== '') {
                            $('#kabtxt').val(id_kab);
                            $('#kabtxt').trigger('change');
                        } else {
                            $('#kabtxt').val('');
                            $('#kabtxt').trigger('change');
                        }
                        Swal.close();
                    } else {
                        Swal.fire({
                            text: data.msgtxt,
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
                        text: "kesalahan saat mendapatkan data kabupaten",
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
                text: "pilih provinsi",
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
@include('cms.footer')