<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pendidikan - <?= env('APP_NAME') ?></title>
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

<?php insert('partials/header', ['title' => "Riwayat Pendidikan"]); ?>

<?php insert('partials/menu'); ?>

<div class="container">
    <div class="bagi bagi-2">
        <div class="wrap">
            <?php if (@$message != "") : ?>
                <div class="bg-hijau-transparan rounded p-2 mb-2">
                    <?= @$message ?>
                </div>
            <?php endif ?>
            <?php if (count($educations) == 0) : ?>
                <h3>Tidak ada data pendidikan</h3>
            <?php else : ?>
                <?php foreach ($educations as $edu) : ?>
                    <div class="list bayangan-5 mb-3 rounded smallPadding">
                        <div class="wrap">
                            <h3><?= $edu->name ?>
                                <a href="<?= route('education/'.$edu->id.'/delete') ?>" class="teks-merah"><i class="fas fa-trash ke-kanan"></i></a>
                            </h3>
                            <p><?= $edu->majority ?></p>
                            <div class="year">
                                <?= Carbon\Carbon::create($edu->start)->format('M, Y') ?>
                                -
                                <?= Carbon\Carbon::create($edu->graduate)->format('M, Y') ?>
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
                    <h3>Tambah Riwayat Pendidikan</h3>
                    <form action="<?= route('education/store') ?>" class="mt-3 mb-4" method="POST">
                        <input type="hidden" name="user_id" value="<?= $myData->id ?>">
                        <div class="mt-2">Nama sekolah/universitas :</div>
                        <input type="text" class="box" name="name">
                        <div class="mt-2">Jurusan :</div>
                        <input type="text" class="box" name="majority">
                        <div class="bagi bagi-2 mt-2">
                            <div>Mulai :</div>
                            <input type="text" name="start" class="box" id="start" onchange="chooseStart(this.value)">
                        </div>
                        <div class="bagi bagi-2 mt-2" id="graduationArea">
                            <div>Lulus :</div>
                            <input type="text" name="graduate" class="box" id="graduate" readonly>
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