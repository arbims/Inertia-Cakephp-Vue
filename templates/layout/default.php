<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-100">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= $this->Html->meta('icon') ?>
    <?= $this->Vite->assets('js/main.js', \Cake\Core\Configure::read('IS_DEV')) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
        .bg-gray-100 {
        --tw-bg-opacity: 1;
        background-color: rgb(243 244 246 / var(--tw-bg-opacity));
        }
    </style>
</head>
<body>
    <?= $this->Inertia->make($page, 'app', ''); ?>
</body>
</html>
