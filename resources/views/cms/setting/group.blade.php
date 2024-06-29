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
							<li class="breadcrumb-item"><a href="#!">User</a></li>
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
							@else
							&nbsp;
							@endif
						</div>
					</div>
					<div class="card-body p-0">
						<table width="100%" class="table table-striped table-responsive-xl" id="data">
							<thead>
								<tr>
									<th style="min-width:30px">No</th>
									@if($edit || $delete)<th style="min-width:25px">#</th>@endisset
									<th style="min-width:200px">Group</th>
									<th style="min-width:200px">Keterangan</th>
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
<div class="modal fade" id="form" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="{{ $current }}/store" method="post" class="needs-validation" novalidate="">
				<div class="modal-header">
					<h5 class="modal-title" id="formModal">{{ $title }}</h5>
					<span class="text-validation"></span>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body p-0">
					@csrf
					<ul class="nav nav-tabs mt-3 mb-3" role="tablist">
						<li class="nav-item ml-4">
							<a class="nav-link active" id="group-tab" data-toggle="tab" href="#group" role="tab"
							aria-controls="group" aria-selected="true">Data</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="menu-tab" data-toggle="tab" href="#menu" role="tab"
							aria-controls="menu" aria-selected="false">Akses</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade show active ml-4 mr-4" id="group" role="tabpanel" aria-labelledby="group-tab">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Group</label>
								<div class="col-sm-9">
									<input id="id" name="id" type="hidden">
									<input id="nama_group" name="nama_group" type="text" class="form-control" {{ noEmpty('Group tidak boleh kosong.') }}>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Keterangan</label>
								<div class="col-sm-9">
									<textarea id="keterangan_group" name="keterangan_group" class="form-control" {{ noEmpty('Keterangan tidak boleh kosong.') }}></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Status</label>
								<div class="col-sm-9 switch switch-success">
									<input type="checkbox" id="status_group" name="status_group" />
									<label for="status_group" class="cr"></label>
									<label for="status_group">Aktif ?</label>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="menu" role="tabpanel" aria-labelledby="menu-tab">
							<div class="table-responsive table-scroll">
								<table class="table table-sm table-striped">
									<tr>
										<th class="p-0 pl-4">Pilih Semua</th>
										<th class="p-0 align-middle">
											<div class="custom-checkbox custom-checkbox-table custom-control">
												<input type="checkbox"
												class="custom-control-input" id="view_all">
												<label for="view_all" class="custom-control-label">View</label>
											</div>
										</th>
										<th class="p-0 align-middle">
											<div class="custom-checkbox custom-checkbox-table custom-control">
												<input type="checkbox"
												class="custom-control-input" id="input_all">
												<label for="input_all" class="custom-control-label">Input</label>
											</div>
										</th>
										<th class="p-0 align-middle">
											<div class="custom-checkbox custom-checkbox-table custom-control">
												<input type="checkbox"
												class="custom-control-input" id="edit_all">
												<label for="edit_all" class="custom-control-label">Edit</label>
											</div>
										</th>
										<th class="p-0 align-middle">
											<div class="custom-checkbox custom-checkbox-table custom-control">
												<input type="checkbox"
												class="custom-control-input" id="delete_all">
												<label for="delete_all" class="custom-control-label">Delete</label>
											</div>
										</th>
									</tr>
									@foreach($akses as $m)
									<tr>
										<td class="p-0 pl-4">{{ $m->nama_menu }}</td>
										<td class="p-0 align-middle">
											@if(!$m->count_menu && $m->view_menu)
											<div class="custom-checkbox custom-control">
												<input type="checkbox" class="custom-control-input"
												id="view_{{ $m->id }}" name="view[{{ $m->id }}]">
												<label for="view_{{ $m->id }}" class="custom-control-label">View</label>
											</div>
											@endisset
										</td>
										<td class="p-0 align-middle">
											@if(!$m->count_menu && $m->input_menu)
											<div class="custom-checkbox custom-control">
												<input type="checkbox" class="custom-control-input"
												id="input_{{ $m->id }}" name="input[{{ $m->id }}]">
												<label for="input_{{ $m->id }}" class="custom-control-label">Add</label>
											</div>
											@endisset
										</td>
										<td class="p-0 align-middle">
											@if(!$m->count_menu && $m->edit_menu)
											<div class="custom-checkbox custom-control">
												<input type="checkbox" class="custom-control-input"
												id="edit_{{ $m->id }}" name="edit[{{ $m->id }}]">
												<label for="edit_{{ $m->id }}" class="custom-control-label">Edit</label>
											</div>
											@endisset
										</td>
										<td class="p-0 align-middle" >
											@if(!$m->count_menu && $m->delete_menu)
											<div class="custom-checkbox custom-control">
												<input type="checkbox" class="custom-control-input"
												id="delete_{{ $m->id }}" name="delete[{{ $m->id }}]">
												<label for="delete_{{ $m->id }}" class="custom-control-label">Delete</label>
											</div>
											@endisset
										</td>
									</tr>
									@foreach($m->detail_menu as $d)
									<tr>
										<td class="p-0 pl-5">{{ $d->nama_menu }}</td>
										<td class="p-0 align-middle">
											@if($d->view_menu)
											<div class="custom-checkbox custom-control">
												<input type="checkbox" class="custom-control-input"
												id="view_{{ $d->id }}" name="view[{{ $d->id }}]">
												<label for="view_{{ $d->id }}" class="custom-control-label">View</label>
											</div>
											@endisset
										</td>
										<td class="p-0 align-middle">
											@if($d->input_menu)
											<div class="custom-checkbox custom-control">
												<input type="checkbox" class="custom-control-input"
												id="input_{{ $d->id }}" name="input[{{ $d->id }}]">
												<label for="input_{{ $d->id }}" class="custom-control-label">Add</label>
											</div>
											@endisset
										</td>
										<td class="p-0 align-middle">
											@if($d->edit_menu)
											<div class="custom-checkbox custom-control">
												<input type="checkbox" class="custom-control-input"
												id="edit_{{ $d->id }}" name="edit[{{ $d->id }}]">
												<label for="edit_{{ $d->id }}" class="custom-control-label">Edit</label>
											</div>
											@endisset
										</td>
										<td class="p-0 align-middle" >
											@if($d->delete_menu)
											<div class="custom-checkbox custom-control">
												<input type="checkbox" class="custom-control-input"
												id="delete_{{ $d->id }}" name="delete[{{ $d->id }}]">
												<label for="delete_{{ $d->id }}" class="custom-control-label">Delete</label>
											</div>
											@endisset
										</td>
									</tr>
									@endforeach
									@endforeach
								</table>
							</div>
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
<script src="{{asset('cms/js/setting/'.$current.'.js')}}"></script>

@include('cms.footer')	