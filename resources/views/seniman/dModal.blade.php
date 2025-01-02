<div id="dModal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="dModalTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dModalTitle"></h5>
            </div>
            <form id="del_form" action="{{ url('seniman/update') }}" novalidate="novalidate" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                <input type="hidden" id="didtxt" name="didtxt" required=""/>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        anda yakin ingin menghapus data Seniman?
                        <br><!-- comment -->
                        data yang telah dihapus tidak dapat dikembalikan!
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button id="dbtn_submit" type="button" class="btn btn-danger" onclick="senimanDelete();">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function dLembaga(idLembaga) {
        Swal.fire({
            title: 'memuat data...',
            html: '<img src="{{ asset("cms/images/loading.gif"); }}" title="Sedang Diverifikasi" class="h-100px w-100px" alt="">',
            allowOutsideClick: false,
            showConfirmButton: false,
            onOpen: function () {
                Swal.showLoading();
            }
        });
        $.ajax({
            url: "{{ url('seniman/detil'); }}/" + idLembaga,
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data, textStatus, jqXHR) {
                if (data.success) {
                    $('#didtxt').val(idLembaga);
                    $('#dModalTitle').html('Hapus ' + data.dt_seniman.hasil[0].seniman.nama);
                    $('#dModal').modal('show');
                    Swal.close();
                } else {
                    Swal.fire({
                        text: "error get data Seniman, errcode: 02012147f",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "OK",
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    text: "error get data Seniman, errcode: 02012147f",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        });
    }
</script>
<script>
    function senimanDelete() {
        var didtxt, dformStat, dformData, del_form;
        del_form = document.getElementById('del_form');
        didtxt = $('#didtxt').val();
        dformStat = true;
        if (didtxt === '') {
            Swal.fire({
                text: "sesuatu yang salah pada sistem!",
                icon: "success",
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
        if (dformStat) {
            const dformData = new FormData(del_form);
            fetch('seniman/delete', {
                method: 'POST',
                body: dformData
            })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            $('#data').DataTable().ajax.reload();
                            $('#dModal').modal('toggle');
                            Swal.fire({
                                text: "data has been deleted",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "OK",
                                allowOutsideClick: false,
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        } else {
                            Swal.fire({
                                text: data.errmessage,
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
        } else {
            Swal.fire({
                text: "mohon lengkapi form!",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        }
    }
</script>