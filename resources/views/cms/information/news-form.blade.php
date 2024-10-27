@include('cms.header')
<link href="{{ asset('froala_editor_4.2.1/css/froala_editor.pkgd.min.css'); }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('froala_editor_4.2.1/css/third_party/image_tui.min.css'); }}" rel="stylesheet" type="text/css"/>
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
                            <li class="breadcrumb-item"><a href="#!">Informasi</a></li>
                            <li class="breadcrumb-item"><a href="{{ url($current) }}">{{ $title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{ alertInfo() }}
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <form id="form_news" action="{{ url($current) }}/store" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-8">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    <select id="kategoritxt" name="kategoritxt" class="form-control" {{ noEmpty( 'Kategori tidak boleh kosong.') }}>
                                        <option value="">-- pilih kategori --</option>
                                        @foreach($kategori_collection as $kategori1)
                                        @if($kategori1->id_sub_category == 0)
                                        <option value="{{ $kategori1->id }}"{{ $data->id_category == $kategori1->id ? ' selected=""' : '' }}>{{ $kategori1->nama }}</option>
                                        @else
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Sub Kategori</label>
                                <div class="col-sm-8">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    <select id="kategori2txt" name="kategori2txt" class="form-control" {{ noEmpty( 'Sub Kategori tidak boleh kosong.') }}>
                                        <option value="">-- pilih subkategori --</option>
                                        @foreach($kategori_collection as $kategori2)
                                        @if($kategori2->id_sub_category == 1)
                                        <option value="{{ $kategori2->id }}"{{ $data->sub_category == $kategori2->id ? ' selected=""' : '' }}>{{ $kategori2->nama }}</option>
                                        @else
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Judul</label>
                                <input id="id" name="id" value="{{ $id_berita }}" type="hidden">
                                <div class="col-sm-8">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    <input id="nama_berita" name="nama_berita" value="{{ $data->nama }}" type="text" class="form-control" {{ noEmpty( 'Judul tidak boleh kosong.') }} onchange="create_slug(this.value);" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Slug</label>
                                <div class="col-sm-8">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    <input id="slugtxt" name="slugtxt" value="{{ $data->slug }}" type="text" class="form-control" {{ noEmpty( 'slug tidak boleh kosong.') }} autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pencipta</label>
                                <div class="col-sm-8">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    <input id="penciptatxt" name="penciptatxt" value="{{ $data->pencipta }}" type="text" class="form-control" {{ noEmpty( 'Pencipta tidak boleh kosong.') }} autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-8">
                                    <select name="provtxt" id="provtxt" class="form-control form-select" onchange="provinsi(this.value)">
                                        <option value="">pilih provinsi</option>
                                        @foreach($provinsi as $dt_prov)
                                        @if($data->kd_prov == $dt_prov->id_provinsi)
                                        <option value="{{ $dt_prov->id_provinsi }}" selected>{{ $dt_prov->provinsi }}</option>
                                        @else
                                        <option value="{{ $dt_prov->id_provinsi }}">{{ $dt_prov->provinsi }}</option>
                                        @endif @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kabupaten</label>
                                <div class="col-sm-8">
                                    <select name="kabtxt" id="kabtxt" class="form-control form-select"></select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input id="image_berita" name="image_berita" type="file" accept="image/*" class="custom-file-input">
                                        <label class="custom-file-label" for="image_berita">Pilih Gambar</label>
                                    </div>
                                    <img id="img_berita" class="user-img-radious-style mt-1 w-25 @if(empty($data->banner_path)) d-none @else" src="{{ url($data->banner_path) }}@endif">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Sumber Gambar</label>
                                <div class="col-sm-8">
                                    <input id="srcpicttxt" name="srcpicttxt" type="text" class="form-control" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-6 switch switch-success">
                                    <input type="checkbox" id="status_berita" name="status_berita" {{ $data->status == 1 ? 'checked' : '' }} />
                                    <label for="status_berita" class="cr"></label>
                                    <label for="status_berita">Aktif ?</label>
                                </div>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea id="body" name="detail_berita">{{ $data->body }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button id="btnsub" type="button" class="btn btn-primary w-25 ml-1" onclick="simpan();">Simpan</button>
                            <a href="{{ url($current) }}" class="btn btn-light w-25">Batal</a>
                            <span class="text-validation bottom-validation"></span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<input type="hidden" id="kotkabtxt" name="kotkabtxt" value="{{ $data->kd_kabkota }}" />
<script src="{{asset('cms/js/information/'.$current.'.js')}}"></script>
<script src="{{ asset('froala_editor_4.2.1/js/froala_editor.pkgd.min.js'); }}" type="text/javascript"></script>
<script src="{{ asset('froala_editor_4.2.1/js/third_party/image_tui.min.js'); }}" type="text/javascript"></script>
<script>
                                var editor = new FroalaEditor('#body', {
                                    height: 400,
                                    filesManagerUploadURL: '{{ route("form-pengajuan.upload-media") }}',
                                    filesManagerUploadParams: {
                                        _token: '{{ csrf_token() }}'
                                    },
                                    filesManagerAllowedTypes: ['audio/mpeg', 'audio/wav', 'audio/ogg', 'video/mp4', 'video/quicktime', 'video/webm', 'application/pdf', 'application/msword', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'image/jpeg', 'image/png', 'image/gif'],
                                    quickInsertEnabled: false,
                                    toolbarButtons: {
                                        moreText: {
                                            buttons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript'],
                                            align: 'left',
                                            buttonsVisible: 5
                                        },
                                        moreParagraph: {
                                            buttons: ['alignLeft', 'alignCenter', 'alignRight', 'alignJustify', 'formatOLSimple', 'formatUL', 'paragraphFormat'],
                                            align: 'left',
                                            buttonsVisible: 5
                                        },
                                        moreMisc: {
                                            buttons: ['undo', 'redo', 'html'],
                                            align: 'right',
                                            buttonsVisible: 3
                                        },
                                        moreRich: {
                                            buttons: [],
                                            align: 'left',
                                            buttonsVisible: 0
                                        },
                                        insertFiles: {
                                            buttons: ['insertFiles'],
                                            align: 'left',
                                            buttonsVisible: 4
                                        }
                                    },
                                    events: {
                                        'filesManager.uploaded': function (response) {
                                            console.log('File berhasil di-upload:', response);
                                            return response.link;
                                        },
                                        'filesManager.error': function (error, response) {
                                            console.error('File upload error:', error);
                                        }
                                    }
                                }, function () {
//            editor.html.set('<p>My custom paragraph.</p>');
                                });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.form-select').select2();
        var id_prov = $('#provtxt').val();
        if (id_prov != '') {
            $('#provtxt').trigger('change.select2');
        }
    });
    function create_slug(nama_berita) {
        var id_berita = $('input[name="id"]').val();
        var slug;
        var trimmed = $.trim(nama_berita);
        slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                replace(/-+/g, '-').
                replace(/^-|-$/g, '');
        $('input[name="slugtxt"]').val(slug.toLowerCase());
        if (nama_berita !== '') {
            $.ajax({
                url: "{{ url('news/check_slug?slug='); }}" + slug.toLowerCase() + "&id_berita=" + id_berita,
                type: "GET",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function (data) {
                    if (!data.stat) {
                        Swal.fire({
                            text: data.msgtxt,
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                        return false;
                    } else {
                        return true;
                    }
                },
                error: function () {
                    return true;
                }
            });
        } else {
            Swal.fire({
                text: 'slug belum diisi!',
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
            return false;
        }
    }

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

        }
    }

    function simpan() {
        var kategori, subkategori, judul, slug, submit_form;
        kategori = $('select#kategoritxt').val();
        subkategori = $('select#kategori2txt').val();
        judul = $('input[name="nama_berita"]').val();
        slug = $('input[name="slugtxt"]').val();
        submit_form = true;
        if (kategori === '') {
            submit_form = false;
            Swal.fire({
                text: 'kategori tidak boleh kosong!',
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
            return false;
        }
        if (subkategori === '') {
            submit_form = false;
            Swal.fire({
                text: 'sub kategori tidak boleh kosong!',
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
            return false;
        }
        if (judul === '') {
            submit_form = false;
            Swal.fire({
                text: 'judul tidak boleh kosong!',
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
            return false;
        }
        if (slug === '') {
            submit_form = false;
            Swal.fire({
                text: 'slug tidak boleh kosong!',
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
            return false;
        } else {
            $.ajax({
                url: "{{ url('news/check_slug?slug='); }}" + slug,
                type: "GET",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function (data) {
                    if (!data.stat) {
                        Swal.fire({
                            text: data.msgtxt,
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                        submit_form = false;
                        return false;
                    } else {
                        return true;
                    }
                },
                error: function () {
                    return true;
                }
            });
        }

        if (submit_form) {
            $("#form_news").submit();
        } else {
            $("#btnsub").attr("type", "button");
        }
    }
</script>

@include('cms.footer')	