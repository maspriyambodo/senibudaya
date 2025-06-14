@extends('landing.layouts.master')
@section('title', 'Form Pengajuan')
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('cms/css/plugins/select2.min.css'); }}" />
    <link href="{{ asset('froala_editor_4.2.1/css/froala_editor.pkgd.min.css'); }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('froala_editor_4.2.1/css/third_party/image_tui.min.css'); }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <section class="wrapper bg-soft-primary">
        <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
            <div class="row">
                <div class="col-md-10 col-xl-8 mx-auto">
                    <div class="post-header">
                        <h1 class="display-1 mb-5">Form Pengajuan</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="blog single mt-n17">
                        <div class="card shadow-lg">
                            <div class="card-body">

                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-icon alert-dismissible fade show" role="alert">
                                        <i class="uil uil-check-circle"></i> {{ session()->get('success') }}.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-icon alert-dismissible fade show" role="alert">
                                        @foreach ($errors->all() as $error)
                                        <i class="uil uil-times-circle"></i> {{ $error }}.
                                        @endforeach
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <form id="pengajuanForm" action="{{ route('form-pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-floating mb-4">
                                        <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama" value="{{ old('nama') }}" autocomplete="off" required>
                                        <label for="nama">Judul</label>
                                        @if ($errors->has('nama'))
                                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-floating mb-4">
                                        <textarea id="body" name="body"></textarea>
                                        @if ($errors->has('body'))
                                        <span class="text-danger">{{ $errors->first('body') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input name="pencipta" id="pencipta" type="text" class="form-control" placeholder="Pencipta" value="{{ old('pencipta') }}" autocomplete="off" required>
                                        <label for="pencipta">Pencipta</label>
                                        @if ($errors->has('pencipta'))
                                        <span class="text-danger">{{ $errors->first('pencipta') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-select-wrapper mb-4">
                                        <select name="id_category" class="form-select select2" aria-label="Pilih Kategori" required>
                                            <option value="" selected disabled hidden>Pilih Kategori</option>
                                            @foreach($categories_our_collection as $item)
                                                <option value="{{ $item->id }}" {{ old('id_category') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('id_category'))
                                        <span class="text-danger">{{ $errors->first('id_category') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-select-wrapper mb-4">
                                        <select name="sub_category" class="form-select select2" aria-label="Pilih Kategori" required>
                                            <option value="" selected disabled hidden>Pilih Sub Kategori</option>
                                            @foreach($sub_category as $item2)
                                                <option value="{{ $item2->id }}" {{ old('sub_category') == $item2->id ? 'selected' : '' }}>{{ $item2->nama }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('sub_category'))
                                        <span class="text-danger">{{ $errors->first('sub_category') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-control mb-4">
                                        <label for="banner_path">Thumbnail <span id="form-pendaftaran"></span></label>
                                        <input name="banner_path" id="banner_path" type="file" class="form-control" accept="image/*" placeholder="Thumbnail" required>
                                        @if ($errors->has('banner_path'))
                                        <span class="text-danger">{{ $errors->first('banner_path') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-floating mb-4">
                                        <input name="banner_source" id="sumber_pict" type="text" class="form-control" placeholder="Sumber gambar" value="{{ old('banner_source') }}" autocomplete="off" required>
                                        <label for="pencipta">Sumber gambar</label>
                                        @if ($errors->has('banner_source'))
                                        <span class="text-danger">{{ $errors->first('banner_source') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-select-wrapper mb-4">
                                        <select name="kd_prov" class="form-select select2" aria-label="Pilih Provinsi" onchange="getKabKota(this.value);">
                                            <option value="" selected disabled hidden>Pilih Provinsi</option>
                                            @foreach($provinsis as $item)
                                                <option value="{{ $item->id_provinsi }}" {{ old('kd_prov') == $item->id_provinsi ? 'selected' : '' }}>{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('kd_prov'))
                                        <span class="text-danger">{{ $errors->first('kd_prov') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-select-wrapper mb-4">
                                        <select name="kd_kabkota" id="kd_kabkota" class="form-select select2" aria-label="Pilih Kabupaten/Kota">
                                            <option value="" selected disabled hidden>Pilih Kabupaten/Kota</option>
                                        </select>
                                        @if ($errors->has('kd_kabkota'))
                                        <span class="text-danger">{{ $errors->first('kd_kabkota') }}</span>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('cms/js/plugins/select2.full.min.js'); }}"></script>
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
            editor.html.set('<p>My custom paragraph.</p>');
        });

    </script>

    <script>
        function getKabKota(id) {
            if (!id) {
                $("#kd_kabkota").html("<option value='' selected disabled hidden>Pilih Kabupaten/Kota</option>");
                return;
            }
            $.get("/get-kabkota/" + id, function(result) {
                result = JSON.parse(result);
                option = "<option value='' selected disabled hidden>Pilih Kabupaten/Kota</option>";
                let oldValue = "{{ old('kd_kabkota') }}";
                for (item of result) {
                    let selected = (oldValue && oldValue == item.id_kabupaten) ? "selected" : "";
                    option += `<option value="${item.id_kabupaten}" ${selected}>${item.nama}</option>`;
                }
                $("#kd_kabkota").html(option);
            });
        }

        $(document).ready(function() {
            let oldFakultas = "{{ old('kd_prov') }}";
            if (oldFakultas) {
                getKabKota(oldFakultas);
            }
        });
    </script>
@endsection