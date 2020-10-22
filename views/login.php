<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="<?= env('GOOGLE_CLIENT_ID_SANDBOX') ?>">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/auth.css">
    <link rel="shortcut icon" href="<?= base_url() ?>image/icon/icon.png">
</head>
<body>

<div class="illustration">
    <img src="<?= base_url() ?>image/success.png">
</div>

<div class="container">
    <div class="wrap">
        <h1>Login</h1>
        <?php if(@$message != "") : ?>
            <div class="mt-4 bg-merah-transparan rounded p-2 mt-3">
                <?= $message ?>
            </div>
        <?php endif ?>
        <form action="<?= route('loginAction') ?>" class="mt-4" method="POST">
            <input type="hidden" id="login_uri" value="<?= route('loginAction') ?>">
            <div class="mt-2">Email :</div>
            <input type="email" class="box" name="email" required value="<?= @$email ?>">
            <div class="mt-2">Password :</div>
            <input type="password" class="box" name="password" required>
            <button class="lebar-100 mt-3 biru">Login</button>

            <div class="rata-tengah mt-4">
                <div class="bagi lebar-100 g-signin2" data-onsuccess="onSignIn"></div>
            </div>
        </form>

        <div class="mt-4 rata-tengah">
            belum punya akun? <a href="<?= route('register') ?>">daftar</a> sekarang!
        </div>
    </div>
    <div class="marginBottom"></div>
</div>

<script src="<?= base_url() ?>js/base.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
    function onSignIn(googleUser) {
        let profile = googleUser.getBasicProfile()
        let name = profile.getName()
        let email = profile.getEmail()
        loginWithGoogle(name, email)
    }
    let loginWithGoogle = (name, email) => {
        let loginUri = select("#login_uri").value
        let req = post(loginUri, {
            name: name,
            email: email,
            isUsingGoogle: 1
        })
        .then(res => {
            if (res.status == 200) {
                window.location = "<?= route('profile') ?>"
            }
        })
    }
</script>

</body>
</html>