<header style="background: #fff;color: #3498db;border-bottom: 1px solid #ddd;">
    <div id="tblMenu" onclick="toggleMenu()"><i class="fas fa-bars"></i></div>
    <h1><?= $title ?></h1>
    <a href="<?= route('export') ?>">
        <button><i class="fas fa-file-export"></i><span> &nbsp; Export CV</span></button>
    </a>
</header>