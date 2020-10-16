<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - <?= env('APP_NAME') ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/app.css">
</head>
<body>

<?php insert('partials/header', ['title' => "Home"]); ?>

<?php insert('partials/menu'); ?>

<div class="container">
    <div class="item">
        <h3>Surabaya - Denpasar</h3>
        <p>09.11 - 20.01</p>
    </div>
    <div class="marginBottom"></div>
</div>

<button class="actionButton"><i class="fas fa-plus"></i></button>
    
</body>
</html>