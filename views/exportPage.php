<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export CV - <?= env('APP_NAME') ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/app.css">
    <link rel="shortcut icon" href="<?= base_url() ?>image/icon/icon.png">
</head>
<body>

<?php insert('partials/header', ['title' => "Home"]); ?>

<?php insert('partials/menu'); ?>

<div class="container">
    <?php if (@$message != "") : ?>
        <div class="bg-hijau-transparan rounded p-2">
            <?= @$message ?>
        </div>
    <?php endif ?>
    <div class="bagi bagi-3">
        <div class="wrap">
            <div class="bayangan-5">
                <img src="<?= base_url() ?>image/preview/basic.png" class="lebar-100" />
                <div class="smallPadding">
                    <div class="wrap">
                        <h3>Basic Template</h3>
                        <a href="<?= route('export/basic') ?>">
                            <button class="biru lebar-100 tinggi-40 p-0">Export!</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bagi bagi-3">
        <div class="wrap">
            <div class="bayangan-5">
                <img src="<?= base_url() ?>image/preview/alpha.png" class="lebar-100" />
                <div class="smallPadding">
                    <div class="wrap">
                        <h3>Alpha Template</h3>
                        <a href="<?= route('export/alpha') ?>">
                            <button class="biru lebar-100 tinggi-40 p-0">Export!</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="marginBottom"></div>
</div>
    
<script src="<?= base_url() ?>js/base.js"></script>

</body>
</html>