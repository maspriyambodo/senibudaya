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
							<li class="breadcrumb-item"><a href="#!">Kontak</a></li>
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
									<th style="min-width:25px">#</th>
									<th style="min-width:200px">Nama Lengkap</th>
									<th style="min-width:200px">Email</th>
									<th style="min-width:125px">Waktu</th>
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
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="{{ $current }}/store" method="post" class="needs-validation" novalidate="">
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
						<label class="col-sm-3 col-form-label">Nama Lengkap</label>
						<div class="col-sm-1">:</div>
						<div id="nama_pengaduan" class="col-sm-8"></div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">NIK</label>
						<div class="col-sm-1">:</div>
						<div id="nik_pengaduan" class="col-sm-8"></div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Alamat Email</label>
						<div class="col-sm-1">:</div>
						<div id="email_pengaduan" class="col-sm-8"></div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Nomor Telepon</label>
						<div class="col-sm-1">:</div>
						<div id="telepon_pengaduan" class="col-sm-8"></div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Alamat</label>
						<div class="col-sm-1">:</div>
						<div id="alamat_pengaduan" class="col-sm-8"></div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Isi Pengaduan</label>
						<div class="col-sm-1">:</div>
						<div id="detail_pengaduan" class="col-sm-8"></div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Waktu</label>
						<div class="col-sm-1">:</div>
						<div id="created_at" class="col-sm-8"></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="{{asset('cms/js/contact/'.$current.'.js')}}"></script>

@include('cms.footer')	