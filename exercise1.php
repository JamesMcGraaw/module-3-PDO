<?php

$host = 'db';
$db = 'MailMerge';
$user = 'root';
$password = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

$pdo = new PDO($dsn, $user, $password, $options);

$query = $pdo->prepare('SELECT `name`, `email` FROM `users`');

$query->execute();

$users = $query->fetchAll();

foreach($users as $user) {
        echo '<li>' . $user['name'] . ' - ' . $user['email'] . '</li>';
}