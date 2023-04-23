<?php
$host = 'mysql8'; //Nom donné dans le docker-compose.yml
$user = 'myuser';
$password = 'monpassword';
$db = 'db-MamaMia';

$mysqli = new mysqli($host, $user, $password, $db);

$table = $mysqli->query("CREATE TABLE `db-MamaMia`.`recipe` (
                                                `id` INT NOT NULL AUTO_INCREMENT,
                                                `id_user` INT NULL,
                                                `name` VARCHAR(45) NULL,
                                                `description` VARCHAR(255) NULL,
                                                `difficulty` INT NULL,
                                                `category` VARCHAR(50) NULL,
                                                `steps` LONGTEXT NULL,
                                                `ingredients` LONGTEXT NULL,
                                                `duration` INT NULL,
                                                `imgURL` VARCHAR(255) NULL,
                                                PRIMARY KEY (`id`),
                                                UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE);"
        );

try {
    $table;
} catch (\Throwable $th) {
    throw $th;
}

?>