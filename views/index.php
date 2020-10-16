<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?= env('APP_DESCRIPTION') ?>">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta name="apple-mobile-web-app-title" content="BikinCV App">
	<title><?= env('APP_NAME') ?></title>
	<link rel="apple-touch-icon" href="<?= base_url() ?>image/icon/icon.png">
	<link rel="shortcut icon" href="<?= base_url() ?>image/icon/icon.png">
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>css/index.css">
	<link rel="manifest" href="<?= base_url() ?>manifest.json">
	<style>
		body {
			-webkit-tap-highlight-color: transparent;
			-webkit-touch-callout: none;
		}
	</style>
</head>
</head>
<body>
    
<?php insert('./partials/HeaderPublic') ?>

<div class="illustration" bg-image="<?= base_url() ?>image/mbamba.png"></div>

<div class="container">
    <div class="bagi bagi-2">
        <h2><?= env('APP_DESCRIPTION') ?></h2>
        <a href="<?= route('register') ?>"><button class="biru mt-3">Mulai Bikin CV</button></a>
    </div>
</div>

<div class="bottom">
    <section>
        <div class="wrap rata-tengah">
            <h3>Apa ini?</h3>
            <div class="d-inline-block rata-kiri lebar-70">
                <p>
                    <?= env('APP_NAME') ?> adalah aplikasi yang membantu kamu untuk membuat CV secara otomatis, hanya butuh waktu sebentar. Asiknya, tersedia banyak template keren yang dapat kamu pilih sesuai pekerjaan yang kamu lamar.
                </p>
            </div>
        </div>
    </section>
    <section>
        <div class="wrap">
            <div class="bagi bagi-2">
                <div class="tinggi-300 lebar-100" bg-image="<?= base_url() ?>image/work.png"></div>
            </div>
            <div class="bagi bagi-2">
                <h3>Dapatkan pekerjaan yang kamu impikan selama ini</h3>
                <p>Pekerjaan impian berawal dari interview yang memukau. Agar diundang interview, kamu perlu CV yang memukau. Pekerjaan impianmu dimulai dari sini</p>
            </div>
        </div>
    </section>
    <section>
        <div class="wrap">
            <div class="bagi bagi-2 pt-3">
                <h3>Ini sangat Mudah!</h3>
                <p>Kamu hanya mengisi form-form untuk informasi yang dibutuhkan, kemudian pilih template yang sesuai! CV kamu sudah jadi dan kamu siap untuk melamar pekerjaan</p>
            </div>
            <div class="bagi bagi-2">
                <div class="tinggi-300 lebar-100" bg-image="<?= base_url() ?>image/form.png"></div>
            </div>
        </div>
    </section>
    <section>
        <div class="wrap">
            <div class="bagi bagi-2">
                <div class="tinggi-300 lebar-100" bg-image="<?= base_url() ?>image/template.png"></div>
            </div>
            <div class="bagi bagi-2 pt-4">
                <h3>Ada banyak template!</h3>
                <p>Tersedia puluhan template siap pakai yang sesuai dengan pekerjaan yang kamu lamar. SEMUANYA GERATIS!</p>
            </div>
        </div>
    </section>
    <section class="rata-tengah">
        <div class="wrap">
            <h3>Buat CV-mu dan mulai lamar pekerjaan impianmu!</h3>
            <a href="<?= route('register') ?>">
                <button class="biru mt-1">Daftar Sekarang</button>
            </a>
        </div>
    </section>
</div>

<script src="<?= base_url() ?>js/base.js"></script>
<script>
	console.log("<?= base_url() ?>serviceWorker.js")
	if ('serviceWorker' in navigator) {
		navigator.serviceWorker.register('<?= base_url() ?>serviceWorker.js')
		.then(reg => {
			console.log(reg)
			console.log('service worker aktif')
		})
		.catch(err => {
			console.error(err)
		})
	}
</script>
    
</body>
</html>
