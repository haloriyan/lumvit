<div class="smallPadding">
    <div class="wrap special">
        <div class="bagi lebar-50">
            <h2 class="name"><?= $myData->name ?></h2>
            <h3 class="role"><?= $myData->role ?></h3>
            <?php foreach ($contacts as $contact) : ?>
                <div class="contact">
                    <div class="icon"><i class="<?= $contact->icon ?>"></i></div>
                    <div class="text"><?= $contact->value ?></div>
                </div>
            <?php endforeach ?>
            <div class="contact address">
                <div class="icon"><i class="fas fa-map-marker"></i></div>
                <div class="text"><?= $myData->address ?></div>
            </div>
        </div>
        <div class="bagi lebar-50 rata-kanan">
            <div class="iconName">
                <?php
                $name = explode(" ", $myData->name);
                echo $name[0][0].$name[1][0];
                ?>
            </div>
        </div>
        <br />
        <div class="bagi bagi-3 section bio">
            <div class="wrap">
                <h3>Profile</h3>
                <p><?= $myData->short_bio ?></p>
                <h3>Keahlian</h3>
                <?php foreach ($skills as $skill) : ?>
                    <div class="skill">
                        <?= $skill->title ?>
                        <div class="ke-kanan"><?= $skill->level ?></div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="bagi bagi-3 section bio">
            <div class="wrap">
                <h3>Pengalaman</h3>
                <?php foreach ($experiences as $exp) : ?>
                    <div class="exp">
                        <h4><?= $exp->title ?></h4>
                        <p>
                            <?= $exp->company ?>
                            <br />
                            <?= \Carbon\Carbon::parse($exp->start)->format('M, Y') ?> - <?= $exp->end ?>
                        </p>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="bagi bagi-3 section bio">
            <div class="wrap">
                <h3>Pendidikan</h3>
                <?php foreach ($educations as $edu) : ?>
                    <div class="exp">
                        <h4><?= $edu->name ?></h4>
                        <p>
                            <?= $edu->majority ?>
                            <br />
                            <?= \Carbon\Carbon::parse($edu->start)->format('M, Y') ?> - <?= $edu->graduate ?>
                        </p>
                    </div>
                <?php endforeach ?>

                <h3>Sertifikasi</h3>
                <?php foreach ($certificates as $cert) : ?>
                    <div class="exp">
                        <h4><?= $cert->title ?></h4>
                        <p><?= \Carbon\Carbon::parse($cert->year)->format('M, Y') ?></p>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>