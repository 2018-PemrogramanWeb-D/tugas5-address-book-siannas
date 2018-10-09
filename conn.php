<?php
$dbHost = 'localhost';
$dbName = 'addressbook';
$dbUser = 'root';
$dbPass = '';

$mysqli = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if(!$mysqli){
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
}

?>