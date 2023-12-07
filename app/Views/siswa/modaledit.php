 <!-- Modal -->
<div class="modal fade" id="modaledit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="text-center">
                    <h5 class="h4 text-white">Edit Data</h5>
                </div>
            </div>
            <div class="modal-body">
                <div class="col-lg">
                    <?= form_open('/siswa/update', ['class' => 'formsimpan']); ?>

                    <div class="form-group">
                        <label for="">NIPD</label>
                        <input type="text" name="nipdsiswa" id="nipdsiswa" class="form-control" value="<?= $nipdsiswa; ?>" readonly="true">
                        <div id="msg-nipdsiswa" class="invalid-feedback">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input type="text" name="namasiswa" id="namasiswa" class="form-control" value="<?= $namasiswa; ?>">
                        <div id="msg-namasiswa" class="invalid-feedback">

                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary  btnsimpan">Update</button>
                    </form>
                </div>
            </div>
            <?= form_close(); ?>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.formsimpan').submit(function(e) {
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
                    $('.btnsimpan').html('Update');
                },
                success: function(response) {
                    if (response.error) {
                        let err = response.error;
                        if (err.nipdsiswa) {
                            $('#nipdsiswa').addClass('is-invalid');
                            $('#msg-nipdsiswa').html(err.nipdsiswa);

                        } else {
                            $('#nipdsiswa').removeClass('is-invalid');
                            $('#msg-nipdsiswa').addClass('is-valid');
                            $('#msg-nipdsiswa').html('');

                        }
                        if (err.namasiswa) {
                            $('#namasiswa').addClass('is-invalid');
                            $('#msg-namasiswa').html(err.namasiswa);
                        }
                        
                    } else {
                        $('#modaledit').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil..',
                            text: response.sukses
                        });

                        dataSiswa.ajax.reload();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError)
                }
            });
            return false;
        });
    });
</script>