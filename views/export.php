<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export</title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/export.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/themes/<?= $theme ?>.css">
    <link rel="shortcut icon" href="<?= base_url() ?>image/icon/icon.png">
</head>
<body>
    
<div class="area">
    <?php insert('theme/basic') ?>
    <div class="content">
        <h2 class="title">CURRICULUM VITAE</h2>
        <div class="picture" bg-image="<?= base_url() ?>storage/photo/<?= $myData->photo ?>"></div>
        <h1 class="name"><?= $myData->name ?></h1>
        <h2 class="role"><?= $myData->role ?></h2>
        <p class="shortBio"><?= $myData->short_bio ?></p>

        <div class="contactArea">
            <?php foreach ($contacts as $cont) : ?>
                <div class="contact">
                    <i class="<?= $cont->icon ?>"></i> &nbsp;<?= $cont->value ?>
                </div>
            <?php endforeach ?>
        </div>

        <div class="bagi bagi-3 experienceArea section rata-kiri">
            <div class="wrap">
                <h2>Pengalaman</h2>
                <?php foreach ($experiences as $exp) : ?>
                    <div class="exp">
                        <h3><?= $exp->title ?> di <?= $exp->company ?></h3>
                        <p><?= \Carbon\Carbon::parse($exp->start)->format('M, Y') ?> - <?= $exp->end ?> </p>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="bagi bagi-3 skillArea section rata-kiri">
            <div class="wrap">
                <h2>Keahlian</h2>
                <?php foreach ($skills as $skill) : ?>
                    <div class="exp">
                        <h3><?= $skill->title ?> - <?= $skill->level ?></h3>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="bagi bagi-3 educationArea section rata-kiri">
            <div class="wrap">
                <h2>Pendidikan</h2>
                <?php foreach ($educations as $edu) : ?>
                    <div class="exp">
                        <h3><?= $edu->name ?></h3>
                        <p><?= $edu->majority ?></p>
                        <div class="year mt-4">
                            <?= \Carbon\Carbon::parse($edu->start)->format('M, Y') ?> - <?= $edu->graduate ?> 
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="bagi lebar-100 section rata-kiri">
            <div class="wrap">
                <h2>Sertifikasi dan Penghargaan</h2>
                <?php foreach ($certificates as $cert) : ?>
                    <div class="cert bagi bagi-2">
                        <h3><?= $cert->title ?></h3>
                        <p><?= \Carbon\Carbon::parse($cert->year)->format('M, Y') ?></p>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>js/base.js"></script>
<script src="<?= base_url() ?>js/html2canvas.min.js"></script>
<script>
    html2canvas(select(".area")).then(cvs => {
        document.body.innerHTML = ""
        let lnk = document.createElement('a')
        lnk.href = cvs.toDataURL()
        lnk.download = "tes.png"
        lnk.click()
        document.body.appendChild(cvs)
        setTimeout(() => {
            window.location = "<?= route('export') ?>?message=" + btoa('CV berhasil diekspor') + "&isRedirected=1"
        }, 1980);
    })
</script>

</body>
</html>