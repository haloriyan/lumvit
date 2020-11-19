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
    <script src="<?= base_url() ?>js/html2canvas.min.js"></script>
    <style>
        #loading {
            position: fixed;
            top: 0px;left: 0px;right: 0px;bottom: 0px;
            background: #fff;
            color: #444;
            z-index: 2500;
        }
    </style>
</head>
<body>
    
<div class="area" id="toPrint">
    <?php insert('theme/'.$theme) ?>
</div>
<div class="area" id="loading">Mengunduh...</div>

<script src="<?= base_url() ?>js/base.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<script>
    function run() {
        let doc = new jsPDF('potrait', 'px', 'a4')
        let elem = select("#toPrint")
        let page = () => {
            doc.save("CV <?= $myData->name ?>.pdf")
        }

        doc.addHTML(elem, page)
        setTimeout(() => {
            window.location = "<?= route('export') ?>?message=" + btoa('CV berhasil diekspor') + "&isRedirected=1"
        }, 1000);
    }
    function runs() {
        html2canvas(select("#toPrint")).then(cvs => {
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
    };

    setTimeout(() => {
        run()
    }, 1500);
</script>

</body>
</html>