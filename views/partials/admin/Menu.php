<nav class="menu">
    <a href="<?= route('admin/dashboard') ?>">
        <li class="<?= route() == 'admin/dashboard' ? 'active' : '' ?>">
            <div class="icon"><i class="fas fa-home"></i></div>
            <div class="text">Dashboard</div>
        </li>
    </a>
    <a href="<?= route('admin/users') ?>">
        <li class="<?= route() == 'admin/users' ? 'active' : '' ?>">
            <div class="icon"><i class="fas fa-users"></i></div>
            <div class="text">Users</div>
        </li>
    </a>
</nav>