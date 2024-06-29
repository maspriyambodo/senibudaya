@include('cms.header')
<div class="pcoded-main-container">
<div class="pcoded-content">
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
{{ alertInfo() }}
<div class="row">
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
    <div class="table-responsive">
        <table class="table table-hover" id="data" style="width:100%;">
            <thead>
                <tr>
                    <th style="min-width:30px">No</th>
                    @if($edit || $delete)<th style="min-width:25px">#</th>@endisset
                    <th style="min-width:250px">Judul</th>
                    <th style="min-width:200px">Direktorat</th>
                    <th style="min-width:75px">Tanggal</th>
                    <th style="min-width:50px">Status</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
{{ dataTable( $current.'/json', $column ) }}
</div>
</div>
</div>
</div>
</div>
{{ deleteModal($current) }}
<script async src="{{asset('cms/js/information/'.$current.'.js')}}"></script>
@include('cms.footer')