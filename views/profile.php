<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - <?= env('APP_NAME') ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/app.css">
    <link rel="shortcut icon" href="<?= base_url() ?>image/icon/icon.png">
    <style>
        .picture {
            width: 200px;
            height: 200px;
            border-radius: 800px;
            display: inline-block;
        }
        input#photo {
            width: 200px;
            height: 200px;
            border-radius: 900px;
            display: block;
            margin: 0px auto;
            margin-top: -205px;
            opacity: 0.01;
        }
    </style>
</head>
<body>

<?php insert('partials/header', ['title' => "Profil"]); ?>

<?php insert('partials/menu'); ?>

<div class="container rata-tengah">
    <form action="<?= route('profile/'.$myData->id.'/update') ?>" method="POST" class="d-inline-block lebar-80 rata-kiri">
        <?php if (@$message != "") : ?>
            <div class="bg-hijau-transparan mb-2 rounded p-2">
                <?= @$message ?>
            </div>
        <?php endif ?>
        <div class="rata-tengah mb-3">
            <div class="picture" bg-image="<?= base_url() ?>storage/photo/<?= $myData->photo ?>"></div>
            <br />
            <input type="file" name="photo" id="photo" class="box pointer" onchange="uploadPhoto(this)">
            <div class="mt-2" id="uploadingStatus">Klik foto untuk mengubah</div>
        </div>
        <input type="hidden" id="user_id" value="<?= $myData->id ?>">
        <div class="mt-2">Nama :</div>
        <input type="text" class="box" name="name" value="<?= $myData->name ?>">
        <div class="mt-2">Role title :</div>
        <input type="text" class="box" name="job_role" value="<?= $myData->role ?>">
        <div class="mt-2">Bio singkat :</div>
        <textarea name="short_bio" class="box"><?= $myData->short_bio ?></textarea>
        <div class="mt-2">Alamat :</div>
        <textarea name="address" class="box"><?= $myData->address ?></textarea>

        <button class="mt-2 lebar-100 biru">Ubah</button>
    </form>
    <div class="marginBottom"></div>
</div>

<!-- <button class="actionButton"><i class="fas fa-plus"></i></button> -->
    
<script src="<?= base_url() ?>js/base.js"></script>
<script>
    const uploadPhoto = that => {
        select("#uploadingStatus").innerHTML = "<i class='fas fa-spinner'></i> mengunggah..."
        let file = that.files[0]
        let userID = select("#user_id").value
        
        let formData = new FormData()
        formData.append('photo', file)
        formData.append('user_id', userID)

        let req = fetch("<?= route('profile/photo') ?>", {
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(res => {
            if (res.status == 200) {
                select(".picture").setAttribute('bg-image', `<?= base_url() ?>storage/photo/${res.fileName}`)
                bindDivWithImage()
                select("#uploadingStatus").innerHTML = "<i class='fas fa-check'></i> foto berhasil diunggah!"
                select("#uploadingStatus").classList.add('bg-hijau-transparan', 'rounded', 'p-2')
                setTimeout(() => {
                    select("#uploadingStatus").innerHTML = "Klik foto untuk mengubah"
                    select("#uploadingStatus").classList.remove('bg-hijau-transparan', 'rounded', 'p-2')
                }, 1600);
            }
        })
    }
</script>

</body>
</html>