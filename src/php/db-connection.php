<?php 
    $host = '178.250.170.158:3306';
    $dbname = 'todo-app';
    $username = 'twntysmth-todo';
    $password = '&cV1m3y35';

    $mysqli = new mysqli($host, $username, $password, $dbname);

    if($mysqli->connect_error){

        die('Connection error: '. $mysqli->connect_error);

    }
     
    return $mysqli;

?>
