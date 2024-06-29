@include('cms.header')
<div class="pcoded-main-container">
<div class="pcoded-content">
<div class="page-header">
<div class="page-block">
<div class="row align-items-center">
<div class="col-md-6">
<div class="page-header-title">
<h5 class="m-b-10">Content Management System</h5>
</div>
</div>
<div class="col-md-6">
<div class="page-header-title">
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body pt-5">
<div class="row">
@foreach($content as $c)
<div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 text-center">
<a href="{{ url($c->target_menu) }}">
<img src="{{ asset('cms/images/icon/'.$c->target_menu.'.png') }}" class="lazy" alt="" title="" width="55" />
<div class="mt-1">{{ $c->nama_menu }}</div>
</a>
</div>
@endforeach
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@include('cms.footer')