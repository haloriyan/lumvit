<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikasi dan Penghargaan - <?= env('APP_NAME') ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/app.css">
    <link rel="shortcut icon" href="<?= base_url() ?>image/icon/icon.png">
</head>
<body>

<?php insert('partials/header', ['title' => "Sertifikasi"]); ?>

<?php insert('partials/menu'); ?>

<div class="container">
    <div class="bagi bagi-2">
        <div class="wrap">
            <?php if (@$message != "") : ?>
                <div class="bg-hijau-transparan rounded p-2 mb-2">
                    <?= @$message ?>
                </div>
            <?php endif ?>
            <?php if (count($certificates) == 0) : ?>
                <h3>Tidak ada data sertifikasi atau penghargaan</h3>
            <?php else : ?>
                <?php foreach ($certificates as $cert) : ?>
                    <div class="list bayangan-5 mb-3 rounded smallPadding">
                        <div class="wrap">
                            <h3><?= $cert->title ?>
                                <a href="<?= route('certificate/'.$cert->id.'/delete') ?>" class="teks-merah"><i class="fas fa-trash ke-kanan"></i></a>
                            </h3>
                            <div class="year"><?= $cert->year ?></div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
    <div class="bagi bagi-2">
        <div class="wrap">
            <div class="rounded bayangan-5 smallPadding">
                <div class="wrap">
                    <h3>Tambah Sertifikasi atau Penghargaan</h3>
                    <form action="<?= route('certificate/store') ?>" class="mt-3 mb-4" method="POST">
                        <input type="hidden" name="user_id" value="<?= $myData->id ?>">
                        <div class="mt-2">Judul :</div>
                        <input type="text" class="box" name="title" placeholder="Misal: Top 10 Adobe Creative Designer">
                        <div class="mt-2">Tahun :</div>
                        <select name="year" class="box">
                            <?php for ($i = date('Y'); $i >= 1961; $i--) : ?>
                                <option><?= $i ?></option>
                            <?php endfor ?>
                        </select>

                        <button class="lebar-100 biru mt-2">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="marginBottom"></div>
</div>
    
</body>
</html>