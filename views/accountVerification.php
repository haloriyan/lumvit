<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Berhasil!</title>
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
        <h1 class="mt-4">Verifikasi Berhasil!</h1>
        <p class="mt-4">Terima kasih sudah mendaftar di <?= env('APP_NAME') ?>, <?= explode(" ", $user->name)[0] ?>. Sekarang kamu bisa mulai membuat CV dengan login terlebih dahulu</p>

        <a href="<?= route('login', ['email' => $user->email]) ?>"><button class="lebar-100 biru mt-2">Login</button></a>
    </div>
    <div class="marginBottom"></div>
</div>

</body>
</html>