<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keahlian - <?= env('APP_NAME') ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/app.css">
</head>
<body>

<?php insert('partials/header', ['title' => "Keahlian"]); ?>

<?php insert('partials/menu'); ?>

<div class="container">
<div class="bagi bagi-2">
        <div class="wrap">
            <?php if (@$message != "") : ?>
                <div class="bg-hijau-transparan rounded p-2 mb-2">
                    <?= @$message ?>
                </div>
            <?php endif ?>
            <?php if (count($skills) == 0) : ?>
                <h3>Tidak ada keahlian ditambahkan</h3>
            <?php else : ?>
                <?php foreach ($skills as $skill) : ?>
                    <div class="list bayangan-5 mb-3 rounded smallPadding">
                        <div class="wrap">
                            <h3><?= $skill->title ?> - <?= $skill->level ?>
                                <a href="<?= route('skill/'.$skill->id.'/delete') ?>" class="teks-merah"><i class="fas fa-trash ke-kanan"></i></a>
                            </h3>
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
                    <h3>Tambahkan Keahlian</h3>
                    <form action="<?= route('skill/store') ?>" class="mt-3 mb-4" method="POST">
                        <input type="hidden" name="user_id" value="<?= $myData->id ?>">
                        <div class="mt-2">Nama keahlian :</div>
                        <input type="text" class="box" name="title" placeholder="Misal : Microsoft Office, Photoshop, Javascript">
                        <div class="mt-2">Tingkat keahlian :</div>
                        <select name="level" class="box">
                            <option>Pemula</option>
                            <option>Menengah</option>
                            <option>Mahir</option>
                        </select>

                        <button class="lebar-100 biru mt-2">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="marginBottom"></div>
</div>

<script src="<?= base_url() ?>js/base.js"></script>
    
</body>
</html>