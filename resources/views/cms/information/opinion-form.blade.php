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
							<h6>{{ $data->mode_opini }}</h6>
						</div>
						<div class="card-body">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Judul</label>
								<div class="col-sm-6">
									<input id="id" name="id" value="{{ $data->id }}" type="hidden">
									<input id="nama_opini" name="nama_opini" value="{{ $data->nama_opini }}" type="text" class="form-control" {{ noEmpty('Judul tidak boleh kosong.') }}>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Ringkasan</label>
								<div class="col-sm-6">
									<textarea id="keterangan_opini" name="keterangan_opini" rows="2" class="form-control">{{ $data->keterangan_opini }}</textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Oleh</label>
								<div class="col-sm-6">
									<input id="sumber_opini" name="sumber_opini" value="{{ $data->sumber_opini }}" type="text" class="form-control" >
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Slug</label>
								<div class="col-sm-6">
									<input id="slug_opini" name="slug_opini" value="{{ $data->slug_opini }}" type="text" class="form-control" {{ noEmpty('Slug tidak boleh kosong.') }}>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Image</label>
								<div class="col-sm-6">
									<div class="custom-file">
										<input id="image_opini" name="image_opini" type="file" accept="image/*" class="custom-file-input" >
										<label class="custom-file-label" for="image_opini">Pilih Gambar</label>
									</div>
									<img id="img_opini" class="user-img-radious-style mt-1 w-25 @if(empty($data->image_opini)) d-none @else" src="{{ url('images/opini/'.$data->image_opini) }}@endif">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Status</label>
								<div class="col-sm-6 switch switch-success">
									<input type="checkbox" id="status_opini" name="status_opini" {{ $data->status_opini == 't' ? 'checked' : '' }}  />
									<label for="status_opini" class="cr"></label>
									<label for="status_opini">Aktif ?</label>
								</div>
							</div>
							<textarea id="detail_opini" name="detail_opini" class="w-100 border-0">{{ $data->detail_opini }}</textarea>
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
       $('#detail_opini')
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