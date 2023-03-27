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

//try { // Acknowledging creating new PDO instance might fail (thrown an error)
//    $pdo = new PDO($dsn, $user, $password); // create PDO object if no errors
//} catch (\PDOException $exception) { // if there is an error, make an exception - \ means it exists in global scope
//    throw new \PDOException( // rethrow error (for security as info about database could be stored in error) and stops programme
//        $exception->getMessage(), // gets error message in PDO object, then casts it back to NEW exception
//        (int)$exception->getCode() // casting error as an error code
//    );
//}

//$pdo = new PDO($dsn, $user, $password);

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $exception) {
    echo '<p> There was an error connecting to the db</p>';
    exit();
}

// 2. Prepare statement

$query = $pdo->prepare('SELECT `name`, `id` FROM `pigs`'); // makes new object

// 3. Execute query

$query->execute();  // Gets data from database in query and stores it internally in PHP

// Now we can get the result

$result = $query->fetchAll();  // Gets data stored internally in PHP

