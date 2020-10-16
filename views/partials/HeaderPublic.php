<header>
    <div onclick="toggleMenu()" id="tblMenu"><i class="fas fa-bars"></i></div>
    <a href="<?= route('/') ?>"><h1><?= env('APP_NAME') ?></h1></a>
    <nav>
        <li><a href="<?= route('tentang') ?>">Tentang</a></li>
        <li><a href="<?= route('term') ?>">Syarat dan Ketentuan</a></li>
        <li><a href="<?= route('bantuan') ?>">Butuh bantuan?</a></li>
    </nav>
</header>

<script>
    let isMenuActive = false

    const toggleMenu = () => {
        let menu = select("header nav")
        if(isMenuActive) {
            menu.style.right = "-100%"
        }else {
            menu.style.right = "0%"
        }
        isMenuActive = !isMenuActive
    }
</script>