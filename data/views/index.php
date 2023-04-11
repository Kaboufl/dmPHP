<section>
    <div class="hero-banner">
        <div>
            <h1>Les meilleures recettes d'Internet</h1>
            <p>À portée de clic !</p>
            <a href="/">Découvrir</a>
        </div>
    </div>
    <div class="recipeSampleWrapper">
        <!-- Tranche de code pour récupérer les 3 premières entrées de la table "recipe"
        <?php
            include(__DIR__ . '/mySQL.php');
            
            $samples = $mysqli->query("SELECT * FROM recipe LIMIT 3");

            foreach ($samples as $sample) {
                var_dump($sample['category_id']);
                echo '<br>';
            }
        ?> -->
        <div class="cardSample">
            <h1>Tourte aux prunaux</h1>
            <p>Une tourte aux pruneaux ?? ça existe vraiment ??</p>
        </div>
        <div class="cardSample">
            <div>
                <img src="" alt="">
            </div>
            <div>
                <h1>Tourte aux prunaux</h1>
                <p>Une tourte aux pruneaux ?? ça existe vraiment ??</p>
            </div>
        </div>
        <div class="cardSample">
            <h1>Tourte aux prunaux</h1>
            <p>Une tourte aux pruneaux ?? ça existe vraiment ??</p>
        </div>
    </div>
</section>