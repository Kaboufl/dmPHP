<?php
$host = 'mysql8'; //Nom donné dans le docker-compose.yml
$user = 'myuser';
$password = 'monpassword';
$db = 'db-MamaMia';

$mysqli = new mysqli($host, $user, $password, $db);

$recipe = new stdClass;
$recipe->name = $mysqli->real_escape_string('Recette test no-' . random_int(1, 75));
$recipe->desc = $mysqli->real_escape_string("Cette recette test n'a pas pour but de produire quelquechose de comestible");
$recipe->catID = $mysqli->real_escape_string(random_int(1, 15));
$recipe->steps = $mysqli->real_escape_string('lorem ipsum dolor sit amet vala morgulis');
$recipe->duration = $mysqli->real_escape_string(random_int(60, 3600));

var_dump($recipe);
echo '<br>';


$recipe->id = $mysqli->query("SELECT * FROM recipe")->num_rows + 1;

$insert = $mysqli->query("INSERT INTO `db-MamaMia`.`recipe` (`id`, `name`, `description`, `category_id`, `steps`, `duration`) 
                                VALUES ('".$recipe->id."','".$recipe->name."', '".$recipe->desc."', '".$recipe->catID."', '".$recipe->steps."', '".$recipe->duration."');");

$test = $mysqli->query("SELECT * FROM recipe");
foreach ($test as $recype) {
    # code...
    var_dump($recype);
    echo '<br>';
}
var_dump($test);