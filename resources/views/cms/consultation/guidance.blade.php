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
					<div class="card-header pb-0">
						@if(isset($filter))
						{{ searchFilter($filter) }}
						@endisset
						<div class="card-header-right">
							@if($input)
							<a href="{{ url($current.'/form/0') }}" class="btn btn-sm btn-warning"><i class="feather icon-plus"></i> Tambah Data</a>
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
									<th style="min-width:75px">Tanggal</th>
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
<script src="{{asset('cms/js/consultation/'.$current.'.js')}}"></script>

@include('cms.footer')	