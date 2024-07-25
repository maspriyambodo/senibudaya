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
                <div class="bg-white  p-2 m-4">
                    <div class="row">
                        <div class="col-md-4 text-left">
                            @if(isset($filter))
                            {{ searchFilter($filter) }}
                            @endif
                        </div>
                        <div class="col-md-4 text-center">
                            <select id="kategori" name="kategori" class="form-control select2-single">
                                @foreach($kategori as $k)
                                @if (Cookie::get('kategori') == $k->id)
                                <option value="{{ $k->id }}" selected>{{ $k->nama_content }}</option>
                                @else
                                <option value="{{ $k->id }}">{{ $k->nama_content }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 text-right">
                            @if($input)
                            <button id="input" type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#form" data-backdrop="static"><i class="feather icon-plus"></i> Tambah Data</button>
                            @else&nbsp;@endif
                        </div>
                    </div>
                    <div class="clear mt-4"></div>
                    <table class="table table-bordered table-hover" id="data" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                @if($edit || $delete)<th>#</th>@endif
                                <th>Judul</th>
                                <th>Dokumen</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                    {{ dataTable( $current.'/json', $column ) }}
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
								<input id="id_content" name="id_content" type="hidden">
								<input id="nama_dokumen" name="nama_dokumen" type="text" class="form-control" {{ noEmpty('Judul tidak boleh kosong.') }}>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Keterangan</label>
							<div class="col-sm-9">
								<textarea id="keterangan_dokumen" name="keterangan_dokumen" rows="1" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Dokumen</label>
							<div class="col-sm-9">
								<div class="custom-file">
									<input id="file_dokumen" name="file_dokumen" type="file" class="custom-file-input" {{ noEmpty('Dokumen tidak boleh kosong.') }}>
									<label class="custom-file-label" for="file_dokumen">Pilih File</label>
								</div>
							</div>
							<label class="col-sm-3 col-form-label">&nbsp;</label>
							<div class="col-sm-5">
								<img id="img_dokumen" src="{{asset('images/icon/pdf.png')}}" class="user-img-radious-style mt-1 w-25 d-none">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Status</label>
							<div class="col-sm-9 switch switch-success">
								<input type="checkbox" id="status_dokumen" name="status_dokumen" />
								<label for="status_dokumen" class="cr"></label>
								<label for="status_dokumen">Aktif ?</label>
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
<div class="modal fade" id="pdf" role="dialog">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formModal">{{ $title }}</h5>
				<span class="text-validation"></span>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<iframe id="file_url" src="" width="100%" height="500px" frameborder="0"></iframe>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('cms/js/information/'.$current.'.js')}}"></script>

@include('cms.footer')	