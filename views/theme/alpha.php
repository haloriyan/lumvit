<div class="bagKiri">
    <div class="picture" bg-image="<?= base_url() ?>storage/photo/<?= $myData->photo ?>"></div>
    <h2 class="name"><?= $myData->name ?></h2>
    <h4><?= $myData->role ?></h4>
    <p class="short_bio"><?= $myData->short_bio ?></p>
    <div class="wrap">
        <?php if (count($contacts) != 0) : ?>
            <h3>Contact Me</h3>
            <?php foreach ($contacts as $contact) : ?>
                <div class="contact">
                    <div class="icon"><i class="<?= $contact->icon ?>"></i></div>
                    <div class="value"><?= $contact->value ?></div>
                </div>
            <?php endforeach ?>
            <div class="contact">
                <div class="icon"><i class="fas fa-map-marker"></i></div>
                <div class="value"><?= $myData->address ?></div>
            </div>
        <?php endif ?>
    </div>
</div>
<div class="bagKanan">
    <div class="wrap">
        <div class="education section">
            <h2>
                <div class="icon"><i class="fas fa-graduation-cap"></i></div>
                <div class="text">Pendidikan</div>
            </h2>
            <?php foreach ($educations as $edu) : ?>
                <div class="edu">
                    <div class="wrap">
                        <div class="bagi lebar-40">
                            <h3><?= \Carbon\Carbon::parse($edu->start)->format('M, Y') ?> - <?= $edu->graduate ?></h3>
                        </div>
                        <div class="bagi lebar-60">
                            <h4><?= $edu->name ?></h4>
                            <p><?= $edu->majority ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="experience section">
            <h2>
                <div class="icon"><i class="fas fa-briefcase"></i></div>
                <div class="text">Pengalaman</div>
            </h2>
            <?php foreach ($experiences as $exp) : ?>
                <div class="edu">
                    <div class="wrap">
                        <div class="bagi lebar-40">
                            <h3><?= \Carbon\Carbon::parse($exp->start)->format('M, Y') ?> - <?= $exp->end ?></h3>
                        </div>
                        <div class="bagi lebar-60">
                            <h4><?= $exp->title ?></h4>
                            <p><?= $exp->company ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="skills section">
            <h2>
                <div class="icon"><i class="fas fa-cogs"></i></div>
                <div class="text">Keahlian</div>
            </h2>
            <?php
                $skillMeter = ["Pemula" => 33.333, "Menengah" => 66.666, "Mahir" => 100]
            ?>
            <?php foreach ($skills as $skill) : ?>
                <div class="skill">
                    <h3><?= $skill->title ?></h3>
                    <div class="bars">
                        <div class="value" style="width: <?= $skillMeter[$skill->level] ?>%"></div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="certificates section">
            <h2>
                <div class="icon"><i class="fas fa-certificate"></i></div>
                <div class="text">Sertifikasi dan Penghargaan</div>
            </h2>
            <?php foreach ($certificates as $cert) : ?>
                <div class="certificate">
                    <div class="bagi lebar-50">
                        <h3><?= $cert->title ?></h3>
                        <p><?= $cert->year ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>