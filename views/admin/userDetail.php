<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $user->name ?> - <?= env('APP_NAME') ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/app.css">
    <link rel="shortcut icon" href="<?= base_url() ?>image/icon/icon.png">
    <style>
        .contact {
            display: inline-block;
            border: 1px solid #ddd;
            padding: 10px 20px;
            border-radius: 90px;
            margin-bottom: 15px;
            cursor: pointer;
        }
        .contact:hover {
            border-color: #3498db;
            background-color: #3498db;
            color: #fff;
        }
        .profilePicture {
            width: 160px;
            height: 160px;
            margin-bottom: 20px;
            border-radius: 900px;
            display: inline-block;
        }
        .edu {
            margin-top: 30px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 25px;
        }
        .edu p {
            margin-top: -7px;
        }
        .edu div { font-size: 14px; }
    </style>
</head>
<body>

<?php insert('../partials/admin/Header', ['title' => $user->name]); ?>

<?php insert('../partials/admin/Menu'); ?>

<div class="container">
    <div class="bagi bagi-2">
        <div class="wrap">
            <div class="bg-putih rounded bayangan-5 smallPadding rata-tengah">
                <div class="wrap">
                    <div class="profilePicture" bg-image="<?= base_url() ?>storage/photo/<?= $user->photo ?>"></div>
                    <h2><?= $user->name ?></h2>
                    <p><?= $user->short_bio ?></p>
                    <?php foreach($user->contacts as $contact) : ?>
                        <div class="contact">
                            <i class="<?= $contact->icon ?>"></i> &nbsp; <?= $contact->value ?>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="bg-putih rounded bayangan-5 smallPadding mt-4">
                <div class="wrap">
                    <h2>Educations</h2>
                    <?php 
                    use Carbon\Carbon;
                    ?>
                    <?php foreach ($user->educations as $edu) : ?>
                        <div class="edu">
                            <h3><?= $edu->name ?></h3>
                            <p><?= $edu->majority ?></p>
                            <div>
                                <?= Carbon::parse($edu->start)->format('d M Y') ?>
                                -
                                <?= Carbon::parse($edu->graduate)->format('d M Y') ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bagi bagi-2">
        <div class="wrap">
            <div class="bg-putih rounded bayangan-5 smallPadding">
                <div class="wrap">
                    <h2>Skills</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user->skills as $skill) : ?>
                                <tr>
                                    <td><?= $skill->title ?></td>
                                    <td><?= $skill->level ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-putih rounded bayangan-5 smallPadding mt-4">
                <div class="wrap">
                    <h2>Experiences</h2>
                    <?php foreach($user->experiences as $exp) : ?>
                        <div class="edu">
                            <h3><?= $exp->title ?></h3>
                            <p><?= $exp->company ?></p>
                            <div>
                                <?= Carbon::parse($exp->start)->format('d M Y') ?>
                                -
                                <?= Carbon::parse($exp->end)->format('d M Y') ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <div class="marginBottom"></div>
</div>
    
<script src="<?= base_url() ?>js/base.js"></script>

</body>
</html>