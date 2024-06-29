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
		
		{{ alertInfo() }}
		<div class="row">
			<!-- [ sample-page ] start -->
			<div class="col-sm-12">
				<div class="card">
					<form action="{{ url($current) }}/store" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
						@csrf
						<div class="card-header">
							<h6>{{ $data->mode_bimbingan }}</h6>
						</div>
						<div class="card-body">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Judul</label>
								<div class="col-sm-6">
									<input id="id" name="id" value="{{ $data->id }}" type="hidden">
									<input id="nama_bimbingan" name="nama_bimbingan" value="{{ $data->nama_bimbingan }}" type="text" class="form-control" {{ noEmpty('Judul tidak boleh kosong.') }}>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Ringkasan</label>
								<div class="col-sm-6">
									<textarea id="keterangan_bimbingan" name="keterangan_bimbingan" rows="1" class="form-control">{{ $data->keterangan_bimbingan }}</textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Sumber</label>
								<div class="col-sm-6">
									<input id="sumber_bimbingan" name="sumber_bimbingan" value="{{ $data->sumber_bimbingan }}" type="text" class="form-control" >
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Slug</label>
								<div class="col-sm-6">
									<input id="slug_bimbingan" name="slug_bimbingan" value="{{ $data->slug_bimbingan }}" type="text" class="form-control" {{ noEmpty('Slug tidak boleh kosong.') }}>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Image</label>
								<div class="col-sm-6">
									<div class="custom-file">
										<input id="image_bimbingan" name="image_bimbingan" type="file" accept="image/*" class="custom-file-input" >
										<label class="custom-file-label" for="image_bimbingan">Pilih Gambar</label>
									</div>
									<img id="img_bimbingan" class="user-img-radious-style mt-1 w-25 @if(empty($data->image_bimbingan)) d-none @else" src="{{ url('images/bimbingan/'.$data->image_bimbingan) }}@endif">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Status</label>
								<div class="col-sm-6 switch switch-success">
									<input type="checkbox" id="status_bimbingan" name="status_bimbingan" {{ $data->status_bimbingan == 't' ? 'checked' : '' }}  />
									<label for="status_bimbingan" class="cr"></label>
									<label for="status_bimbingan">Aktif ?</label>
								</div>
							</div>
							<textarea id="detail_bimbingan" name="detail_bimbingan" class="w-100 border-0">{{ $data->detail_bimbingan }}</textarea>
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
       $('#detail_bimbingan')
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