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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Informasi</a></li>
                            <li class="breadcrumb-item"><a href="{{ url($current) }}">{{ $title }}</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Add</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear" style="margin-top:5%;"></div>
        <form id="form_monitoring" action="{{ url($current) }}/store/?q=add" method="post" enctype="multipart/form-data" class="needs-validation form" novalidate="">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Monitoring</h5>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Monitoring</label>
                        <div class="col-sm-8">
                            <input id="notxt" type="text" name="notxt" class="form-control" placeholder="otomatis by system" readonly=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Monitoring</label>
                        <div class="col-sm-8">
                            <input id="tgltxt" type="text" name="tgltxt" class="form-control" required="" readonly=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-8">
                            <select name="provtxt" id="provtxt" class="form-control form-select" required="" onchange="provinsi(this.value, 'provtxt', 1)">
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
                            <select name="kabtxt" id="kabtxt" class="form-control form-select" required=""></select>
                        </div>
                    </div>
                    <div id="pegclone" class="form-group row">
                        <label class="col-sm-2 col-form-label">Petugas Monitoring 1</label>
                        <div class="col-sm-6">
                            <select name="petugastxt[]" id="petugastxt1" class="form-control form-select" required="">
                                <option value="">pilih pegawai</option>
                                @foreach($pegawai as $dt_pegawai)
                                <option value="{{ $dt_pegawai->id }}">{{ $dt_pegawai->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input id="countpeg" type="hidden" name="countpeg" value="1"/>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" onclick="tambahPegawai()"><i class="feather icon-plus"></i> Tambah Petugas</button>
                        </div>
                    </div>
                    <div id="pegelem"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lembaga Seni Budaya Islam</h5>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lembaga/Sanggar</label>
                        <div class="col-sm-8">
                            <input type="text" id="nmlemtxt1" name="nmlemtxt[]" class="form-control"/>
                            <input type="hidden" name="countlem" id="countlem" value="1"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-8">
                            <select id="provlemtxt1" name="provlemtxt[]" class="form-control form-select" onchange="provinsi(this.value, 'provlemtxt1', 1)">
                                <option value="">pilih provinsi</option>
                                @foreach($provinsi as $dt_prov2)
                                <option value="{{ $dt_prov2->id_provinsi }}">{{ $dt_prov2->provinsi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kabupaten</label>
                        <div class="col-sm-8">
                            <select id="kablemtxt1" name="kablemtxt[]" class="form-control form-select" required=""></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-8">
                            <select id="keclemtxt1" name="keclemtxt[]" class="form-control form-select"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kelurahan</label>
                        <div class="col-sm-8">
                            <select id="kellemtxt1" name="kellemtxt[]" class="form-control form-select"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea id="addrlemtxt1" name="addrlemtxt[]" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Fokus</label>
                        <div class="col-sm-8">
                            <input type="text" id="foclemtxt1" name="foclemtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tingkat</label>
                        <div class="col-sm-8">
                            <input type="text" id="tinlemtxt1" name="tinlemtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Program</label>
                        <div class="col-sm-8">
                            <input type="text" id="prolemtxt1" name="prolemtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div id="lemelem"></div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-success" onclick="tambahLembaga()"><i class="feather icon-plus"></i> Tambah</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Seniman & Budayawan Muslim</h5>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" id="nmsenbudtxt1" name="nmsenbudtxt[]" class="form-control"/>
                            <input type="hidden" name="countsenbud" id="countsenbud" value="1"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-8">
                            <select id="provsenbudtxt1" name="provsenbudtxt[]" class="form-control form-select" onchange="provinsi(this.value, 'provsenbudtxt1', 1)">
                                <option value="">pilih provinsi</option>
                                @foreach($provinsi as $dt_prov3)
                                <option value="{{ $dt_prov3->id_provinsi }}">{{ $dt_prov3->provinsi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kabupaten</label>
                        <div class="col-sm-8">
                            <select id="kabsenbudtxt1" name="kabsenbudtxt[]" class="form-control form-select"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-8">
                            <select id="kecsenbudtxt1" name="kecsenbudtxt[]" class="form-control form-select"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kelurahan</label>
                        <div class="col-sm-8">
                            <select id="kelsenbudtxt1" name="kelsenbudtxt[]" class="form-control form-select"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea id="addrsenbudtxt1" name="addrsenbudtxt[]" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Bidang</label>
                        <div class="col-sm-8">
                            <input type="text" id="bidsenbudtxt1" name="bidsenbudtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Karya</label>
                        <div class="col-sm-8">
                            <input type="text" id="karsenbudtxt1" name="karsenbudtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Lembaga/Organisasi</label>
                        <div class="col-sm-8">
                            <input type="text" id="orgsenbudtxt1" name="orgsenbudtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div id="senElem"></div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-success" onclick="tambahSeniman();"><i class="feather icon-plus"></i> Tambah</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Program Seni Budaya Islam (Pembinaan/Festival, dan sejenisnya)</h5>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-8">
                            <input type="text" id="prgnmtxt1" name="prgnmtxt[]" class="form-control"/>
                            <input type="hidden" name="countprog" id="countprog" value="1"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Frekuensi</label>
                        <div class="col-sm-8">
                            <input type="text" id="prgfretxt1" name="prgfretxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tujuan</label>
                        <div class="col-sm-8">
                            <input type="text" id="prgtujtxt1" name="prgtujtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Unsur Peserta</label>
                        <div class="col-sm-8">
                            <input type="text" id="prgunstxt1" name="prgtunstxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Waktu</label>
                        <div class="col-sm-8">
                            <input type="text" id="prgwkttxt1" name="prgwkttxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Penyelenggara</label>
                        <div class="col-sm-8">
                            <input type="text" id="prgpnytxt1" name="prgpnytxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div id="progElem"></div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-success" onclick="tambahProg();"><i class="feather icon-plus"></i> Tambah</button>
                </div>
            </div>
            <div class="card">
                <div class="card-footer">
                    <div class="text-center">
                        <a href="{{ url('monitoring'); }}" class="btn btn-secondary mr-2"><i class="feather icon-x"></i> Batal</a>
                        <button type="submit" class="btn btn-success"><i class="feather icon-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </form>
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
    function tambahProg() {
        Swal.fire({
            title: 'memuat data...',
            html: '<img src="{{ asset("cms/images/loading.gif"); }}" title="Sedang Diverifikasi" class="h-100px w-100px" alt="">',
            allowOutsideClick: false,
            showConfirmButton: false,
            onOpen: function () {
                Swal.showLoading();
            }
        });
        var progCount = $('#countprog').val();
        var tot_Prog = parseInt(progCount, 10) + 1;
        $('#countprog').val(tot_Prog);
        $('#progElem').append(`<div id="progElem` + tot_Prog + `">
                    <h5 class="card-title">Program Seni Budaya Islam ` + tot_Prog + `</h5>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-8">
                            <input type="text" id="prgnmtxt` + tot_Prog + `" name="prgnmtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Frekuensi</label>
                        <div class="col-sm-8">
                            <input type="text" id="prgfretxt` + tot_Prog + `" name="prgfretxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tujuan</label>
                        <div class="col-sm-8">
                            <input type="text" id="prgtujtxt` + tot_Prog + `" name="prgtujtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Unsur Peserta</label>
                        <div class="col-sm-8">
                            <input type="text" id="prgunstxt` + tot_Prog + `" name="prgtunstxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Waktu</label>
                        <div class="col-sm-8">
                            <input type="text" id="prgwkttxt` + tot_Prog + `" name="prgwkttxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Penyelenggara</label>
                        <div class="col-sm-8">
                            <input type="text" id="prgpnytxt` + tot_Prog + `" name="prgpnytxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                            <div class="text-right">
                                <button type="button" class="btn btn-danger" onclick="removeProg(` + tot_Prog + `);"><i class="feather icon-trash"></i> Hapus Program Seni Budaya Islam ` + tot_Prog + `</button>
                            </div>
                        </div>
                    </div>
                </div>
                `);
        $('html, body').animate({
            scrollTop: $("#progElem" + tot_Prog).offset().top - 72
        }, 2000);
        Swal.close();
    }
    function removeProg(val) {
        $('#progElem' + val).remove();
        $('#countprog').val(parseInt(val, 10) - 1);
    }
</script>
<script>
    function tambahSeniman() {
        Swal.fire({
            title: 'memuat data...',
            html: '<img src="{{ asset("cms/images/loading.gif"); }}" title="Sedang Diverifikasi" class="h-100px w-100px" alt="">',
            allowOutsideClick: false,
            showConfirmButton: false,
            onOpen: function () {
                Swal.showLoading();
            }
        });
        var senbudcount = $('#countsenbud').val();
        var tot_Senbud = parseInt(senbudcount, 10) + 1;
        $('#countsenbud').val(tot_Senbud);
        $('#senElem').append(`<div id="senElem` + tot_Senbud + `">
                <h5 class="card-title">Seniman & Budayawan Muslim ` + tot_Senbud + `</h5>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" id="nmsenbudtxt` + tot_Senbud + `" name="nmsenbudtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-8">
                            <select id="provsenbudtxt` + tot_Senbud + `" name="provsenbudtxt[]" class="form-control form-select" onchange="provinsi(this.value, 'provsenbudtxt` + tot_Senbud + `', ` + tot_Senbud + `)">
                                <option value="">pilih provinsi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kabupaten</label>
                        <div class="col-sm-8">
                            <select id="kabsenbudtxt` + tot_Senbud + `" name="kabsenbudtxt[]" class="form-control form-select"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-8">
                            <select id="kecsenbudtxt` + tot_Senbud + `" name="kecsenbudtxt[]" class="form-control form-select"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kelurahan</label>
                        <div class="col-sm-8">
                            <select id="kelsenbudtxt` + tot_Senbud + `" name="kelsenbudtxt[]" class="form-control form-select"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea id="addrsenbudtxt` + tot_Senbud + `" name="addrsenbudtxt[]" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Bidang</label>
                        <div class="col-sm-8">
                            <input type="text" id="bidsenbudtxt` + tot_Senbud + `" name="bidsenbudtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Karya</label>
                        <div class="col-sm-8">
                            <input type="text" id="karsenbudtxt` + tot_Senbud + `" name="karsenbudtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Lembaga/Organisasi</label>
                        <div class="col-sm-8">
                            <input type="text" id="orgsenbudtxt` + tot_Senbud + `" name="orgsenbudtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                            <div class="text-right">
                                <button type="button" class="btn btn-danger" onclick="removeSenbud(` + tot_Senbud + `);"><i class="feather icon-trash"></i> Hapus Seniman & Budayawan Islam ` + tot_Senbud + `</button>
                            </div>
                        </div>
                    </div>
                </div>
                `);
        $.ajax({
            url: "{{ url('monitoring/provinsi'); }}",
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data, textStatus, jqXHR) {
                if (data.success) {
                    var i;
                    for (i = 0; i < data.dt_prov.length; i++) {
                        var sel = document.getElementById("provsenbudtxt" + tot_Senbud);
                        var opt = document.createElement("option");
                        opt.value = data.dt_prov[i].id;
                        opt.text = data.dt_prov[i].nama;
                        sel.add(opt, sel.options[i]);
                    }
                    Swal.close();
                    $('#provsenbudtxt' + tot_Senbud).select2({
                        placeholder: "pilih provinsi"
                    });
                    $('#provsenbudtxt' + tot_Senbud).val('').trigger('change');
                    $('html, body').animate({
                        scrollTop: $("#senElem" + tot_Senbud).offset().top - 72
                    }, 2000);
                } else {
                    Swal.fire({
                        text: "error get data provinsi, errcode: 2358",
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
                    text: "error get data provinsi, errcode: 2357",
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
    function removeSenbud(val) {
        $('#senElem' + val).remove();
        $('#countsenbud').val(parseInt(val, 10) - 1);
    }
</script>
<script>
    function tambahLembaga() {
        Swal.fire({
            title: 'memuat data...',
            html: '<img src="{{ asset("cms/images/loading.gif"); }}" title="Sedang Diverifikasi" class="h-100px w-100px" alt="">',
            allowOutsideClick: false,
            showConfirmButton: false,
            onOpen: function () {
                Swal.showLoading();
            }
        });
        var countlem = $('#countlem').val();
        var tot_lem = parseInt(countlem, 10) + 1;
        $('#countlem').val(tot_lem);
        $('#lemelem').append(`<div id="lemelem` + tot_lem + `"><h5 class="card-title">Lembaga Seni Budaya Islam ` + tot_lem + `</h5><div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lembaga/Sanggar</label>
                        <div class="col-sm-8">
                            <input type="text" id="nmlemtxt` + tot_lem + `" name="nmlemtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-8">
                            <select id="provlemtxt` + tot_lem + `" name="provlemtxt[]" class="form-control form-select" onchange="provinsi(this.value, 'provlemtxt` + tot_lem + `', ` + tot_lem + `)">
                                <option value="">pilih provinsi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kabupaten</label>
                        <div class="col-sm-8">
                            <select id="kablemtxt` + tot_lem + `" name="kablemtxt[]" class="form-control form-select"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-8">
                            <select id="keclemtxt` + tot_lem + `" name="keclemtxt[]" class="form-control form-select"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kelurahan</label>
                        <div class="col-sm-8">
                            <select id="kellemtxt` + tot_lem + `" name="kellemtxt[]" class="form-control form-select"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea id="addrlemtxt` + tot_lem + `" name="addrlemtxt[]" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Fokus</label>
                        <div class="col-sm-8">
                            <input type="text" id="foclemtxt` + tot_lem + `" name="foclemtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tingkat</label>
                        <div class="col-sm-8">
                            <input type="text" id="tinlemtxt` + tot_lem + `" name="tinlemtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Program</label>
                        <div class="col-sm-8">
                            <input type="text" id="prolemtxt` + tot_lem + `" name="prolemtxt[]" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                            <div class="text-right">
                                <button type="button" class="btn btn-danger" onclick="removeLem(` + tot_lem + `);"><i class="feather icon-trash"></i> Hapus Lembaga Seni Budaya Islam ` + tot_lem + `</button>
                            </div>
                        </div>
                    </div>
                    </div>
        `);
        $.ajax({
            url: "{{ url('monitoring/provinsi'); }}",
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data, textStatus, jqXHR) {
                if (data.success) {
                    var i;
                    for (i = 0; i < data.dt_prov.length; i++) {
                        var sel = document.getElementById("provlemtxt" + tot_lem);
                        var opt = document.createElement("option");
                        opt.value = data.dt_prov[i].id;
                        opt.text = data.dt_prov[i].nama;
                        sel.add(opt, sel.options[i]);
                    }
                    Swal.close();
                    $('#provlemtxt' + tot_lem).select2({
                        placeholder: "pilih provinsi"
                    });
                    $('#provlemtxt' + tot_lem).val('').trigger('change');
                    $('html, body').animate({
                        scrollTop: $("#lemelem" + tot_lem).offset().top - 72
                    }, 2000);
                } else {
                    Swal.fire({
                        text: "error get data provinsi, errcode: 2228",
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
                    text: "error get data provinsi, errcode: 2227",
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
    function removeLem(val) {
        $('#lemelem' + val).remove();
        $('#countlem').val(parseInt(val, 10) - 1);
    }
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
                        <label class="col-sm-2 col-form-label">Petugas Monitoring ` + tot_peg + `</label>
                        <div class="col-sm-6">
                            <select name="petugastxt[]" id="petugastxt` + tot_peg + `" class="form-control form-select" required=""></select>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-danger" onclick="removePegawai(` + tot_peg + `)"><i class="feather icon-trash"></i>Hapus Petugas ` + tot_peg + `</button>
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
                    $('#petugastxt' + tot_peg).select2({
                        placeholder: "pilih pegawai"
                    });
                    $('#petugastxt' + tot_peg).val('').trigger('change');
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
    function provinsi(id_prov, provtxt, idtxt) {
        Swal.fire({
            title: 'memuat data...',
            html: '<img src="{{ asset("cms/images/loading.gif"); }}" title="Sedang Diverifikasi" class="h-100px w-100px" alt="">',
            allowOutsideClick: false,
            showConfirmButton: false,
            onOpen: function () {
                Swal.showLoading();
            }
        });
        var kabtxt = '';
        if (provtxt === 'provtxt') {
            kabtxt = 'kabtxt';
            $('#' + kabtxt).children('option').remove();
            console.log(kabtxt);
        } else if (provtxt === 'provlemtxt' + idtxt) {
            kabtxt = 'kablemtxt' + idtxt;
            console.log(kabtxt);
            $('#' + kabtxt).children('option').remove();
        } else if (provtxt === 'provsenbudtxt' + idtxt) {
            kabtxt = 'kabsenbudtxt' + idtxt;
            console.log(kabtxt);
            $('#' + kabtxt).children('option').remove();
        }
        if (id_prov !== '') {
            $.ajax({
                url: "{{ url('news/kabupaten?id_prov='); }}" + id_prov,
                type: "GET",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function (data) {
                    if (data.stat) {
                        var i;
                        for (i = 0; i < data.kabupaten.length; i++) {
                            var sel = document.getElementById(kabtxt);
                            var opt = document.createElement("option");
                            opt.value = data.kabupaten[i].id_kabupaten;
                            opt.text = data.kabupaten[i].kabupaten;
                            sel.add(opt, sel.options[i]);
                        }
                        $('#' + kabtxt).val('');
                        $('#' + kabtxt).trigger('change');
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
        }
    }
</script>
@include('cms.footer')