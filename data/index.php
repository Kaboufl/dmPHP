<?php
//phpinfo();

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        $title = 'MamaMia';
        $childView = __DIR__ . '/views/index.php';
        include(__DIR__ . '/layout.php');
        break;
    case '' :
        $title = 'MamaMia';
        $childView = __DIR__ . '/views/index.php';
        include(__DIR__ . '/layout.php');
        break;
    // case '/' :
    //     require __DIR__ . '/views/index.php';
    //     break;
    // case '' :
    //     require __DIR__ . '/views/mySQL.php';
    //     break;
    case '/about' :
        require __DIR__ . '/views/about.php';
        break;
    case '/checkSQL' :
        require __DIR__ . '/views/mySQL.php';
        break;
    case '/setSQL' :
        require __DIR__ . '/views/SETmySQL.php';
        break;
    case '/insertSQL' :
        require __DIR__ . '/views/insertRecipe.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}