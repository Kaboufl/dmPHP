<?php
    $post = $_POST;

    
    //var_dump($post);

    include(__DIR__ . '/mySQL.php');

    $titre = $mysqli->real_escape_string($post['titre']);
    $desc = $mysqli->real_escape_string($post['description']);
    $category_id = 4;
    $steps = $mysqli->real_escape_string($post['steps']);
    $ingredients = $mysqli->real_escape_string($post['ingredients']);
    $duration = $mysqli->real_escape_string(120);
    $imgURL = $mysqli->real_escape_string('');

    $mysqli->query("INSERT INTO `db-MamaMia`.recipe(name, description, category_id, steps, ingredients, duration, imgURL)
                                VALUES ('".$titre."', '".$desc."', '".$category_id."', '".$steps."', '".$ingredients."', '".$duration."', '".$imgURL."');");

    $mysqli->close();

    //exit();
?>
    