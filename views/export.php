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
    <?php insert('theme/'.$theme) ?>
</div>

<script src="<?= base_url() ?>js/base.js"></script>
<script src="<?= base_url() ?>js/html2canvas.min.js"></script>
<script>
    setTimeout(() => {
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
    }, 1500);
    // html2canvas(select(".area"), {
    //     onrendered: cvs => {
    //         let lnk = document.createElement('a')
    //         lnk.href = cvs.toDataURL()
    //         lnk.download = "tes.png"
    //         lnk.click()
    //         document.body.appendChild(cvs)
    //         setTimeout(() => {
    //             window.location = "<?= route('export') ?>?message=" + btoa('CV berhasil diekspor') + "&isRedirected=1"
    //         }, 1980);
    //     }
    // })
</script>

</body>
</html>