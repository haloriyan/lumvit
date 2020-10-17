<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/auth.css">
</head>
<body>

<div class="illustration">
    <img src="<?= base_url() ?>image/success.png">
</div>

<div class="container">
    <div class="wrap">
        <h1>Register</h1>
        <?php if(@$message != "") : ?>
            <div class="mt-4 bg-merah-transparan rounded p-2 mt-3">
                <?= $message ?>
            </div>
        <?php endif ?>
        <form action="<?= route('registerAction') ?>" class="mt-4" method="POST">
            <div class="mt-2">Name :</div>
            <input type="text" class="box" name="name" required>
            <div class="mt-2">Email :</div>
            <input type="email" class="box" name="email" required>
            <div class="mt-2">Password :</div>
            <input type="password" class="box" name="password" required>
            <div class="mt-2">
                <input type="checkbox" id="agreement" required> <label for="agreement">Saya setuju dengan aturan di <a href="<?= route('term') ?>" target="_blank">Terms &amp; Condition</a></label>
            </div>
            <button class="lebar-100 mt-3 biru">Register</button>
        </form>

        <div class="mt-4 rata-tengah">
            sudah punya akun? <a href="<?= route('login') ?>">login</a> saja
        </div>
    </div>
    <div class="marginBottom"></div>
</div>

</body>
</html>