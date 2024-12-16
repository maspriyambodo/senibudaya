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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Informasi</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{ alertInfo() }}
        <div class="bg-white p-2 m-4">
            <div class="clearfix my-2"></div>
            <div class="row g-3 align-items-center">
                <div class="col-6">
                    @if(isset($filter))
                    {{ searchFilter($filter) }}
                    @endif
                </div>
                <div class="col-6 text-right">
                    @if($input)
                    <a href="{{ url($current.'/add/') }}" class="btn btn-sm btn-warning"><i class="feather icon-plus"></i> Tambah Data</a>
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
                            <th>#</th>
                            <th>Nomor Monitoring</th>
                            <th>provinsi</th>
                            <th>kabupaten</th>
                            <th>Tanggal Monitoring</th>
                        </tr>
                    </thead>
                </table>
            </div>
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
                url: "monitoring/json",
                data: function (d) {
                    d.keyword = $("#keyword").val();
                }
            },
            order: [[0, "asc"]],
            columnDefs: [
                {className: "text-center text-nowrap", targets: [0]},
                {className: "text-right text-nowrap", targets: []},
                {orderable: false, targets: [1, 2, 3]}
            ],
            columns: [
                {
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: "button"},
                {data: "no_monitoring"},
                {
                    render: function(data, type, row, meta){
                            return row.provinsi.nama;
                        }
                },
                {
                    render: function(data, type, row, meta){
                            return row.kabupaten.nama;
                        }
                },
                {data: "tgl_monitoring"},
            ],
            displayStart: 0,
            pageLength: 10,
            drawCallback: function () {
                $('[data-toggle="popover"]').popover({container: "body"});
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