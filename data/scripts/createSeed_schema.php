<?php

$host = 'mysql8'; //Nom donné dans le docker-compose.yml
$user = 'myuser';
$password = 'monpassword';
$db = 'db-MamaMia';

$mysqli = new mysqli($host, $user, $password, $db);

$mysqli->query("DROP TABLE `db-MamaMia`.`users`");


$table = $mysqli->query("CREATE TABLE `db-MamaMia`.`users` (
                                                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                                    `username` VARCHAR(50),
                                                    `email` VARCHAR(50),
                                                    `password` VARCHAR(255),
                                                    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
                                                    );");

$mysqli->query("DROP TABLE `db-MamaMia`.recipe");


$table = $mysqli->query("CREATE TABLE `db-MamaMia`.`recipe` (
                                                `id` INT NOT NULL AUTO_INCREMENT,
                                                `id_user` INT NULL,
                                                `name` VARCHAR(45) NULL,
                                                `description` VARCHAR(255) NULL,
                                                `difficulty` INT NULL,
                                                `category` VARCHAR(50) NULL,
                                                `steps` TEXT NULL,
                                                `ingredients` TEXT NULL,
                                                `duration` INT NULL,
                                                `imgURL` VARCHAR(255) NULL,
                                                PRIMARY KEY (`id`),
                                                UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE);"
        );

$mysqli->query("DROP TABLE `db-MamaMia`.comments");



$table = $mysqli->query("CREATE TABLE `db-MamaMia`.`comments` (
                                                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                                    `id_user` INT NOT NULL,
                                                    `recipe_id` INT NOT NULL,
                                                    `content` TEXT,
                                                    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
                                                    );");

$recipes = [
    ["Crème anglaise", "Préparez une délicieuse crème anglaise !", "4", "Dessert", "1- Faites bouillir 1/2 litre de lait avec un soupçon de sel, le sucre vanillé ou le zeste de citron. | 2- Mettez les jaunes d'oeufs dans une terrine avec le sucre. Travaillez le tout avec une cuillère en bois jusqu'à ce que le mélange blanchisse un peu. Incorporez-y , peu à peu, hors du feu, le lait bouillant. | 3- Reversez dans la casserole. Reportez celle-ci sur feu doux, sans cesser de remuer avec la cuillère en bois et en grattant bien le fond, jusqu'à ce que la crème prenne un peu de consistance et enrobe la cuillère. Retirez du feu avant ébulition, sinon la crème tounerait. Servez cette crème très froide.", "1/2 Litre de lait | 4/5 oeufs | 100g de sucre en poudre | 1 pincée de sel | 1 sachet de sucre vanillé ou zeste de citron", "1200", "https://assets.afcdn.com/recipe/20150909/46716_w1024h768c1cx1971cy1759.webp"],
    ["Crème anglaise", "Préparez une délicieuse crème anglaise !", "4", "Dessert", "1- Faites bouillir 1/2 litre de lait avec un soupçon de sel, le sucre vanillé ou le zeste de citron. | 2- Mettez les jaunes d'oeufs dans une terrine avec le sucre. Travaillez le tout avec une cuillère en bois jusqu'à ce que le mélange blanchisse un peu. Incorporez-y , peu à peu, hors du feu, le lait bouillant. | 3- Reversez dans la casserole. Reportez celle-ci sur feu doux, sans cesser de remuer avec la cuillère en bois et en grattant bien le fond, jusqu'à ce que la crème prenne un peu de consistance et enrobe la cuillère. Retirez du feu avant ébulition, sinon la crème tounerait. Servez cette crème très froide.", "1/2 Litre de lait | 4/5 oeufs | 100g de sucre en poudre | 1 pincée de sel | 1 sachet de sucre vanillé ou zeste de citron", "1200", "https://assets.afcdn.com/recipe/20150909/46716_w1024h768c1cx1971cy1759.webp"],  
];

$users = [
    ['admin', 'admin'],
    ['standardUser', 'password']
];

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

foreach($users as $user) {
        
    $username = $user[0];
    $password = $user[1];

    $safeUsername = $mysqli->real_escape_string($username);
    $safePassword = $mysqli->real_escape_string(password_hash($password, PASSWORD_DEFAULT));

    $mysqli->query("INSERT INTO `db-MamaMia`.`users` (`username`, `password`) VALUES ('".$safeUsername."', '".$safePassword."');");
}

$mysqli->close();



?>