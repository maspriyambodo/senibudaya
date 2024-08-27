@extends('landing.layouts.master')
@section('title', 'Form Pengajuan')
@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
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
                                        <div id="editor-container" style="height: 500px;"></div>
                                        <input type="file" id="media-upload" accept="image/*,video/*,audio/*" style="display: none;">
                                        <input type="hidden" name="editor-container" id="editor-content">
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
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script>
        const BlockEmbed = Quill.import('blots/block/embed');
        class VideoBlot extends BlockEmbed {
            static create(value) {
                let node = super.create();
                node.setAttribute('src', value);
                node.setAttribute('controls', 'controls');
                node.setAttribute('style', 'width: 100%;');
                return node;
            }

            static value(node) {
                return node.getAttribute('src');
            }
        }
        VideoBlot.blotName = 'video';
        VideoBlot.tagName = 'video';
        Quill.register(VideoBlot);

        class AudioBlot extends BlockEmbed {
            static create(value) {
                let node = super.create();
                node.setAttribute('src', value);
                node.setAttribute('controls', 'controls');
                node.setAttribute('style', 'width: 100%;');
                return node;
            }

            static value(node) {
                return node.getAttribute('src');
            }
        }
        AudioBlot.blotName = 'audio';
        AudioBlot.tagName = 'audio';
        Quill.register(AudioBlot);

        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: {
                    container: [
                        [{ 'font': [] }],
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'color': [] }, { 'background': [] }],
                        [{ 'script': 'sub'}, { 'script': 'super' }],
                        ['blockquote', 'code-block'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'indent': '-1'}, { 'indent': '+1' }],
                        [{ 'direction': 'rtl' }],
                        [{ 'align': [] }],
                        ['link', 'image', 'video']
                    ],
                    handlers: {
                        'image': function() {
                            document.getElementById('media-upload').click();
                        }
                    }
                }
            }
        });

        document.getElementById('media-upload').addEventListener('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var range = quill.getSelection(true);
                    if (file.type.startsWith('image/')) {
                        quill.insertEmbed(range.index, 'image', e.target.result);
                    } else if (file.type.startsWith('video/')) {
                        quill.insertEmbed(range.index, 'video', e.target.result);
                    } else if (file.type.startsWith('audio/')) {
                        quill.insertEmbed(range.index, 'audio', e.target.result);
                    }
                    quill.setSelection(range.index + 1);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('pengajuanForm');
        var quillEditor = quill;

        form.addEventListener('submit', function(e) {
          var editorContent = document.querySelector('input[name="editor-container"]');
          var editorHtml = quillEditor.root.innerHTML.trim();

          editorContent.value = editorHtml;

          var formData = new FormData(form);
          for (var pair of formData.entries()) {
            console.log(pair[0] + ': ' + (pair[1] instanceof File ? pair[1].name : pair[1]));
          }
        });
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