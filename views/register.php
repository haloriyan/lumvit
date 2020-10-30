<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google-signin-client_id" content="<?= env('GOOGLE_CLIENT_ID_SANDBOX') ?>">
    <title>Register</title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/auth.css">
</head>
<body>

<div class="illustration">
    <img src="<?= base_url() ?>image/success.png">
</div>

<div class="container">
    <div class="wrap">
        <h1>Register</h1>
        <?php if(@$message != "") : ?>
            <?php $bg = $isError == "true" ? "bg-merah-transparan" : "bg-hijau-transparan"; ?>
            <div class="mt-4 <?= $bg ?> rounded p-2 mt-3">
                <?= $message ?>
            </div>
        <?php endif ?>
		<form action="<?= route('registerAction') ?>" class="mt-4" method="POST">
			<input type="hidden" id="login_uri" value="<?= route('loginAction') ?>" />
            <div class="mt-2">Name :</div>
            <input type="text" class="box" name="name" required>
            <div class="mt-2">Email :</div>
            <input type="email" class="box" name="email" required>
            <div class="mt-2">Password :</div>
            <input type="password" class="box" name="password" required>
            <div class="mt-2">
                <input type="checkbox" id="agreement" required> <label for="agreement">Saya setuju dengan aturan di <a href="<?= route('term') ?>" target="_blank">Terms &amp; Condition</a></label>
            </div>
            <button class="lebar-100 mt-3 biru">Register</button>
		</form>

		<div class="mt-4 rata-tengah">
			<div class="bagi lebar-100 g-signin2" data-onsuccess="onSignIn"></div>
		</div>

        <div class="mt-4 rata-tengah">
            sudah punya akun? <a href="<?= route('login') ?>">login</a> saja
        </div>
    </div>
    <div class="marginBottom"></div>
</div>

<script>
	function onSignIn(user) {
		let profile = user.getBasicProfile()
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
				window.loation = "<?= route('profile') ?>"
			}
		})
	}
</script>

</body>
</html>
