@extends('landing.layouts.master')
@section('title', 'Form Pengajuan')
@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/third_party/image_tui.min.css' rel='stylesheet' type='text/css' />
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
                                @if (session()->has('error'))
                                    <div class="alert alert-danger alert-icon alert-dismissible fade show" role="alert">
                                        <i class="uil uil-times-circle"></i> {{ session()->get('error') }}.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <form id="pengajuanForm" action="{{ route('form-pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-floating mb-4">
                                        <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama" value="{{ old('nama') }}" autocomplete="off" required>
                                        <label for="nama">Nama</label>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <textarea id="body" name="body"></textarea>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input name="pencipta" id="pencipta" type="text" class="form-control" placeholder="Pencipta" value="{{ old('pencipta') }}" autocomplete="off" required>
                                        <label for="pencipta">Pencipta</label>
                                    </div>

                                    <div class="form-select-wrapper mb-4">
                                        <select name="id_category" class="form-select select2" aria-label="Pilih Kategori" required>
                                            <option value="" selected disabled hidden>Pilih Kategori</option>
                                            @foreach($categories_our_collection as $item)
                                                <option value="{{ $item->id }}" {{ old('id_category') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-control mb-4">
                                        <label for="banner_path">Thumbnail <span id="form-pendaftaran"></span></label>
                                        <input name="banner_path" id="banner_path" type="file" class="form-control" accept="image/*" placeholder="Thumbnail" required>
                                    </div>

                                    <div class="form-select-wrapper mb-4">
                                        <select name="kd_prov" class="form-select select2" aria-label="Pilih Provinsi" onchange="getKabKota(this.value)" required>
                                            <option value="" selected disabled hidden>Pilih Provinsi</option>
                                            @foreach($provinsis as $item)
                                                <option value="{{ $item->id_provinsi }}" {{ old('kd_prov') == $item->id_provinsi ? 'selected' : '' }}>{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-select-wrapper mb-4">
                                        <select name="kd_kabkota" id="kd_kabkota" class="form-select select2" aria-label="Pilih Kabupaten/Kota" required>
                                            <option value="" selected disabled hidden>Pilih Kabupaten/Kota</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary rounded-pill">Daftar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/third_party/image_tui.min.js'></script>
    <script>
        new FroalaEditor('#body', {
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
                },
            }
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
@endpush