<?php
// 1. Connect to database and save in a variable

$host = 'db';  //A variable in docker to allow PDO to find database
$db = 'iofarm';
$user = 'root';
$password = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$pdo = new PDO($dsn, $user, $password); // new comes from OOP - making PDO object

// 2. Prepare statement

$query = $pdo->prepare('SELECT `name`, `id` FROM `pigs`'); // makes new object

// 3. Execute query

$query->execute();  // Gets data from database in query and stores it internally in PHP

// Now we can get the result

$result = $query->fetchAll();  // Gets data stored internally in PHP
//$result = $query->fetch(); //Gets first row from select statement results stored internally in PHP

echo '<pre>';
print_r($result);
echo '</p>';