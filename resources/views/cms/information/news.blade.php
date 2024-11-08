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
<div class="bg-white p-2 m-4">
    <div class="row g-3 align-items-center">
        <div class="col-2">
            <label for="categorytxt" class="col-form-label form-label">Kategori</label>
        </div>
        <div class="col-4">
            <select id="categorytxt" name="categorytxt" class="form-control">
                <option value="">-- pilih --</option>
                @foreach($kategori as $dt_kategori)
                @if($dt_kategori->id_sub_category == 0)
                <option value="{{ $dt_kategori->id; }}">{{ $dt_kategori->nama; }}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="clearfix my-2"></div>
    <div class="row g-3 align-items-center">
        <div class="col-2">
            <label for="category2txt" class="col-form-label form-label">Sub Kategori</label>
        </div>
        <div class="col-4">
            <select id="category2txt" name="category2txt" class="form-control">
                <option value="">-- pilih --</option>
                @foreach($kategori as $dt_kategori2)
                @if($dt_kategori2->id_sub_category == 1)
                <option value="{{ $dt_kategori2->id; }}">{{ $dt_kategori2->nama; }}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="clearfix my-2"></div>
    <div class="row g-3 align-items-center">
        <div class="col-2">
            <label for="apprtxt" class="col-form-label form-label">Status Approval</label>
        </div>
        <div class="col-4">
            <select id="apprtxt" name="apprtxt" class="form-control">
                <option value="">-- pilih --</option>
                <option value="0">ditolak</option>
                <option value="1">menunggu persetujuan</option>
                <option value="2">disetujui</option>
            </select>
        </div>
    </div>
    <div class="clearfix my-2"></div>
    <div class="row g-3 align-items-center">
        <div class="col-2">
            <label for="categorytxt" class="col-form-label form-label">Pencarian</label>
        </div>
        <div class="col-4">
            @if(isset($filter))
            {{ searchFilter($filter) }}
            @endif
        </div>
        <div class="col-6 text-right">
            @if($input)
            <a href="{{ url($current.'/form/0') }}" class="btn btn-sm btn-warning"><i class="feather icon-plus"></i> Tambah Data</a>
            @else
            &nbsp;
            @endif
        </div>
    </div>
    <div class="clear mt-4"></div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="data">
            <thead>
                <tr>
                    <th>No</th>
                    @if($edit || $delete)<th>#</th>@endif
                    <th>Judul</th>
                    <th>pencipta</th>
                    <th>provinsi</th>
                    <th>kabupaten</th>
                    <th>Tanggal</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Persetujuan</th>
                </tr>
            </thead>
        </table>
    </div>
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
            url: "news/json",
            data: function (d) {
                d.keyword = $("#keyword").val();
                d.kategori = $("#categorytxt").val();
                d.subkategori = $("#category2txt").val();
                d.approval = $("#apprtxt").val();
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
            { data: "nama_berita" },
            { data: "pencipta" },
            { data: "provinsi" },
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

    $("#categorytxt, #category2txt, #apprtxt").change(filterChangeHandler);
});
</script>
@include('cms.footer')