<?php

include(__DIR__ . '/mySQL.php');


if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['comment_body'] != '' && $_POST['comment_body'] != null) {
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
    {
        $id_user = $_SESSION['id'];
        $recipe_id = $_POST['recipe_id'];
        $content = $_POST['comment_body'];
        $safe_content = $mysqli->real_escape_string($content);
        
        $sql = "INSERT INTO `db-MamaMia`.comments(id_user, recipe_id, content)
                            VALUES (?, ?, ?);";
        
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("iis", $id_user, $recipe_id, $safe_content);

            if($stmt->execute())
            {
                // echo 'recipe added';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                $mysqli->close();
            } else { echo 'erreur';}
        }

    }
}