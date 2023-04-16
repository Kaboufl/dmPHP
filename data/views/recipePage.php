<?php
    $id = substr($request, 9, strlen($request));
    
    include(__DIR__ . '/mySQL.php');

    $recette = $mysqli->query("SELECT * FROM recipe WHERE id=".$id)->fetch_assoc();
    $mysqli->close();
    // var_dump($recette);

?>



<section>
    <div class="recipe-body">
        <div class="recipe-header">
            <div>
                <img src="<?php echo $recette['imgURL'] ?>" alt="" height="100%">
            </div>
            <div>
                <h1><?php echo $recette['name'] ?></h1>
                <h3><?php echo $recette['description'] ?></h3>
            </div>
            <div>
                <span>Temps de préparation :</span>
                <span><b><?php echo $recette['duration'] / 60; ?></b> min</span>
            </div>
        </div>

        <div class="recipe-main">
            <div>
                <h4>Ingrédients :</h4>
                <ul>
                    <?php 

                        $ingredients = explode("|", $recette['ingredients']);

                        foreach($ingredients as $ingredient)
                        {
                            echo '<li>',$ingredient,'</li>';
                        }
                    ?>
                    </ul>
            </div>

            <div>
                <h3>Procédure :</h3>
                <ul>
                    <?php 

                        $etapes = explode("|", $recette['steps']);

                        foreach($etapes as $etape)
                        {
                            echo '<li>',$etape,'</li>';
                        }
                    ?>
                </ul>


            </div>
        </div>

    </div>
</section>



