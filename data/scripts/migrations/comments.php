<?php
$host = 'mysql8'; //Nom donné dans le docker-compose.yml
$user = 'myuser';
$password = 'monpassword';
$db = 'db-MamaMia';

$mysqli = new mysqli($host, $user, $password, $db);


$table = $mysqli->query("CREATE TABLE `db-MamaMia`.`comments` (
                                                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                                    `id_user` INT NOT NULL,
                                                    `recipe_id` INT NOT NULL,
                                                    `content` TEXT,
                                                    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
                                                    );");


try {
    $table;
    echo '\n ok \n';
} catch (\Throwable $th) {
    throw $th;
}

?>