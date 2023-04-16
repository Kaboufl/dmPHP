<section>
    <div class="hero-banner">
        <div>
            <h1>Les meilleures recettes d'Internet</h1>
            <p>À portée de clic !</p>
            <a href="/discover">Découvrir</a>
            <a href="/addRecipe">Ajoutez la vôtre !</a>
        </div>
    </div>
    <div class="recipeSampleWrapper">
        
        <?php
            include(__DIR__ . '/mySQL.php');
            
            $samples = $mysqli->query("SELECT * FROM recipe LIMIT 3");

            foreach ($samples as $sample) {
                $name = $sample['name'];
                $description = $sample['description'];
                $imgURL = $sample['imgURL'];
                // var_dump($sample);
                echo '<div class="cardSample">
                        <div>
                            <img src="',$imgURL,'" alt="" width="100%">
                        </div>
                        <div>
                            <h1>', $name, '</h1>
                            <p>', $description, '</p>
                        </div>
                    </div>';

            }

            $mysqli->close();
        ?>

        

    </div>
</section>