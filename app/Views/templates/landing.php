<?= $this->extend('templates/v_index2'); ?>
<?= $this->section('page-content'); ?>
<div class='ripple-background'>
    <div class='circle xxlarge shade1'></div>
    <div class='circle xlarge shade2'></div>
    <div class='circle large shade3'></div>
    <div class='circle medium shade4'></div>
    <div class='circle small shade5'></div>

    <!-- Teks Welcome -->
    <div class='welcome-text'>
        <h1>Welcomeback -<span class="username-span" ><?= user()->username; ?> !</span></h1>
        <br>
        <a href="<?= base_url('dashboard'); ?>" class="btn btn-light">
            <i class="fas fa-play" style="color: blue;"></i>
        </a>
    </div>
</div>
<!-- 3399ff -->
<style>
    body {
        background: blue; 
        display: flex;
        align-items: center;
        justify-content: flex-end;
        height: 100vh;
        margin: 0;
    }

    .ripple-background {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .circle {
        position: absolute;
        border-radius: 50%;
        background: white;
        animation: ripple 15s infinite;
        box-shadow: 0px 0px 1px 0px #508fb9;
    }

    .small {
        width: 200px;
        height: 200px;
        left: -100px;
        bottom: -100px;
    }

    .medium {
        width: 400px;
        height: 400px;
        left: -200px;
        bottom: -200px;
    }

    .large {
        width: 600px;
        height: 600px;
        left: -300px;
        bottom: -300px;
    }

    .xlarge {
        width: 800px;
        height: 800px;
        left: -400px;
        bottom: -400px;
    }

    .xxlarge {
        width: 1000px;
        height: 1000px;
        left: -500px;
        bottom: -500px;
    }

    .shade1 {
        opacity: 0.2;
    }

    .shade2 {
        opacity: 0.5;
    }

    .shade3 {
        opacity: 0.7;
    }

    .shade4 {
        opacity: 0.8;
    }

    .shade5 {
        opacity: 0.9;
    }

    .welcome-text {
        text-align: center;
        color: white;
        z-index: 1;
        position: absolute;
        right: 200px; /* Adjust the right position as needed */
        top: 50%;
        transform: translateY(-50%);
    }

    .username-span {
        display: inline-block;
        color: white;
        opacity: 0;
        transform: translateX(200px);
        animation: fadeInRight 0.1s ease-in-out 0.5s forwards, repeatAnimation 3s infinite, waveAnimation 2s infinite;
    }

    @keyframes ripple {
        0% {
            transform: scale(0.8);
        }

        50% {
            transform: scale(1.2);
        }

        100% {
            transform: scale(0.8);
        }
    }

    @keyframes fadeInRight {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes repeatAnimation {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 1;
        }
    }

    @keyframes waveAnimation {
        0%, 100% {
            transform: translateX(0);
        }
        50% {
            transform: translateX(10px);
        }
    }
</style>

<?= $this->endSection(); ?>
