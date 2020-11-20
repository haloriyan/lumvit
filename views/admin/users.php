<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - <?= env('APP_NAME') ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>fa/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/app.css">
    <link rel="shortcut icon" href="<?= base_url() ?>image/icon/icon.png">
</head>
<body>

<?php insert('../partials/admin/Header', ['title' => "Users"]); ?>

<?php insert('../partials/admin/Menu'); ?>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Exported Count</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users->get() as $user) : ?>
                <tr>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->has_exported_file ?></td>
                    <td>
                        <a href="<?= route('admin/user/'.$user->id.'/detail') ?>" class="teks-biru">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?= $users->links() ?>
    <div class="marginBottom"></div>
</div>
    
</body>
</html>