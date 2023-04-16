<?php
$host = 'mysql8'; //Nom donné dans le docker-compose.yml
$user = 'myuser';
$password = 'monpassword';
$db = 'db-MamaMia';

$mysqli = new mysqli($host, $user, $password, $db);

$table = $mysqli->query("CREATE TABLE `db-MamaMia`.`users` (
                                                    `id` INT NOT NULL AUTO_INCREMENT,
                                                    `name` VARCHAR(50),
                                                    `password` VARCHAR(255),
                                                    PRIMARY KEY (id)
                                                    );"
        );


try {
    $table;
    echo '\n ok \n';
} catch (\Throwable $th) {
    throw $th;
}

?>