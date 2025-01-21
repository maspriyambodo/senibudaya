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

                        <div class="card-header-right">
                            @if($input)
                            <button id="input" type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#addModal" data-backdrop="static"><i class="feather icon-plus"></i> Tambah Data</button>
                            @else
                            &nbsp;
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="clear mt-5"></div>
                        <table class="table table-hover table-responsive-xl border" id="table-pegawai">
                            <thead>
                                <tr>
                                    <th style="min-width:30px">No</th>
                                    @if($edit || $delete)<th style="min-width:25px">#</th>@endif
                                    <th style="min-width:30px">Nama</th>
                                    <th style="min-width:75px">NIP</th>
                                    <th style="min-width:125px">Email</th>
                                    <th style="min-width:125px">Golongan</th>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah data pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_add" action="{{ url('pegawai/store/?q=add'); }}" method="post" autocomplete="off" class="form">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="fv-row my-4">
                        <label for="namatxt" class="required form-label">Nama:</label>
                        <input type="text" id="namatxt" name="namatxt" class="form-control" required=""/>
                    </div>
                    <div class="fv-row my-4">
                        <label for="niptxt" class="required form-label">N I P:</label>
                        <input type="text" id="niptxt" name="niptxt" class="form-control" required=""/>
                    </div>
                    <div class="fv-row my-4">
                        <label for="mailtxt" class="required form-label">Email:</label>
                        <input type="email" id="mailtxt" name="mailtxt" class="form-control" required=""/>
                    </div>
                    <div class="fv-row my-4">
                        <label for="pangtxt" class="required form-label">Golongan:</label>
                        <select id="pangtxt" name="pangtxt" class="form-control" required="">
                            <option value="">-- pilih --</option>
                            @foreach($dt_gol as $golongan)
                            <option value="{{ $golongan->id; }}">{{ $golongan->pangkat . ' ' . $golongan->golongan . ' ' . $golongan->ruang; }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalCenterTitle">Ubah data pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_edit" action="{{ url('pegawai/store/?q=update'); }}" method="post" autocomplete="off" class="form">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="fv-row my-4">
                        <label for="namatxt2" class="required form-label">Nama:</label>
                        <input type="text" id="namatxt2" name="namatxt2" class="form-control" required=""/>
                        <input type="hidden" name="e_id" id="e_id"/>
                    </div>
                    <div class="fv-row my-4">
                        <label for="niptxt2" class="required form-label">N I P:</label>
                        <input type="text" id="niptxt2" name="niptxt2" class="form-control" required=""/>
                    </div>
                    <div class="fv-row my-4">
                        <label for="mailtxt2" class="required form-label">Email:</label>
                        <input type="email" id="mailtxt2" name="mailtxt2" class="form-control" required=""/>
                    </div>
                    <div class="fv-row my-4">
                        <label for="pangtxt2" class="required form-label">Golongan:</label>
                        <select id="pangtxt2" name="pangtxt2" class="form-control" required="">
                            <option value="">-- pilih --</option>
                            @foreach($dt_gol as $golongan2)
                            <option value="{{ $golongan2->id; }}">{{ $golongan2->pangkat . ' ' . $golongan2->golongan . ' ' . $golongan2->ruang; }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalCenterTitle">Hapus data pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_delete" action="{{ url('pegawai/store/?q=delete'); }}" method="post" autocomplete="off" class="form">
            <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="fv-row my-4">
                        <label for="namatxt3" class="required form-label">Nama:</label>
                        <input type="text" id="namatxt3" name="namatxt3" class="form-control" readonly=""/>
                        <input type="hidden" name="d_id" id="d_id"/>
                    </div>
                    <div class="fv-row my-4">
                        <label for="niptxt3" class="required form-label">N I P:</label>
                        <input type="text" id="niptxt3" name="niptxt3" class="form-control" readonly=""/>
                    </div>
                    <div class="fv-row my-4">
                        <label for="mailtxt3" class="required form-label">Email:</label>
                        <input type="email" id="mailtxt3" name="mailtxt3" class="form-control" readonly=""/>
                    </div>
                    <div class="fv-row my-4">
                        <label for="pangtxt3" class="required form-label">Golongan:</label>
                        <select id="pangtxt3" name="pangtxt3" class="form-control" readonly>
                            <option value="">-- pilih --</option>
                            @foreach($dt_gol as $golongan2)
                            <option value="{{ $golongan2->id; }}">{{ $golongan2->pangkat . ' ' . $golongan2->golongan . ' ' . $golongan2->ruang; }}</option>
                            @endforeach
                        </select>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function () {
        var dTable = $("#table-pegawai").DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            ordering: true,
            deferRender: true,
            info: true,
            ajax: {
                url: "pegawai/json",
                data: function (d) {
                    d.keyword = $("#keyword").val();
                }
            },
            columns: [
                {data: "id"},
                {data: "button"},
                {data: "nama"},
                {data: "nip"},
                {data: "mail"},
                {
                    data: "golongan",
                    render: function (data) {
                        var jabatan = '';
                        jabatan = data.pangkat + ' ' + data.golongan + ' ' + data.ruang;
                        return jabatan;
                    }
                }
            ],
            displayStart: 0,
            pageLength: 10
        });
        const filterChangeHandler = delay(function () {
            dTable.draw();
        }, 50);
        $("#keyword").keyup(delay(function (e) {
            dTable.draw();
            e.preventDefault();
        }, 500));
    });
</script>
<script>
    function editData(id_user) {
        $.ajax({
            url: 'pegawai/pegawai-edit/' + id_user,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    $('input[name="e_id"]').val(data.dt_user['id']);
                    $('input[name="namatxt2"]').val(data.dt_user['nama']);
                    $('input[name="niptxt2"]').val(data.dt_user['nip']);
                    $('input[name="mailtxt2"]').val(data.dt_user['mail']);
                    $("#pangtxt2").val(data.dt_user['jabatan']);
                    $("#editModal").modal('show');
                } else {
                    Swal.fire({
                        text: 'error while get data!',
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "OK",
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function () {
                        window.location.reload();
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    text: textStatus,
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                }).then(function () {
                    window.location.reload();
                });
            }
        });
    }
</script>
<script>
    function deleteData(id_user) {
        $.ajax({
            url: 'pegawai-edit/' + id_user,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    $('input[name="d_id"]').val(data.dt_user['id']);
                    $('input[name="namatxt3"]').val(data.dt_user['nama']);
                    $('input[name="niptxt3"]').val(data.dt_user['nip']);
                    $('input[name="mailtxt3"]').val(data.dt_user['mail']);
                    $("#pangtxt3").val(data.dt_user['jabatan']);
                    $("#deleteModal").modal('show');
                } else {
                    Swal.fire({
                        text: 'error while get data!',
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "OK",
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function () {
                        window.location.reload();
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    text: textStatus,
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                }).then(function () {
                    window.location.reload();
                });
            }
        });
    }
</script>
@include('cms.footer')