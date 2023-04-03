<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(__DIR__ . '/views/components/head.php') ?>
</head>
<body>
    <header>
        <?php include(__DIR__ . '/views/components/header.php') ?>
    </header>
    <?php include($childView); ?>
</body>
</html>