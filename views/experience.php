<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengalaman - <?= env('APP_NAME') ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>js/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>js/flatpickr/dist/themes/material_blue.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/app.css">
    <style>
        .box[readonly] { background: #fff; }
        .list p { font-size: 15px; }
        .list h3 { margin-bottom: 0px; }
        .list .year {
            margin-top: 28px;
        }
    </style>
</head>
<body>

<?php insert('partials/header', ['title' => "Pengalaman"]); ?>

<?php insert('partials/menu'); ?>

<div class="container">
    <div class="bagi bagi-2">
        <div class="wrap">
            <?php if (@$message != "") : ?>
                <div class="bg-hijau-transparan rounded p-2 mb-2">
                    <?= @$message ?>
                </div>
            <?php endif ?>
            <?php if (count($experiences) == 0) : ?>
                <h3>Belum ada pengalaman</h3>
            <?php else : ?>
                <?php foreach ($experiences as $exp) : ?>
                    <div class="list bayangan-5 mb-3 rounded smallPadding">
                        <div class="wrap">
                            <h3><?= $exp->title ?>
                                <a href="<?= route('education/'.$exp->id.'/delete') ?>" class="teks-merah"><i class="fas fa-trash ke-kanan"></i></a>
                            </h3>
                            <p>di <?= $exp->company ?></p>
                            <div class="year">
                                <?= Carbon\Carbon::create($exp->start)->format('M, Y') ?>
                                -
                                <?= $exp->end ?>
                            </div>
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
                    <h3>Tambah Pengalaman</h3>
                    <form action="<?= route('experience/store') ?>" class="mt-3 mb-4" method="POST">
                        <input type="hidden" name="user_id" value="<?= $myData->id ?>">
                        <div class="mt-2">Nama Jabatan :</div>
                        <input type="text" class="box" name="title" required>
                        <div class="mt-2">Perusahaan :</div>
                        <input type="text" class="box" name="company" required>
                        <div class="bagi bagi-2 mt-2">
                            <div>Mulai :</div>
                            <input type="text" name="start" class="box" id="start" onchange="chooseStart(this.value)" require>
                        </div>
                        <div class="bagi bagi-2 mt-2" id="graduationArea">
                            <div>Berakhir :</div>
                            <input type="text" name="graduate" class="box" id="graduate" readonly require>
                        </div>

                        <div class="mt-2">
                            <input type="hidden" id="stillHere" name="still_here">
                            <input type="checkbox" name="stillHereToggle" id="stillHereToggle" onchange="graduationStatus(this)">
                            <label for="stillHereToggle">Saya masih berada di sini</label>
                        </div>

                        <button class="lebar-100 biru mt-2">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="marginBottom"></div>
</div>

<script src="<?= base_url() ?>js/base.js"></script>
<script src="<?= base_url() ?>js/flatpickr/dist/flatpickr.min.js"></script>
<script>
    let isStillHere = false

    flatpickr("#start", {
        dateFormat: 'Y-m-d'
    })
    const chooseStart = (date) => {
        flatpickr("#graduate", {
            dateFormat: 'Y-m-d',
            minDate: date
        })
    }
    const graduationStatus = status => {
        isStillHere = !isStillHere
        if (isStillHere) {
            select("#graduationArea").style.display = "none"
        }else {
            select("#graduationArea").style.display = "inline-block"
        }
        select("#stillHere").value = isStillHere
    }
</script>
    
</body>
</html>