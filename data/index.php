<?php
//phpinfo();

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    // case '/URL' :
    //     require __DIR__ . '/path/vers/html';
    //     break;
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

    case '/discover' :
        $title = 'MamaMia | Nos recettes';
        $childView = __DIR__ . '/views/discover.php';
        include(__DIR__ .'/layout.php');
        break;
        
    case str_starts_with($request, '/recipe'):
        $title = 'Recette';
        $childView = __DIR__ . '/views/recipePage.php';

        include(__DIR__ . '/layout.php');
        break;

    case '/addRecipe':
        $title = 'Ajouter sa recette';
        $childView = __DIR__ . '/views/addRecipe.php';

        include(__DIR__ . '/layout.php');
        break;

    case '/post-recipe':
        header("Location: http://".$_SERVER['HTTP_HOST']."/discover");
        include(__DIR__ . '/views/postRecipe.php');
        die();
        
        break;

    case '/about' :
        require __DIR__ . '/views/about.php';
        break;
    case '/checkSQL' :
        require __DIR__ . '/views/mySQL.php';
        break;
    case '/insertSQL' :
        require __DIR__ . '/views/insertRecipe.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}