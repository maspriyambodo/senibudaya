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
							<li class="breadcrumb-item"><a href="#!">Konten</a></li>
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
							<h6>{{ $data->mode_content }}</h6>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-7">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Menu</label>
										<div class="col-sm-9">
											<input id="id" name="id" value="{{ $data->id }}" type="hidden">
											<input id="induk_content" name="induk_content" value="{{ $data->induk_content }}" type="hidden">
											<input id="level_content" name="level_content" value="{{ $data->level_content }}" type="hidden">
											<input id="nama_content" name="nama_content" value="{{ $data->nama_content }}" type="text" class="form-control" {{ noEmpty('Menu tidak boleh kosong.') }}>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Label</label>
										<div class="col-sm-9">
											<input id="label_content" name="label_content" value="{{ $data->label_content }}" type="text" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Keterangan</label>
										<div class="col-sm-9">
											<textarea id="keterangan_content" name="keterangan_content" rows="1" class="form-control">{{ $data->keterangan_content }}</textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Icon</label>
										<div class="col-sm-9">
											<div class="custom-file">
												<input id="icon_content" name="icon_content" type="file" accept="image/*" class="custom-file-input">
												<label id="icon_label" class="custom-file-label" for="icon_content">Pilih Gambar</label>
											</div>
											<img id="ico_content" class="user-img-radious-style mt-1 w-25 @if(empty($data->icon_content)) d-none @else" src="{{ url('images/content/'.$data->icon_content) }}@endif">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Image</label>
										<div class="col-sm-9">
											<div class="custom-file">
												<input id="image_content" name="image_content" type="file" accept="image/*" class="custom-file-input">
												<label id="image_label" class="custom-file-label" for="image_content">Pilih Gambar</label>
											</div>
											<img id="img_content" class="user-img-radious-style mt-1 w-25 @if(empty($data->image_content)) d-none @else" src="{{ url('images/content/'.$data->image_content) }}@endif">
										</div>
									</div>
								</div>
								<div class="col-sm-1"></div>
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-5 col-form-label">Kategori</label>
										<div class="col-sm-7">
											<select id="id_kategori" name="id_kategori" class="form-control select2-single" >
												@foreach($kategori as $k)
												@if($k->id == $data->id_kategori)
												<option value="{{ $k->id }}" selected>{{ $k->nama_kategori }}</option>
												@else
												<option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
												@endif
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group row mb-2">
										<label class="col-sm-5 col-form-label">Redirect</label>
										<div class="col-sm-6 switch switch-success">
											<input type="checkbox" id="redirect_content" name="redirect_content" onclick="$.fn.doc()" {{ $data->redirect_content == 't' ? 'checked' : '' }}  />
											<label for="redirect_content" class="cr"></label>
											<label for="redirect_content">Ya ?</label>
										</div>
									</div>
									<div class="form-group row mb-2">
										<label class="col-sm-5 col-form-label">Link Footer</label>
										<div class="col-sm-6 switch switch-success">
											<input type="checkbox" id="link_content" name="link_content" {{ $data->link_content == 't' ? 'checked' : '' }}  />
											<label for="link_content" class="cr"></label>
											<label for="link_content">Ya ?</label>
										</div>
									</div>
									<div class="form-group row mb-2">
										<label class="col-sm-5 col-form-label">Hide Child</label>
										<div class="col-sm-6 switch switch-success">
											<input type="checkbox" id="hide_content" name="hide_content" {{ $data->hide_content == 't' ? 'checked' : '' }}  />
											<label for="hide_content" class="cr"></label>
											<label for="hide_content">Ya ?</label>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-5 col-form-label">Order</label>
										<div class="col-sm-6 switch switch-success">
											<input id="urutan_content" name="urutan_content" value="{{ $data->urutan_content }}" type="number" min="0" class="form-control text-center" {{ noEmpty('Order tidak boleh kosong.') }}>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-5 col-form-label">Status</label>
										<div class="col-sm-6 switch switch-success">
											<input type="checkbox" id="status_content" name="status_content" {{ $data->status_content == 't' ? 'checked' : '' }}  />
											<label for="status_content" class="cr"></label>
											<label for="status_content">Aktif ?</label>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<textarea id="detail_content" name="detail_content" class="w-100 border-0">{{ $data->detail_content }}</textarea>
								</div>
							</div>
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

<script src="{{asset('cms/js/content/'.$current.'.js')}}"></script>
<script src="{{asset('cms/js/plugins/trumbowyg.min.js')}}"></script>
<script src="{{asset('cms/js/plugins/trumbowyg.upload.js')}}"></script>
<script type="text/javascript">
    $(window).on('load', function() {
       $('#detail_content')
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