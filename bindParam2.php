<?php
// 1. Connect to database and save in a variable

$host = 'db';
$db = 'staff';
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

$query = $pdo->prepare(
    'INSERT INTO `colours` (`name`) VALUES (:newColour);'
);

$userInput = 'Green'; // This came from a form

//$query->bindParam(':newColour', $userInput); //Bind param links parameter to user input

// 3. Execute query

$query->execute(['newColour' => $userInput]);

echo 'Done - bindparam1.php';