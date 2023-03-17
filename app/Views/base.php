<html>
    <head>
        <title><?= isset($title) ? $title : "Hello World!" ?></title>
    </head>
    <body>
        <?= $this->renderSection('content') ?>
    </body>
</html>