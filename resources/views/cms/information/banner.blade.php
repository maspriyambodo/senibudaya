@include('cms.header')

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
					<div class="card-header pb-0">
						@if(isset($filter))
						{{ searchFilter($filter) }}
						@endisset
						<div class="card-header-right">
							@if($input)
							<button id="input" type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#form" data-backdrop="static"><i class="feather icon-plus"></i> Tambah Data</button>
							@else&nbsp;@endif
						</div>
					</div>
					<div class="card-body p-0">
						<table width="100%" class="table table-striped table-responsive-xl" id="data">
							<thead>
								<tr>
									<th style="min-width:30px">No</th>
									@if($edit || $delete)<th style="min-width:25px">#</th>@endisset
									<th style="min-width:300px">Judul</th>
									<th style="min-width:75px">Image</th>
									<th style="min-width:50px">Status</th>
								</tr>
							</thead>
						</table>
					</div>
					{{ dataTable( $current.'/json', $column ) }}
				</div>
			</div>
			<!-- [ sample-page ] end -->
		</div>
		<!-- [ Main Content ] end -->
	</div>
</div>
<!-- [ Main Content ] end -->


<!-- ModalFade -->
{{ deleteModal($current) }}
<div class="modal fade" id="form" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="{{ $current }}/store" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="formModal">{{ $title }}</h5>
					<span class="text-validation"></span>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
							<label class="col-sm-3 col-form-label">Judul</label>
							<div class="col-sm-9">
								<input id="id" name="id" type="hidden">
								<input id="nama_banner" name="nama_banner" type="text" class="form-control" {{ noEmpty('Judul tidak boleh kosong.') }}>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Keterangan</label>
							<div class="col-sm-9">
								<textarea id="keterangan_banner" name="keterangan_banner" rows="1" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Image</label>
							<div class="col-sm-9">
								<div class="custom-file">
									<input id="image_banner" name="image_banner" type="file" accept="image/*" class="custom-file-input" {{ noEmpty('Image tidak boleh kosong.') }}>
									<label class="custom-file-label" for="image_banner">Pilih Gambar</label>
								</div>
								<img id="img_banner" class="user-img-radious-style mt-1 w-25 d-none">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Status</label>
							<div class="col-sm-9 switch switch-success">
								<input type="checkbox" id="status_banner" name="status_banner" />
								<label for="status_banner" class="cr"></label>
								<label for="status_banner">Aktif ?</label>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light w-25" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary w-25 ml-1">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="{{asset('cms/js/information/'.$current.'.js')}}"></script>

@include('cms.footer')	