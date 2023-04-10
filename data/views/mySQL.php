<?php
$host = 'mysql8'; //Nom donné dans le docker-compose.yml
$user = 'myuser';
$password = 'monpassword';
$db = 'db-MamaMia';

$mysqli = new mysqli($host, $user, $password, $db);

$result = $mysqli->query("SELECT * FROM recipe WHERE id='1'");
// $result = $mysqli->query("CREATE TABLE `db-MamaMia`.`recipe` (
//                                                 `id` INT NOT NULL,
//                                                 `name` VARCHAR(45) NULL,
//                                                 `description` VARCHAR(255) NULL,
//                                                 `category_id` INT NULL,
//                                                 `steps` LONGTEXT NULL,
//                                                 `duration` INT NULL,
//                                                 `recipecol` VARCHAR(45) NULL,
//                                                 PRIMARY KEY (`id`),
//                                                 UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE);"
//         );
$row = $result->fetch_assoc();
echo $row['name'];
echo '<br>';
var_dump($row);

?>