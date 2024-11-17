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
                        @if(isset($filter))
                        {{ searchFilter($filter) }}
                        @endisset
                        <div class="card-header-right">
                            @if($input)
                            <button id="input" type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#form" data-backdrop="static"><i class="feather icon-plus"></i> Tambah Data</button>
                            @else
                            &nbsp;
                            @endif
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table width="100%" class="table table-striped table-responsive-xl" id="data">
                            <thead>
                                <tr>
                                    <th style="min-width:30px">No</th>
                                    @if($edit || $delete)<th style="min-width:25px">#</th>@endif
                                    <th style="min-width:30px">Nama</th>
                                    <th style="min-width:75px">NIP</th>
                                    <th style="min-width:125px">Email</th>
                                    <th style="min-width:125px">Jabatan</th>
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
                        <label class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input id="id" name="id" type="hidden">
                            <input id="id_user" name="id_user" type="text" class="form-control" {{ noEmpty('Username tidak boleh kosong.') }}>
                        </div>
                    </div>
                    <div id="div_password" class="form-group row d-none">
                        <label class="col-sm-4 col-form-label">
                            Password
                        </label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input id="password_user" name="password_user" type="password" class="form-control" {{ noEmpty('Password tidak boleh kosong.') }}>
                                <div id="password" class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-eye" id="show-password"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide-password"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="div_repassword" class="form-group row d-none">
                        <label class="col-sm-4 col-form-label">Ulangi Password</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input id="repassword_user" name="repassword_user" type="password" class="form-control" {{ noEmpty('Ulangi password harus diisi.') }}>
                                <div id="repassword" class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-eye" id="show-repassword"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide-repassword"></i>
                                    </span>
                                </div>
                                <div id="pass" style="position:absolute; z-index:-1;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input id="nama_user" name="nama_user" type="text" class="form-control" {{ noEmpty('Nama lengkap tidak boleh kosong.') }}>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Group</label>
                        <div class="col-sm-8">
                            <select id="id_group" name="id_group" class="form-control select2-modal" {{ noEmpty('Group tidak boleh kosong.', true) }}>
                                @foreach($group as $g)
                                <option value="{{ $g->id }}">{{ $g->nama_group }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Alamat Email</label>
                        <div class="col-sm-8">
                            <input id="email_user" name="email_user" type="text" class="form-control" {{ noEmpty('Alamat email tidak boleh kosong.') }}>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Foto</label>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input id="foto_user" name="foto_user" type="file" accept="image/*" class="custom-file-input">
                                <label class="custom-file-label" for="foto_user">Pilih file</label>
                            </div>
                            <img id="img_user" class="user-img-radious-style mt-1 w-25 d-none">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8 switch switch-success">
                            <input type="checkbox" id="status_user" name="status_user" />
                            <label for="status_user" class="cr"></label>
                            <label for="status_user">Aktif ?</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-light w-25" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary w-25 ml-1">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="change" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ $current }}/change" method="post" class="checks-validation" novalidate="">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Ubah Password</h5>
                    <span class="text-validation"></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">
                            Password
                        </label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input id="ch" name="ch" type="hidden">
                                <input id="password_change" name="password_change" type="password" class="form-control" {{ noEmpty('Password tidak boleh kosong.') }}>
                                <div id="cpassword" class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-eye" id="show-cpassword"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide-cpassword"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Ulangi Password</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input id="repassword_change" name="repassword_change" type="password" class="form-control" {{ noEmpty('Ulangi password harus diisi.') }}>
                                <div id="crepassword" class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-eye" id="show-crepassword"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide-crepassword"></i>
                                    </span>
                                </div>
                                <div id="check" style="position:absolute; z-index:-1;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light w-25" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success w-25 ml-1">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function () {
    var dTable = $("#data").DataTable({
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
        order: [[0, "asc"]],
        columnDefs: [
            { className: "text-center text-nowrap", targets: [0] },
            { className: "text-right text-nowrap", targets: [] },
            { orderable: false, targets: [1, 2, 3] }
        ],
        columns: [
            {
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: "button" },
            { data: "nama" },
            { data: "nip" },
            { data: "mail" },
            { data: "kabupaten" },
            { data: "created_at" },
            { data: "nama_user" },
            { data: "status_berita" },
            { data: "status_approval" }
        ],
        displayStart: 0,
        pageLength: 10,
        rowCallback: function (row, data) {
            $(row).off("click").on("click", function (e) {
                if ($(e.target).is("#edit")) {
                    $.fn.start_length(dTable.page.info().start, dTable.page.info().length);
                    $.fn.edit(data);
                } else if ($(e.target).is("#update")) {
                    $.fn.start_length(dTable.page.info().start, dTable.page.info().length);
                    $.fn.update(data.id);
                } else if ($(e.target).is("#del")) {
                    $.fn.start_length(dTable.page.info().start, dTable.page.info().length);
                    $.fn.del(data.id);
                }
            });
        },
        drawCallback: function () {
            $('[data-toggle="popover"]').popover({ container: "body" });
            $("#input").off("click").on("click", function () {
                $.fn.start_length(dTable.page.info().start, dTable.page.info().length);
                $.fn.input();
            });
        },
        initComplete: function () {
            $.fn.start_length(0, 0, "", "");
        },
        dom: `<'row'<'col-sm-6 text-left'><'col-sm-6 text-right'B>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`
    });

    // Consolidate filter change events
    const filterChangeHandler = delay(function () {
        dTable.draw();
    }, 50);

    $("#keyword").keyup(delay(function (e) {
        dTable.draw();
        e.preventDefault();
    }, 500));
});
</script>
@include('cms.footer')