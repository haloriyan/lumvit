<nav class="menu">
    <a href="<?= route('experience') ?>">
        <li class="<?= route() == '/experience' ? 'active' : '' ?>">
            <div class="icon"><i class="fas fa-briefcase"></i></div>
            <div class="text">Pengalaman</div>
        </li>
    </a>
    <a href="<?= route('skill') ?>">
        <li class="<?= route() == '/skill' ? 'active' : '' ?>">
            <div class="icon"><i class="fas fa-cogs"></i></div>
            <div class="text">Keahlian</div>
        </li>
    </a>
    <a href="<?= route('education') ?>">
        <li class="<?= route() == '/education' ? 'active' : '' ?>">
            <div class="icon"><i class="fas fa-graduation-cap"></i></div>
            <div class="text">Pendidikan</div>
        </li>
    </a>
    <a href="<?= route('certificate') ?>">
        <li class="<?= route() == '/certificate' ? 'active' : '' ?>">
            <div class="icon"><i class="fas fa-certificate"></i></div>
            <div class="text">Sertifikasi</div>
        </li>
    </a>
    <a href="<?= route('contact') ?>">
        <li class="<?= route() == '/contact' ? 'active' : '' ?>">
            <div class="icon"><i class="fas fa-phone-alt"></i></div>
            <div class="text">Kontak</div>
        </li>
    </a>
    <a href="<?= route('profile') ?>">
        <li class="<?= route() == '/profile' ? 'active' : '' ?>">
            <div class="icon"><i class="fas fa-user"></i></div>
            <div class="text">Profil</div>
        </li>
    </a>
</nav>