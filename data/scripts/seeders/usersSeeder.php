<?php

$users = [
    ['admin', 'mamamia!!'],
    ['standardUser', 'password']
];


function writeUsers($users) {

    $mysqli = new mysqli('mysql8', 'myuser', 'monpassword', 'db-MamaMia');

    foreach($users as $user) {
        
        $username = $user[0];
        $password = $user[1];

        $safeUsername = $mysqli->real_escape_string($username);
        $safePassword = $mysqli->real_escape_string(password_hash($password, PASSWORD_DEFAULT));

        $mysqli->query("INSERT INTO `db-MamaMia`.`users` (`name`, `password`) VALUES ('".$safeUsername."', '".$safePassword."');");
    }

    $mysqli->close();
    return 'ok';
    }





echo writeUsers($users);
