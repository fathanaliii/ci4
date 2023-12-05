<?= $this->extend('templates/v_index'); ?>
<?= $this->section('page-content'); ?>


<link rel="stylesheet" href="<?= base_url(); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Page Heading -->
<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Data Siswa</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <button type="button" class="btn btn-primary btnTambah">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
                &nbsp;
                <button type="button" class="btn btn-success btninfo">
                    <i class="fas fa-question text-black"></i>
                </button>
            </div>
            <hr>
            <table style="width: 100%;" id="datasiswa" class="table table-bordered table-hover dataTable dtr-inline collapsed">
                <thead>
                    <tr class="bg-primary text-white">
                        <th style="width: 10%;">No</th>
                        <th>NIPD</th>
                        <th>NAMA SISWA</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal --->
<div class="viewmodal" style="display: none;"></div>
<script>
    $('.btnTambah').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "/siswa/tambah",
            success: function(response) {
                $('.viewmodal').html(response).show();
                $('#modaltambah').on('hidden.bs.modal', function(event) {
                    $('#nipd').focus();
                })
                $('#modaltambah').modal('show');
            }
        });
    });

    $(document).ready(function() {
        dataSiswa = $('#datasiswa').DataTable({
            "processing": true,
            "serverSide": true,
            "destroy": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('/siswa/data') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                "targets": [0, 3],
                "orderable": false,
            }, ],
        });
    });
</script>
<?= $this->endSection(); ?>