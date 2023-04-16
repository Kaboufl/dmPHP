<?php

include(__DIR__ . '/mySQL.php');

$recettes = $mysqli->query("SELECT * FROM recipe LIMIT 50");

$res = $mysqli->query("SHOW COLUMNS FROM recipe");

while ($row = $res->fetch_assoc())
{
    $columns[] = $row['Field'];
}



// var_dump($recettes);

$mysqli->close();

?>
<section>
    <div class="discover-banner">
        <div>
            <h1>Découvrez notre sélection de recettes !</h1>
        
            <a href="/discover">Bouton</a>
        </div>
    </div>

    <div class="discover-body">
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Durée</th>
                    <th>Difficulté</th>
                </tr>
            </thead>

<?php


    var_dump($columns);

    foreach($recettes as $recette)
    {
        $id = $recette['id'];
        $nom = $recette['name'];
        $desc = $recette['description'];
        $duration = intval($recette['duration']) / 60 . ' min';
        $difficulty = intval($recette['category_id']);



        echo '
            <tr class="table-separator"></tr>
            <tr onclick="window.location=\'/recipes/',$id,'\';">
                <td>',$nom,'</td>
                <td>',$desc,'</td>
                <td>',$duration,'</td>
                <td>',$difficulty,'</td>
            </tr>
        ';
    }

?>

        </table>
    </div>
</section>
