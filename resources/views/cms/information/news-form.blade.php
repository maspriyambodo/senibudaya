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
                    <form action="{{ url($current) }}/store" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-8">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    <select id="kategoritxt" name="kategoritxt" class="form-control" {{ noEmpty( 'Kategori tidak boleh kosong.') }}>
                                        <option value="">-- pilih kategori --</option>
                                        <option value="1"{{ $data->id_category == 1 ? ' selected=""' : '' }}>Audio</option>
                                        <option value="2"{{ $data->id_category == 2 ? ' selected=""' : '' }}>Video</option>
                                        <option value="3"{{ $data->id_category == 3 ? ' selected=""' : '' }}>Gambar</option>
                                        <option value="4"{{ $data->id_category == 4 ? ' selected=""' : '' }}>Tulisan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Judul</label>
                                <input id="id" name="id" value="{{ $id_berita }}" type="hidden">
                                <div class="col-sm-8">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    <input id="nama_berita" name="nama_berita" value="{{ $data->nama }}" type="text" class="form-control" {{ noEmpty( 'Judul tidak boleh kosong.') }} autocomplete="off">
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
                            <button type="submit" class="btn btn-primary w-25 ml-1">Simpan</button>
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
        }, function(){
//            editor.html.set('<p>My custom paragraph.</p>');
        });
        
    </script>
<script type="text/javascript">
    $(document).ready(function() {
    $('.form-select').select2();
    var id_prov = $('#provtxt').val();
    if (id_prov != '') {
        $('#provtxt').trigger('change.select2');
    }
});

function provinsi(id_prov) {
    Swal.fire({
        title: 'memuat data...',
        html: '<img src="{{ asset("cms/images/loading.gif"); }}" title="Sedang Diverifikasi" class="h-100px w-100px" alt="">',
        allowOutsideClick: false,
        showConfirmButton: false,
        onOpen: function() {
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
            success: function(data) {
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
                    }).then(function() {
                        window.location.reload();
                    });
                }
            },
            error: function() {
                Swal.fire({
                    text: "kesalahan saat mendapatkan data kabupaten",
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

    }
}
</script>

@include('cms.footer')	