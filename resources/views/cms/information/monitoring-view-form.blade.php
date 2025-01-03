@include('cms.header')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Detail Data {{ $title }}</h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Informasi</a></li>
                            <li class="breadcrumb-item"><a href="{{ url($current) }}">{{ $title }}</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear" style="margin-top:5%;"></div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nomor Monitoring</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $data->no_monitoring; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Monitoring</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{date("d F Y", strtotime($data->tgl_monitoring))}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $data->provinsiLihat->nama; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kabupaten</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $data->kabupatenLihat->nama; }}</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @foreach($lembaga_seni as $dt_lembaga)
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lembaga</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_lembaga->lembagaSeni->nama; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_lembaga->lembagaSeni->provinsiLihat->nama; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kabupaten</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_lembaga->lembagaSeni->kabupatenLihat->nama; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_lembaga->lembagaSeni->alamat; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Fokus</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_lembaga->lembagaSeni->fokus; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tingkat</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_lembaga->lembagaSeni->tingkat; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Program</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_lembaga->lembagaSeni->program; }}</label>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @foreach($seniman as $dt_seniman)
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lembaga</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_seniman->seniman->nama; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_seniman->seniman->provinsiLihat->nama; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kabupaten</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_seniman->seniman->kabupatenLihat->nama; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_seniman->seniman->alamat; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bidang</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_seniman->seniman->bidang; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Karya</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_seniman->seniman->karya; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lembaga</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_seniman->seniman->lembaga; }}</label>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @foreach($programSeni as $dt_program)
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Program</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_program->programSeni->nama; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Frekuensi</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_program->programSeni->frekuensi; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tujuan</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_program->programSeni->tujuan; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Unsur</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_program->programSeni->unsur; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Waktu</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_program->programSeni->waktu; }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penyelenggara</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_program->programSeni->penyelenggara; }}</label>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('cms.footer')