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
							<h5 class="m-b-10">Profil User</h5>
						</div>
					</div>
					<div class="col-md-6">
						<div class="page-header-title">
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Profil User</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->


		<!-- [ Main Content ] start -->
		<div class="row">
			<!-- [ sample-page ] start -->
			<div class="col-sm-12">
				{{ alertInfo() }}
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div id="img_user" class="col-md-3 m-b-20 text-center"><img src="{{ asset('cms/images/user/'.Session::get('foto_user')) }}" class="img-radius pointer" data-toggle="tooltip" data-placement="right" title="Upload Foto" /></div>
							<div class="col-md-9">
								<form id="form" action="{{ $current }}/store" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
								@csrf
								<h2 class="f-24 font-medium">{{ $user->nama_user }}</h2>
								<p class="m-b-20 font-weight-bold">{{ $nama_group }}</p>
								<span class="text-validation"></span>
								<div class="row mb-2">
									<div class="col-md-3 text-dark">Username</div>
									<div class="col-md-6">
										<input id="id" name="id" type="hidden" value="{{ $user->id }}">
										<input id="id_user" name="id_user" type="text" value="{{ $user->id_user }}" class="form-control" {{ noEmpty('Username tidak boleh kosong.') }}>
										<input id="foto_user" name="foto_user" type="file" class="d-none" >
									</div>
								</div>
								<div class="row mb-2">
									<div class="col-md-3 text-dark">Nama Lengkap</div>
									<div class="col-md-6">
										<input id="nama_user" name="nama_user" type="text" value="{{ $user->nama_user }}" class="form-control" {{ noEmpty('Nama lengkap tidak boleh kosong.') }}>
									</div>
								</div>
								<div class="row mb-2">
									<div class="col-md-3 text-dark">Alamat Email</div>
									<div class="col-md-6">
										<input id="email_user" name="email_user" type="text" value="{{ $user->email_user }}" class="form-control" {{ noEmpty('Email tidak boleh kosong.') }}>
									</div>
								</div>
								<div class="row mb-2">
									<div class="col-md-3 text-dark">&nbsp;</div>
									<div class="col-md-6">
										<button type="submit" class="btn btn-primary mt-1">Update Profil</button>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
			<!-- [ sample-page ] end -->
		</div>
		<!-- [ Main Content ] end -->
	</div>
</div>
<!-- [ Main Content ] end -->
<script src="{{asset('cms/js/'.$current.'.js')}}"></script>

@include('cms.footer')