<!DOCTYPE html>
<html lang="FR/FR">
<head>
    <?php include(__DIR__ . '/views/components/head.php') ?>
</head>
<body>
    <header>
        <?php include(__DIR__ . '/views/components/header.php') ?>
    </header>
    <?php include($childView); ?>
    <?php include(__DIR__ . '/views/components/footer.php') ?>
</body>
</html>