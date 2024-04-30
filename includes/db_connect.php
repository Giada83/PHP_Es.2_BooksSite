<?php

$host = 'localhost';
$db = 'test';
$user = 'root';
$pass = 'password';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass, $options);
    // echo "Connected to $db at $host successfully.";
} catch (PDOException $err) {
    die("Could not connect to the database $db :" . $err->getMessage());
    exit;
};
