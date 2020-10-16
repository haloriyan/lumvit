<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= env('APP_DESCRIPTION') ?>">
    <title><?= env('APP_NAME') ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/index.css">
</head>
</head>
<body>
    
<?php insert('../partials/HeaderPublic') ?>

<div class="container lebar-40" style="top: 140px">
    <h2>Tentang <?= env('APP_NAME') ?></h2>
    <p>
        <?= env('APP_NAME') ?> adalah aplikasi yang membantu kamu untuk membuat CV secara otomatis, hanya butuh waktu sebentar. Asiknya, tersedia banyak template keren yang dapat kamu pilih sesuai pekerjaan yang kamu lamar.
    </p>
</div>

<div class="bottom">
    <section>
        <div class="wrap">
            <div class="bagi bagi-2">
                <div class="lebar-100"></div>
            </div>
            <div class="bagi bagi-2">
                <h3>Dapatkan kerjaan impian kamu</h3>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url() ?>js/base.js"></script>
    
</body>
</html>