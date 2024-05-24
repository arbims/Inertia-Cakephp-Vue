<!DOCTYPE html>
<html lang="fr>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= $this->Html->meta('icon') ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php //= $this->AssetMix->script('app'); ?>

    <?= $this->Vite->assets('js/main.js', \Cake\Core\Configure::read('IS_DEV')) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Inertia->make($page, 'app', ''); ?>
</body>
</html>
