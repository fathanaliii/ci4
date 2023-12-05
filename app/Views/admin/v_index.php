<?= $this->extend('templates/v_index'); ?>


<?= $this->section('page-content'); ?>

<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">User</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <table style="width: 100%;" id="datauser" class="table table-bordered table-hover dataTable dtr-inline collapsed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"> <?= $i++; ?></th>
                            <td><?= $user->username; ?></td>
                            <td><?= $user->email; ?></td>
                            <td><?= $user->name; ?></td>
                            <td>
                                <a href="<?= base_url('admin/' . $user->userid); ?>" class="btn btn-info">Detail</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>