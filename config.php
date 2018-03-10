<?php

// Twitter data
$twitter_api_key = "cpQJ8EBiKLXT0ZklrgfOBDSf0";
$twitter_api_secret = "YH5L2XjznjrOfwpb4HvzVUvnOZUd381jBUPmP0Let9i0XLa00A";
$twitter_access_token = "17373305-3Nsg9zKnU9Yv8EFSNqLFTTtlINuu8ktCkjtMFVLnC";
$twitter_access_token_secret = "iFpsvW4oWVa8gtuSeFhfxzDn3gXib8DFfUOT2ZDhtenFP";
$twitter_settings = array(
    'oauth_access_token' => $twitter_access_token,
    'oauth_access_token_secret' => $twitter_access_token_secret,
    'consumer_key' => $twitter_api_key,
    'consumer_secret' => $twitter_api_secret
);

// Database configuration
$host = "localhost";
$port = 8889;
$user = "root";
$password = "root";
$db = "share_count";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;port=$port;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

?>
