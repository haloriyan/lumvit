<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - <?= env('APP_NAME') ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/app.css">
    <link rel="shortcut icon" href="<?= base_url() ?>image/icon/icon.png">
</head>
<body>

<?php insert('../partials/admin/Header', ['title' => "Users"]); ?>

<?php insert('../partials/admin/Menu'); ?>

<div class="container">
    <h2>Welcome to Dashboard</h2>
    <div class="marginBottom"></div>
</div>
    
</body>
</html>