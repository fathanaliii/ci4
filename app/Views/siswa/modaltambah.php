<!-- Modal -->
<div class="modal fade" id="modaltambah" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="h4 text-white">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <div class="col-lg">
                    <form action="<?= base_url('pisau/save'); ?>" class="formtambah" method="post">

                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label for="">NIPD</label>
                            <input type="text" name="nipdsiswa" id="nipdsiswa" class="form-control">
                            <div id="msg-nipdsiswa" class="invalid-feedback">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <input type="text" name="namasiswa" id="namasiswa" class="form-control">
                            <div id="msg-namasiswa" class="invalid-feedback">

                            </div>
                        </div>

                        <button type="submit" class="btn btn-block btn-primary  btnsimpan">Simpan</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    $('.formtambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            cache: false,
            beforeSend: function() {
                $('.btnsimpan').prop('disabled', true);
                $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.btnsimpan').prop('disabled', false);
                $('.btnsimpan').html('Simpan');
            },
            success: function(response) {
                if (response.error) {
                    let err = response.error;
                    if (err.namapisau) {
                        $('#namapisau').addClass('is-invalid');
                        $('#msg-namapisau').html(err.namapisau);

                    } else {
                        $('#namapisau').removeClass('is-invalid');
                        $('#msg-namapisau').addClass('is-valid');
                        $('#msg-namapisau').html('');

                    }
                    if (err.ukuran) {
                        $('#ukuran').addClass('is-invalid');
                        $('#msg-ukuran').html(err.ukuran);
                    }
                    if (err.jumlahmata) {
                        $('#jumlahmata').addClass('is-invalid');
                        $('#msg-jumlahmata').html(err.jumlahmata);
                    }
                    if (err.bentangan) {
                        $('#bentangan').addClass('is-invalid');
                        $('#msg-bentangan').html(err.bentangan);
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil..',
                        text: response.sukses
                    });
                    $('#modaltambah').modal('hide');
                    dataPisau.ajax.reload();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
        return false;
    });
</script>