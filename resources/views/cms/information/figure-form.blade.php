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
							<li class="breadcrumb-item"><a href="#!">Informasi</a></li>
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
							<h6>{{ $data->mode_tokoh }}</h6>
						</div>
						<div class="card-body">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Nama</label>
								<div class="col-sm-6">
									<input id="id" name="id" value="{{ $data->id }}" type="hidden">
									<input id="nama_tokoh" name="nama_tokoh" value="{{ $data->nama_tokoh }}" type="text" class="form-control" {{ noEmpty('Nama tidak boleh kosong.') }}>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Ringkasan</label>
								<div class="col-sm-6">
									<textarea id="keterangan_tokoh" name="keterangan_tokoh" rows="2" class="form-control">{{ $data->keterangan_tokoh }}</textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Slug</label>
								<div class="col-sm-6">
									<input id="slug_tokoh" name="slug_tokoh" value="{{ $data->slug_tokoh }}" type="text" class="form-control" {{ noEmpty('Slug tidak boleh kosong.') }}>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Image</label>
								<div class="col-sm-6">
									<div class="custom-file">
										<input id="image_tokoh" name="image_tokoh" type="file" accept="image/*" class="custom-file-input" >
										<label class="custom-file-label" for="image_tokoh">Pilih Gambar</label>
									</div>
									<img id="img_tokoh" class="user-img-radious-style mt-1 w-25 @if(empty($data->image_tokoh)) d-none @else" src="{{ url('images/tokoh/'.$data->image_tokoh) }}@endif">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Status</label>
								<div class="col-sm-6 switch switch-success">
									<input type="checkbox" id="status_tokoh" name="status_tokoh" {{ $data->status_tokoh == 't' ? 'checked' : '' }}  />
									<label for="status_tokoh" class="cr"></label>
									<label for="status_tokoh">Aktif ?</label>
								</div>
							</div>
							<textarea id="detail_tokoh" name="detail_tokoh" class="w-100 border-0">{{ $data->detail_tokoh }}</textarea>
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

<script src="{{asset('cms/js/information/'.$current.'.js')}}"></script>
<script src="{{asset('cms/js/plugins/trumbowyg.min.js')}}"></script>
<script src="{{asset('cms/js/plugins/trumbowyg.upload.js')}}"></script>
<script type="text/javascript">
    $(window).on('load', function() {
       $('#detail_tokoh')
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