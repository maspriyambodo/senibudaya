@include('cms.header')
<link rel="stylesheet" href="{{asset('cms/css/plugins/trumbowyg.min.css')}}" />

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
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
							<li class="breadcrumb-item"><a href="#!">Konsultasi</a></li>
							<li class="breadcrumb-item"><a href="{{ url($current) }}">{{ $title }}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
		
		<div class="row">
			<!-- [ sample-page ] start -->
			<div class="col-sm-12">
				<div class="card">
					<form action="{{ url($current) }}/store" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
						@csrf
						<div class="card-body">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Nama Lengkap</label>
								<div class="col-sm-1 pt-2">:</div>
								<div class="col-sm-8 pt-2">{{ $data->nama_konsultasi }}</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Alamat Email</label>
								<div class="col-sm-1 pt-2">:</div>
								<div class="col-sm-8 pt-2">{{ $data->email_konsultasi }}</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Kabupaten/Kota</label>
								<div class="col-sm-1 pt-2">:</div>
								<div class="col-sm-8 pt-2">{{ $data->kota_konsultasi }}</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Jenis Kelamin</label>
								<div class="col-sm-1 pt-2">:</div>
								<div class="col-sm-8 pt-2">{{ $data->kelamin_konsultasi == 'p' ? 'Perempuan' : 'Laki-laki' }}</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Usia</label>
								<div class="col-sm-1 pt-2">:</div>
								<div class="col-sm-8 pt-2">{{ $data->usia_konsultasi }} Tahun</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Judul</label>
								<div class="col-sm-1 pt-2">:</div>
								<div class="col-sm-8 pt-2"><strong>{{ $data->judul_konsultasi }}</strong></div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Isi Pertanyaan</label>
								<div class="col-sm-1 pt-2">:</div>
								<div class="col-sm-8 pt-2">{!! nl2br($data->detail_konsultasi) !!}</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Kategori</label>
								<div class="col-sm-1 pt-2">:</div>
								<div class="col-sm-6">
									<select id="id_jenis" name="id_jenis" class="form-control select2-single" {{ noEmpty('Kategori tidak boleh kosong.', true) }}>
										@foreach($jenis as $j)
										@if ($data->id_jenis == $j->id)
										<option value="{{ $j->id }}" selected>{{ $j->nama_jenis }}</option>
										@else
										<option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
										@endisset
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Status</label>
								<div class="col-sm-1 pt-2">:</div>
								<div class="col-sm-6 switch switch-success">
									<input type="checkbox" id="status_konsultasi" name="status_konsultasi" {{ $data->status_konsultasi == 't' ? 'checked' : '' }}  />
									<label for="status_konsultasi" class="cr"></label>
									<label for="status_konsultasi">Aktif ?</label>
								</div>
							</div>
							<input id="id" name="id" value="{{ $data->id }}" type="hidden">
							<textarea id="jawab_konsultasi" name="jawab_konsultasi" class="w-100 border-0" {{ noEmpty('Jawaban tidak boleh kosong.', true) }}>{{ $data->jawab_konsultasi }}</textarea>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary w-25 ml-1">Simpan</button>
							<a href="{{ url($current) }}" class="btn btn-light w-25" >Batal</a>
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

<script src="{{asset('cms/js/consultation/'.$current.'.js')}}"></script>
<script src="{{asset('cms/js/plugins/trumbowyg.min.js')}}"></script>
<script src="{{asset('cms/js/plugins/trumbowyg.upload.js')}}"></script>
<script type="text/javascript">
    $(window).on('load', function() {
       $('#jawab_konsultasi')
		.trumbowyg({
			semantic: false,
			svgPath: "{{asset('cms/css/plugins/icons.svg')}}",
			btnsDef: {
				// Create a new dropdown
				image: {
					dropdown: ['insertImage', 'upload'],
					ico: 'insertImage'
				}
			},
			// Redefine the button pane
			btns: [
				['viewHTML'],
				['formatting'],
				['strong', 'em', 'del'],
				['superscript', 'subscript'],
				['link'],
				['image'], // Our fresh created dropdown
				['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
				['unorderedList', 'orderedList'],
				['horizontalRule'],
				['removeformat'],
				['fullscreen']
			],
			plugins: {
				upload: {
					serverPath: "{{ url('background/upload') }}",
					fileFieldName: 'image_file',
				}
			}
			});
    });
</script>

@include('cms.footer')	