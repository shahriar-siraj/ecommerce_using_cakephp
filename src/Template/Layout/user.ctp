<?= $this->Html->docType('html5') ?>
<html lang="en">
    <head>
        <?= $this->Html->charset() ?>
        <?= $this->Html->meta(
            'viewport',
            'width=device-width, initial-scale=1.0, maximum-scale=1.0'
        ) ?>
        <title>
            <?= $this->fetch('title') . ' - ' . \Cake\Core\Configure::read('Site.name') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->fetch('meta') ?>

        <!-- Styles -->
        <?= $this->Html->css([
            'bootstrap.min',
            'login'
        ]) ?>

        <?= $this->fetch('css') ?>
        <?= $this->fetch('scriptTop') ?>

    </head>
    <body>
        <?= $this->fetch('content') ?>

        <?= $this->Html->script([
		  'script.js'
        ]); ?>

        <?= $this->fetch('scriptBottom') ?>
    </body>
</html>
