<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/auth.css">
    <link rel="shortcut icon" href="<?= base_url() ?>image/icon/icon.png">
</head>
<body>

<div class="illustration">
    <img src="<?= base_url() ?>image/success.png">
</div>

<div class="container">
    <div class="wrap">
        <h1>Login Admin</h1>
        <?php if(@$message != "") : ?>
            <div class="mt-4 bg-merah-transparan rounded p-2 mt-3">
                <?= $message ?>
            </div>
        <?php endif ?>
        <form action="<?= route('admin/loginAction') ?>" class="mt-4" method="POST">
            <div class="mt-2">Username :</div>
            <input type="username" class="box" name="username" required>
            <div class="mt-2">Password :</div>
            <input type="password" class="box" name="password" required>
            <button class="lebar-100 mt-3 biru">Login</button>
        </form>
    </div>
    <div class="marginBottom"></div>
</div>

<script src="<?= base_url() ?>js/base.js"></script>

</body>
</html>