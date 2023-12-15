<?= $this->extend('layouts/v_index') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Siswa</h1>
    </div>
    <?php foreach($data as $row) :?>
        <p><?= $row->nama_siswa ?></p>
    <?php endforeach; ?>
</div>
<?= $this->endSection('content') ?> 
<?= $this->renderSection('scripts') ?>

