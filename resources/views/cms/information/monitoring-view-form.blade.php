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
                <h5><u>Data Monitoring</u></h5>
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
            <div class="card-footer">
                <button type="button" id="monitorbtn" class="btn btn-secondary" onclick="monitorEdit({{ $data->id; }});">Edit</button>
            </div>
        </div>
        @foreach($data->petugas as $key_peg => $dt_pegawai)
        @if($dt_pegawai->is_trash == 1)
        <div class="card">
            <div class="card-body">
                <h5><u>Petugas Monitoring</u></h5>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Petugas</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">: {{ $dt_pegawai->pegawai->nama; }}</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" id="epegbtn{{ ($key_peg + 1) }}" class="btn btn-secondary" onclick="editPeg({{ $data->petugas[$key_peg]->id }});">Edit</button>
                @if($key_peg == 0)
                <button type="button" id="tpegbtn{{ ($key_peg + 1) }}" class="btn btn-info ml-2" data-toggle="modal" data-target="#addPegawai" onclick="addPeg({{ $data->id }});">Tambah Petugas</button>
                @endif
                @if($key_peg > 0)
                <button type="button" id="dpegbtn{{ ($key_peg + 1) }}" class="btn btn-danger ml-2" onclick="deletePeg({{ $data->petugas[$key_peg]->id }});">Delete</button>
                @endif
            </div>
        </div>
        @endif
        @endforeach
        @foreach($lembaga_seni as $key_lembaga => $dt_lembaga)
        @if($dt_lembaga->lembagaSeni->stat == 1)
        <div class="card">
            <div class="card-body">
                <h5><u>Lembaga Seni</u></h5>
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
            </div>
            <div class="card-footer">
                <button type="button" id="elembtn{{ ($key_lembaga + 1) }}" class="btn btn-secondary" onclick="editLem({{ $dt_lembaga->id }});">Edit</button>
                @if($key_lembaga == 0)
                <button type="button" id="tlembtn{{ ($key_lembaga + 1) }}" class="btn btn-info ml-2" data-toggle="modal" data-target="#addLem" onclick="addLembtn({{ $dt_lembaga->id_monitoring }});">Tambah Lembaga Seni</button>
                @endif
                @if($key_lembaga > 0)
                <button type="button" id="dlembtn{{ ($key_lembaga + 1) }}" class="btn btn-danger ml-2" onclick="delLembtn({{ $dt_lembaga->id }})">Delete</button>
                @endif
            </div>
        </div>
        @endif
        @endforeach
        
        @foreach($seniman as $key_seniman => $dt_seniman)
        @if($dt_seniman->seniman->stat == 1)
        <div class="card">
            <div class="card-body">
                <h5><u>Seniman</u></h5>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Seniman</label>
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
            </div>
        </div>
        @endif
        @endforeach
        @foreach($programSeni as $key_program => $dt_program)
        @if($dt_program->programSeni->stat == 1)
        <div class="card">
            <div class="card-body">
                <h5><u>Program Seni</u></h5>
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
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@include('cms.monitoring.eMonitoring')
@include('cms.monitoring.ePetugas')
@include('cms.monitoring.eLembaga')
@include('cms.footer')