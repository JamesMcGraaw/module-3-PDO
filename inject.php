<?php
// 1. Connect to database and save in a variable

$host = 'db';
$db = 'iofarm';
$user = 'root';
$password = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $exception) {
    echo '<p> There was an error connecting to the db</p>';
    exit();
}

// 2. Prepare statement

$pigName = 'Sally\'; DROP TABLE `pigz`;'; // pretend this came from a form. The sql injected in form deletes form
$query = $pdo->prepare("SELECT `name`, `id` FROM `pigs` WHERE `name` LIKE '$pigName'"); // makes new object

// 3. Execute query
echo $query->queryString;

$query->execute();

// Now we can get the result

$result = $query->fetchAll();

echo '<pre>';
print_r($result);
echo '</p>';