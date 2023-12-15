<?= $this->extend('templates/v_index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h3 mb-0 text-gray-800">Selamat Datang : <b class="text-primary"><?= user()->username; ?> !!!</b></h3>
    </div> -->
    <div class="container-fluid">
        <br>
        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">view ini sedang dalam pembuatan...</p>
            <a href="#">← kunjungi menu lain</a>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>