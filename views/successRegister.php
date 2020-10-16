<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Berhasil</title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/auth.css">
    <style>
        p { line-height: 40px; }
    </style>
</head>
<body>

<div class="illustration">
    <img src="<?= base_url() ?>image/success.png">
</div>

<div class="container">
    <div class="wrap pt-4">
        <h1>Registrasi Berhasil</h1>
        
        <p class="mt-3">
            Terima kasih telah mendaftar di Aplikasi Lumvit. Sebelum dapat membuat <i>Curriculum Vitae</i>, Anda harus mengaktifkan akun dengan mengklik tautan yang terkirim pada email Anda. Coba cek folder spam apabila Anda tidak menemukannya.
        </p>

    </div>
</div>


<script src="<?= base_url() ?>js/base.js"></script>
<script src="<?= base_url() ?>js/html2canvas.min.js"></script>
<script>
    html2canvas(select("body")).then(cvs => {
        // document.body.innerHTML = ""
        // let lnk = document.createElement('a')
        // lnk.href = cvs.toDataURL()
        // lnk.download = "tes.png"
        // lnk.click()
        // document.body.appendChild(cvs)
    })
</script>

</body>
</html>