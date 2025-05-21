<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['global']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <!--CDN de Instalação de Estilos do Bootstrap -->
    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', ['block' => true]) ?>

</head>
<body>
    <?= $this->element('layout/header/index') ?>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <!--CDN de Instalação de Scripts e Estilos do Bootstrap -->
    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'); ?>
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', ['block' => true]) ?>
    <!--CDN de Instalação de Scripts JQUery -->
    <?= $this->Html->script("https://code.jquery.com/jquery-3.7.1.min.js") ?>)
    <?= $this->fetch('script') ?>

    <!--Arquivos Globais de Funções  -->
    <?= $this->Html->script('utils/regexValidation') ?>

</body>
</html>
