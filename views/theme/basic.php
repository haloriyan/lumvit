<div class="headerBackground"></div>
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

    <?php if (count($experiences) != 0) : ?>
    <div class="experienceArea section rata-kiri">
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
    <?php endif ?>
    <?php if (count($skills) != 0) : ?>
    <div class="skillArea section rata-kiri">
        <div class="wrap">
            <h2>Keahlian</h2>
            <?php foreach ($skills as $skill) : ?>
                <div class="exp">
                    <h3><?= $skill->title ?> - <?= $skill->level ?></h3>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <?php endif ?>
    <?php if (count($educations) != 0) : ?>
    <div class="educationArea section rata-kiri">
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
    <?php endif ?>
    <?php if (count($certificates) != 0) : ?>
        <div class="section rata-kiri">
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
    <?php endif ?>
</div>