<?php

// Database configuration
$host = "localhost";
$port = 8889;
$user = "root";
$password = "root";
$db = "share_count";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$dbname;port=$port;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

?>
