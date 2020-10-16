<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - <?= env('APP_NAME') ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/app.css">
    <link rel="shortcut icon" href="<?= base_url() ?>image/icon/icon.png">
    <style>
        .box[readonly] { background: #fff; }
        .list p { font-size: 15px; }
        .list h3 { margin-bottom: 0px; }
        .list .year {
            margin-top: 28px;
        }
        .box.iconPreview {
            line-height: 50px;
            display: none;
        }
        .box.iconPreview .fa-times { margin-top: 15px; }
        #iconResult {
            position: absolute;
            left: 0px;right: 0px;
            background-color: #fff;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
            border: 1px solid #ddd;
            margin-top: -4px;
            z-index: 5;
            width: 255px;
            display: none;
        }
        #iconResult div {
            line-height: 55px;
            padding: 0px 20px;
        }
    </style>
</head>
<body>

<?php insert('partials/header', ['title' => "Kontak"]); ?>

<?php insert('partials/menu'); ?>

<div class="container">
    <div class="bagi bagi-2">
        <div class="wrap">
            <?php if (@$message != "") : ?>
                <div class="bg-hijau-transparan rounded p-2 mb-2">
                    <?= @$message ?>
                </div>
            <?php endif ?>
            <?php if (count($contacts) == 0) : ?>
                <h3>Tidak ada kontak ditambahkan</h3>
            <?php else : ?>
                <?php foreach ($contacts as $cont) : ?>
                    <div class="list bayangan-5 mb-3 rounded smallPadding">
                        <div class="wrap">
                            <h3><i class="<?= $cont->icon ?>"></i> &nbsp; <?= $cont->value ?>
                                <a href="<?= route('contact/'.$cont->id.'/delete') ?>" class="teks-merah"><i class="fas fa-trash ke-kanan"></i></a>
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
                    <h3>Tambahkan Kontak</h3>
                    <form action="<?= route('contact/store') ?>" class="mt-3 mb-4" method="POST">
                        <input type="hidden" name="user_id" value="<?= $myData->id ?>">
                        <div class="bagi lebar-30" style="position: relative;">
                            <div>Icon :</div>
                            <div class="box iconPreview">
                                <span><i class="fab fa-facebook"></i></span>
                                <i class="fas fa-times ke-kanan teks-merah pointer" onclick="removeIcon()"></i>
                            </div>
                            <input type="text" autocomplete="off" class="box" id="searchIconInput" name="icon" oninput="searchIcon(this.value)">
                            <div id="iconResult"></div>
                        </div>
                        <div class="bagi lebar-70">
                            <div>Value :</div>
                            <input type="text" class="box" name="value">
                        </div>
                        <p>
                            *value : isikan nomor telefon, alamat email, atau username profil, sesuai icon yang dipilih
                        </p>

                        <button class="lebar-100 biru mt-2">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="marginBottom"></div>
</div>

<script src="<?= base_url() ?>js/base.js"></script>
<script>
    let fontAwesomeKey = []
    let fontAwesomeIcon = []

    let uri = "<?= base_url() ?>fa/metadata/icons.json"
    let req = fetch(uri)
    .then(res => res.json())
    .then(res => {
        fontAwesomeIcon = res
        for (let obj in res) {
            fontAwesomeKey.push(obj)
        }
    })

    const searchIcon = q => {
        if (q.length < 3) {
            select("#iconResult").style.display = "none"
            return false
        }
        select("#iconResult").style.display = "block"
        select("#iconResult").innerHTML = ""

        let searchResults = fontAwesomeKey.filter(item => item.toLowerCase().indexOf(q) > -1)
        searchResults.forEach(res => {
            let icon = fontAwesomeIcon[res]
            let prefix = "fas fa"
            if (icon.styles[0] == "brands") {
                // return false
                prefix = "fab fa"
            }
            createElement({
                el: 'div',
                attributes: [
                    ['key', `${prefix}-${res}`],
                    ['onclick', 'chooseIcon(this)'],
                    ['class', 'pointer']
                ],
                html: `<i class="${prefix}-${res}"></i> &nbsp; ${res}`,
                createTo: "#iconResult"
            })
        })
    }
    const chooseIcon = dom => {
        let icon = dom.getAttribute('key')
        select("#iconResult").style.display = "none"
        select("#searchIconInput").style.display = "none"
        select("#searchIconInput").value = icon
        select(".box.iconPreview span").innerHTML = `<i class="${icon}"></i>`
        select(".box.iconPreview").style.display = "block"
    }
    const removeIcon = () => {
        select(".box.iconPreview").style.display = "none"
        select("#searchIconInput").style.display = "block"
        select("#searchIconInput").value = ""
    }
</script>
    
</body>
</html>