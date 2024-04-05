<?= $this->extend('templates/v_index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <div class="container-fluid">
        <br>
        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="404"> 404</div>
            <p class="lead text-gray-800 mb-5"> Page Not Found</p>
            <p class="text-gray-500 mb-0"> view ini sedang dalam pembuatan...</p>
            <a href="#"> ← kunjungi menu lain </a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>