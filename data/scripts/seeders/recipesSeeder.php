<?php

$recipes = [
    ["Crème anglaise", "Préparez une délicieuse crème anglaise !", "4", "Dessert", "1- Faites bouillir 1/2 litre de lait avec un soupçon de sel, le sucre vanillé ou le zeste de citron. | 2- Mettez les jaunes d'oeufs dans une terrine avec le sucre. Travaillez le tout avec une cuillère en bois jusqu'à ce que le mélange blanchisse un peu. Incorporez-y , peu à peu, hors du feu, le lait bouillant. | 3- Reversez dans la casserole. Reportez celle-ci sur feu doux, sans cesser de remuer avec la cuillère en bois et en grattant bien le fond, jusqu'à ce que la crème prenne un peu de consistance et enrobe la cuillère. Retirez du feu avant ébulition, sinon la crème tounerait. Servez cette crème très froide.", "1/2 Litre de lait | 4/5 oeufs | 100g de sucre en poudre | 1 pincée de sel | 1 sachet de sucre vanillé ou zeste de citron", "1200", "https://assets.afcdn.com/recipe/20150909/46716_w1024h768c1cx1971cy1759.webp"],
    ["Crème anglaise", "Préparez une délicieuse crème anglaise !", "4", "Dessert", "1- Faites bouillir 1/2 litre de lait avec un soupçon de sel, le sucre vanillé ou le zeste de citron. | 2- Mettez les jaunes d'oeufs dans une terrine avec le sucre. Travaillez le tout avec une cuillère en bois jusqu'à ce que le mélange blanchisse un peu. Incorporez-y , peu à peu, hors du feu, le lait bouillant. | 3- Reversez dans la casserole. Reportez celle-ci sur feu doux, sans cesser de remuer avec la cuillère en bois et en grattant bien le fond, jusqu'à ce que la crème prenne un peu de consistance et enrobe la cuillère. Retirez du feu avant ébulition, sinon la crème tounerait. Servez cette crème très froide.", "1/2 Litre de lait | 4/5 oeufs | 100g de sucre en poudre | 1 pincée de sel | 1 sachet de sucre vanillé ou zeste de citron", "1200", "https://assets.afcdn.com/recipe/20150909/46716_w1024h768c1cx1971cy1759.webp"],
    
];




function writeRecipes($recipes) {

    $mysqli = new mysqli('mysql8', 'myuser', 'monpassword', 'db-MamaMia');

    $mysqli->query("TRUNCATE TABLE `db-MamaMia`.recipe");

    foreach($recipes as $recipe) {
        
        $id_user = 0;
        $name = $mysqli->real_escape_string($recipe[0]);
        $description = $mysqli->real_escape_string($recipe[1]);
        $difficulty = $mysqli->real_escape_string(intval($recipe[2]));
        $category = $mysqli->real_escape_string($recipe[3]);
        $steps = $mysqli->real_escape_string($recipe[4]);
        $ingredients = $mysqli->real_escape_string($recipe[5]);
        $duration = $mysqli->real_escape_string(intval($recipe[6]));
        $imgURL = $mysqli->real_escape_string($recipe[7]);
        
        
        // $mysqli->real_escape_string();

        $mysqli->query("INSERT INTO `db-MamaMia`.`recipe` (`id_user`, `name`, `description`, `difficulty`, `category`, `steps`, `ingredients`, `duration`, `imgURL`) 
                        VALUES ('".$id_user."', '".$name."', '".$description."', '".$difficulty."', '".$category."', '".$steps."', '".$ingredients."', '".$duration."', '".$imgURL."');");
    }

    $mysqli->close();
    return 'ok';
    }





echo writeRecipes($recipes);
