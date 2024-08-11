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
<div class="bg-white  p-2 m-4">
    <div class="row">
        <div class="col-md-6 text-left">
            @if(isset($filter))
            {{ searchFilter($filter) }}
            @endif
        </div>
        <div class="col-md-6 text-right">
            @if($input)
            <a href="{{ url($current.'/form/0') }}" class="btn btn-sm btn-warning"><i class="feather icon-plus"></i> Tambah Data</a>
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
                <th>Deskripsi Singkat</th>
                <th>Tanggal</th>
                <th>Pemilik</th>
                <th>Status</th>
                <th>Persetujuan</th>
            </tr>
        </thead>
    </table>
    {{ dataTable( $current.'/json', $column ) }}
</div>
</div>
</div>
{{ deleteModal($current) }}
<div class="modal fade" id="approvalModal" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="approval_form" action="{{ url('news/news-approval') }}" method="post">
                @csrf
                <input type="hidden" name="id_jurnal" readonly="" required=""/>
                <div class="modal-header">
                    <h5 class="modal-title">Persetujuan Jurnal</h5>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Judul</span>
                        </div>
                        <input id="judultxt" name="judultxt" type="text" class="form-control" readonly=""/>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">Pilih</span>
                        </div>
                        <select name="approvtxt" class="custom-select" id="inputGroupSelect03" aria-label="Approval Jurnal" required="">
                            <option value="">-- status approval --</option>
                            <option value="0">Tolak</option>
                            <option value="1">Review</option>
                            <option value="2">Terima</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-light w-25" data-dismiss="modal">Batal</button>
                    <button id="sub_btn" type="submit" class="btn btn-success w-25 ml-1">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script async src="{{asset('cms/js/information/'.$current.'.js')}}"></script>
@include('cms.footer')