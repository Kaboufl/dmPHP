<?php
    $post = $_POST;

    
    //var_dump($post);

    include(__DIR__ . '/mySQL.php');

    $titre = $mysqli->real_escape_string($post['titre']);
    $desc = $mysqli->real_escape_string($post['description']);
    $difficulty = intval($post['difficulty']);
    $category = $mysqli->real_escape_string($post['category']);
    $steps = $mysqli->real_escape_string($post['steps']);
    $ingredients = $mysqli->real_escape_string($post['ingredients']);
    $duration = intval($post['duration']) * 60;
    $imgURL = $mysqli->real_escape_string($post['imgURL']);

    $sql = "INSERT INTO `db-MamaMia`.recipe(name, description, difficulty, category, steps, ingredients, duration, imgURL)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ssisssis", $titre, $desc, $difficulty, $category, $steps, $ingredients, $duration, $imgURL);

        if ($stmt->execute())
        {
            echo 'recipe added';
        } else { echo 'erreur';}
    }

    $mysqli->close();


    //exit();
?>
    