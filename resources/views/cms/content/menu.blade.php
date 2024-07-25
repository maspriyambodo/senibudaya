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
                <div class="bg-white  p-2 m-4">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            @if(isset($filter))
                            {{ searchFilter($filter) }}
                            @endisset
                        </div>
                        <div class="col-md-6 text-right">
                            @if($input)
                            <a href="{{ url($current.'/add/0') }}" class="btn btn-sm btn-warning"><i class="feather icon-plus"></i> Tambah Data</a>
                            @else&nbsp;@endif
                        </div>
                    </div>
                    <div class="clear mt-4"></div>
                    <table class="table table-bordered table-hover" id="data" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                @if($edit || $delete)<th>#</th>@endif
                                <th>Menu</th>
                                <th>Order</th>
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
<script src="{{asset('cms/js/content/'.$current.'.js')}}"></script>

@include('cms.footer')	